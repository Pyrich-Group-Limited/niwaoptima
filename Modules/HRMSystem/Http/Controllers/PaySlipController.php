<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Exports\PayslipExport;
use Modules\HRMSystem\Models\Allowance;
use Modules\HRMSystem\Models\Commission;
use App\Models\User;
use Modules\HRMSystem\Models\Loan;
use Modules\HRMSystem\Models\OtherPayment;
use Modules\HRMSystem\Models\Overtime;
use Modules\HRMSystem\Models\PaySlip;
use Modules\HRMSystem\Models\SaturationDeduction;
use Modules\Accounting\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class PaySlipController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage pay slip'))
        {
            $employees = User::where(
                [
                    'created_by' => Auth::user()->creatorId(),
                ]
            )->first();

            $month = [
                '01' => 'JAN',
                '02' => 'FEB',
                '03' => 'MAR',
                '04' => 'APR',
                '05' => 'MAY',
                '06' => 'JUN',
                '07' => 'JUL',
                '08' => 'AUG',
                '09' => 'SEP',
                '10' => 'OCT',
                '11' => 'NOV',
                '12' => 'DEC',
            ];

            $year = [
//                '2020' => '2020',
//                '2021' => '2021',
//                '2022' => '2022',
                '2023' => '2023',
                '2024' => '2024',
                '2025' => '2025',
                '2026' => '2026',
                '2027' => '2027',
                '2028' => '2028',
                '2029' => '2029',
                '2030' => '2030',
            ];

            return view('hrmsystem::payslip.index', compact('employees', 'month', 'year'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                               'month' => 'required',
                               'year' => 'required',

                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $month = $request->month;
        $year  = $request->year;


        $formate_month_year = $year . '-' . $month;
        $validatePaysilp    = PaySlip::where('salary_month', '=', $formate_month_year)->where('created_by', Auth::user()->creatorId())->pluck('employee_id');
        $payslip_employee   = User::where('company_doj', '<=', date($year . '-' . $month . '-t'))->count();
        if($payslip_employee > count($validatePaysilp))
        {
            $employees = User::where('company_doj', '<=', date($year . '-' . $month . '-t'))->whereNotIn('employee_id', $validatePaysilp)->get();

            $employeesSalary = User::where('salary', '<=', 0)->first();

            if(!empty($employeesSalary))
            {
                return redirect()->route('payslip.index')->with('error', __('Please set employee salary.'));
            }

            foreach($employees as $employee)
            {

                $payslipEmployee                       = new PaySlip();
                $payslipEmployee->employee_id          = $employee->id;
                $payslipEmployee->net_payble           = $employee->get_net_salary();
                $payslipEmployee->salary_month         = $formate_month_year;
                $payslipEmployee->status               = 0;
                $payslipEmployee->basic_salary         = !empty($employee->salary) ? $employee->salary : 0;
                $payslipEmployee->allowance            = User::allowance($employee->id);
                $payslipEmployee->commission           = User::commission($employee->id);
                $payslipEmployee->loan                 = User::loan($employee->id);
                $payslipEmployee->saturation_deduction = User::saturation_deduction($employee->id);
                $payslipEmployee->other_payment        = User::other_payment($employee->id);
                $payslipEmployee->overtime             = User::overtime($employee->id);
                $payslipEmployee->created_by           = Auth::user()->creatorId();
                $payslipEmployee->save();

                //For Notification
                $setting  = Utility::settings(Auth::user()->creatorId());
                $payslipNotificationArr = [
                    'year' =>  $formate_month_year,
                ];
                //Slack Notification
                /* if(isset($setting['payslip_notification']) && $setting['payslip_notification'] ==1)
                {
                    Utility::send_slack_msg('new_monthly_payslip', $payslipNotificationArr);
                }

                //Telegram Notification
                if(isset($setting['telegram_payslip_notification']) && $setting['telegram_payslip_notification'] ==1)
                {
                    Utility::send_telegram_msg('new_monthly_payslip', $payslipNotificationArr);
                } */
                //webhook
                $module ='New Monthly Payslip';
                $webhook=  Utility::webhookSetting($module);
                if($webhook)
                {
                    $parameter = json_encode($payslipEmployee);
                    $status = Utility::WebhookCall($webhook['url'],$parameter,$webhook['method']);

                    if($status == true)
                    {
                        return redirect()->back()->with('success', __('Payslip successfully created.'));
                    }
                    else
                    {
                        return redirect()->back()->with('error', __('Webhook call failed.'));
                    }
                }

            }

            return redirect()->route('payslip.index')->with('success', __('Payslip successfully created.'));
        }
        else
        {
            return redirect()->route('payslip.index')->with('error', __('Payslip Already created.'));
        }

    }

    public function destroy($id)
    {
        $payslip = PaySlip::find($id);
        $payslip->delete();

        return true;
    }

    public function showemployee($paySlip)
    {
        $payslip = PaySlip::find($paySlip);

        return view('hrmsystem::payslip.show', compact('payslip'));
    }


    public function search_json(Request $request)
    {

        $formate_month_year = $request->datePicker;
        $validatePaysilp    = PaySlip::where('salary_month', '=', $formate_month_year)->where('created_by', Auth::user()->creatorId())->get()->toarray();

        $data=[];
        if (empty($validatePaysilp))
        {
            $data=[];
            return;
        } else {
            $paylip_employee = PaySlip::select(
                [
                    'users.id',
                    'users.employee_id',
                    'users.first_name',
                    'payslip_types.name as payroll_type',
                    'pay_slips.basic_salary',
                    'pay_slips.net_payble',
                    'pay_slips.id as pay_slip_id',
                    'pay_slips.status',
                    'users.id as user_id',
                ]
            )->leftjoin(
                'users',
                function ($join) use ($formate_month_year) {
                    $join->on('users.id', '=', 'pay_slips.employee_id');
                    $join->on('pay_slips.salary_month', '=', DB::raw("'" . $formate_month_year . "'"));
                    $join->leftjoin('payslip_types', 'payslip_types.id', '=', 'users.salary_type');
                }
            )->where('users.created_by', Auth::user()->creatorId())->get();


            foreach ($paylip_employee as $employee) {

               /*  if (Auth::user()->type == 'Employee') { */
                    if (Auth::user()->id == $employee->user_id) {
                        $tmp   = [];
                        $tmp[] = $employee->id;
                        $tmp[] = $employee->first_name;
                        $tmp[] = $employee->payroll_type;
                        $tmp[] = $employee->pay_slip_id;
                        $tmp[] = !empty($employee->basic_salary) ? Auth::user()->priceFormat($employee->basic_salary) : '-';
                        $tmp[] = !empty($employee->net_payble) ? Auth::user()->priceFormat($employee->net_payble) : '-';
                        if ($employee->status == 1) {
                            $tmp[] = 'paid';
                        } else {
                            $tmp[] = 'unpaid';
                        }
                        $tmp[]  = !empty($employee->pay_slip_id) ? $employee->pay_slip_id : 0;
                        $tmp['url']  = route('employee.show', Crypt::encrypt($employee->id));
                        $data[] = $tmp;
                    }
               /*  } else { */

                    $tmp   = [];
                    $tmp[] = $employee->id;
                    $tmp[] = Auth::user()->employeeIdFormat($employee->employee_id);
                    $tmp[] = $employee->first_name;
                    $tmp[] = $employee->payroll_type;
                    $tmp[] = !empty($employee->basic_salary) ? Auth::user()->priceFormat($employee->basic_salary) : '-';
                    $tmp[] = !empty($employee->net_payble) ? Auth::user()->priceFormat($employee->net_payble) : '-';
                    if ($employee->status == 1) {
                        $tmp[] = 'Paid';
                    } else {
                        $tmp[] = 'UnPaid';
                    }
                    $tmp[]  = !empty($employee->pay_slip_id) ? $employee->pay_slip_id : 0;
                    $tmp['url']  = route('employee.show', Crypt::encrypt($employee->id));
                    $data[] = $tmp;
               /*  } */
            }

            return $data;
        }
    }

    public function paysalary($id, $date)
    {
        $employeePayslip = PaySlip::where('employee_id', '=', $id)->where('created_by', Auth::user()->creatorId())->where('salary_month', '=', $date)->first();
        if(!empty($employeePayslip))
        {
            $employeePayslip->status = 1;
            $employeePayslip->save();

            return redirect()->route('payslip.index')->with('success', __('Payslip Payment successfully.'));
        }
        else
        {
            return redirect()->route('payslip.index')->with('error', __('Payslip Payment failed.'));
        }

    }

    public function bulk_pay_create($date)
    {
        $Employees       = PaySlip::where('salary_month', $date)->where('created_by', Auth::user()->creatorId())->get();
        $unpaidEmployees = PaySlip::where('salary_month', $date)->where('created_by', Auth::user()->creatorId())->where('status', '=', 0)->get();

        return view('hrmsystem::payslip.bulkcreate', compact('Employees', 'unpaidEmployees', 'date'));
    }

    public function bulkpayment(Request $request, $date)
    {
        $unpaidEmployees = PaySlip::where('salary_month', $date)->where('created_by', Auth::user()->creatorId())->where('status', '=', 0)->get();

        foreach($unpaidEmployees as $employee)
        {
            $employee->status = 1;
            $employee->save();
        }

        return redirect()->route('payslip.index')->with('success', __('Payslip Bulk Payment successfully.'));
    }

    public function employeepayslip()
    {
        $employees = User::where(
            [
                'id' => Auth::user()->id,
            ]
        )->first();

        $payslip = PaySlip::where('employee_id', '=', $employees->id)->get();

        return view('hrmsystem::payslip.employeepayslip', compact('payslip'));

    }

    public function pdf($id, $month)
    {

        $payslip  = PaySlip::where('employee_id', $id)->where('salary_month', $month)->where('created_by', Auth::user()->creatorId())->first();
        $employee = User::find($payslip->employee_id);

       // dd($employee);

        $payslipDetail = Utility::employeePayslipDetail($id,$month);


        return view('hrmsystem::payslip.pdf', compact('payslip', 'employee', 'payslipDetail'));
    }

    public function send($id, $month)
    {
        $setings = Utility::settings();
//        dd($setings);
        if($setings['payslip_sent'] == 1)
        {
            $payslip  = PaySlip::where('employee_id', $id)->where('salary_month', $month)->where('created_by', Auth::user()->creatorId())->first();
            $employee = User::find($payslip->employee_id);

            $payslip->name  = $employee->name;
            $payslip->email = $employee->email;

            $payslipId    = Crypt::encrypt($payslip->id);
            $payslip->url = route('payslip.payslipPdf', $payslipId);
//            dd($payslip->url);

            $payslipArr = [

                'employee_name'=> $employee->name,
                'employee_email' => $employee->email,
                'payslip_name' =>   $payslip->name,
                'payslip_salary_month' => $payslip->salary_month,
                'payslip_url' =>$payslip->url,

            ];
            //$resp = Utility::sendEmailTemplate('payslip_sent', [$employee->id => $employee->email], $payslipArr);



           // return redirect()->back()->with('success', __('Payslip successfully sent.') .(($resp['is_success'] == false && !empty($resp['error'])) ? '<br> <span class="text-danger">' . $resp['error'] . '</span>' : ''));
            return redirect()->back()->with('success', __('Payslip successfully sent.') );
        }

        return redirect()->back()->with('success', __('Payslip successfully sent.'));

    }

    public function payslipPdf($id)
    {
        $payslipId = Crypt::decrypt($id);

        $payslip  = PaySlip::where('id', $payslipId)->where('created_by', Auth::user()->creatorId())->first();
        $employee = User::find($payslip->employee_id);

        $payslipDetail = Utility::employeePayslipDetail($payslip->employee_id, $payslip->salary_month);

        return view('hrmsystem::payslip.payslipPdf', compact('payslip', 'employee', 'payslipDetail'));
    }

    public function editEmployee($paySlip)
    {
        $payslip = PaySlip::find($paySlip);

        return view('hrmsystem::payslip.salaryEdit', compact('payslip'));
    }

    public function updateEmployee(Request $request, $id)
    {


        if(isset($request->allowance) && !empty($request->allowance))
        {
            $allowances   = $request->allowance;
            $allowanceIds = $request->allowance_id;
            foreach($allowances as $k => $allownace)
            {
                $allowanceData         = Allowance::find($allowanceIds[$k]);
                $allowanceData->amount = $allownace;
                $allowanceData->save();
            }
        }


        if(isset($request->commission) && !empty($request->commission))
        {
            $commissions   = $request->commission;
            $commissionIds = $request->commission_id;
            foreach($commissions as $k => $commission)
            {
                $commissionData         = Commission::find($commissionIds[$k]);
                $commissionData->amount = $commission;
                $commissionData->save();
            }
        }

        if(isset($request->loan) && !empty($request->loan))
        {
            $loans   = $request->loan;
            $loanIds = $request->loan_id;
            foreach($loans as $k => $loan)
            {
                $loanData         = Loan::find($loanIds[$k]);
                $loanData->amount = $loan;
                $loanData->save();
            }
        }


        if(isset($request->saturation_deductions) && !empty($request->saturation_deductions))
        {
            $saturation_deductionss   = $request->saturation_deductions;
            $saturation_deductionsIds = $request->saturation_deductions_id;
            foreach($saturation_deductionss as $k => $saturation_deductions)
            {

                $saturation_deductionsData         = SaturationDeduction::find($saturation_deductionsIds[$k]);
                $saturation_deductionsData->amount = $saturation_deductions;
                $saturation_deductionsData->save();
            }
        }


        if(isset($request->other_payment) && !empty($request->other_payment))
        {
            $other_payments   = $request->other_payment;
            $other_paymentIds = $request->other_payment_id;
            foreach($other_payments as $k => $other_payment)
            {
                $other_paymentData         = OtherPayment::find($other_paymentIds[$k]);
                $other_paymentData->amount = $other_payment;
                $other_paymentData->save();
            }
        }


        if(isset($request->rate) && !empty($request->rate))
        {
            $rates   = $request->rate;
            $rateIds = $request->rate_id;
            $hourses = $request->hours;

            foreach($rates as $k => $rate)
            {
                $overtime        = Overtime::find($rateIds[$k]);
                $overtime->rate  = $rate;
                $overtime->hours = $hourses[$k];
                $overtime->save();
            }
        }


        $payslipEmployee                       = PaySlip::find($request->payslip_id);
        $payslipEmployee->allowance            = User::allowance($payslipEmployee->employee_id);
        $payslipEmployee->commission           = User::commission($payslipEmployee->employee_id);
        $payslipEmployee->loan                 = User::loan($payslipEmployee->employee_id);
        $payslipEmployee->saturation_deduction = User::saturation_deduction($payslipEmployee->employee_id);
        $payslipEmployee->other_payment        = User::other_payment($payslipEmployee->employee_id);
        $payslipEmployee->overtime             = User::overtime($payslipEmployee->employee_id);
        $payslipEmployee->net_payble           = User::find($payslipEmployee->employee_id)->get_net_salary();
        $payslipEmployee->save();

        return redirect()->route('payslip.index')->with('success', __('Employee payroll successfully updated.'));
    }

    public function export(Request $request)
    {
        $name = 'payslip_' . date('Y-m-d i:h:s');
        $data = Excel::download(new PayslipExport($request), $name . '.xlsx'); ob_end_clean();
        return $data;
    }

}
