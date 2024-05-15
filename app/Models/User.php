<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Vender;
use App\Models\Level;
use Laravel\Sanctum\HasApiTokens;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use Modules\HRMSystem\Models\Loan;
use Modules\Accounting\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Modules\Shared\Models\Department;
use Modules\Accounting\Models\Invoice;
use Modules\Accounting\Models\Payment;
use Modules\Accounting\Models\Revenue;
use Modules\Accounting\Models\Utility;
use Modules\HRMSystem\Models\Overtime;
use Spatie\Permission\Traits\HasRoles;
use Modules\Accounting\Models\Customer;
use Modules\Accounting\Models\Proposal;
use Modules\HRMSystem\Models\Allowance;
use Modules\HRMSystem\Models\LeaveType;
use Illuminate\Notifications\Notifiable;
use Modules\HRMSystem\Models\Commission;
use Modules\HRMSystem\Models\LoanOption;
use Modules\UnitManager\Models\UnitHead;
use Modules\WorkflowEngine\Models\Staff;
use OwenIt\Auditing\Contracts\Auditable;
use Modules\HRMSystem\Models\PayslipType;

use Modules\HumanResource\Models\Ranking;
use Illuminate\Notifications\Notification;
use Modules\HRMSystem\Models\OtherPayment;
use Modules\Procurement\Models\Procurement;
use Modules\EmployerManager\Models\Employer;
use Modules\HRMSystem\Models\AllowanceOption;
use Modules\HRMSystem\Models\DeductionOption;
use Modules\HRMSystem\Models\AttendanceEmployee;
use Modules\ClaimsCompensation\Models\DeathClaim;
use Modules\HRMSystem\Models\SaturationDeduction;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\DTARequests\Notifications\UnitHeadNotification;


class User extends Authenticatable implements Auditable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, AuditingAuditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'status',
        'salary_type',
        'salary',
        'shipping_address',
        'billing_address',
        'company_doj',
        'documents',
        'tax_payer_id',
        'salary',
        'salary_type' ,
        'is_two_factor_enabled',
        'type',
        'created_by',
        'level_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'integer',
    ];

    public function getFullName()
    {
        $user = $this;

        $full_name = "$user->first_name $user->last_name";
        if ($user->middle_name) {
            $full_name = "$user->first_name $user->middle_name $user->last_name";
            return $full_name;
        }
        return $full_name;
    }

    /* public function staff(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Staff::class);
    } */

    // public function ranking()
    // {
    //     return $this->belongsTo(Ranking::class, 'ranking_id', 'id');
    // }
    // public function ranking()
    // {
    //     return $this->hasOne(Ranking::class);
    // }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function signature()
    {
        return $this->hasOne(Signature::class);
    }
    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function procurement(){
        return $this->hasMany(Procurement::class);
    }
    public function unitHead()
    {
        return $this->hasOne(UnitHead::class);
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->email;
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function sendUnitHeadNotification()
    {
        $this->notify(new UnitHeadNotification());
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function death_claims()
    {
        return $this->hasMany(DeathClaim::class);
    }

    public function priceFormat($price)
    {
        $settings = Utility::settings();

        return (($settings['site_currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . number_format($price, Utility::getValByName('decimal_number')) . (($settings['site_currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
    }

    public function authId()
    {
        return $this->id;
    }

    public function creatorId()
    {
        /* if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        } */

        return $this->id;
    }

    public function ownerId()
    {
        /* if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        } */
        return $this->id;
    }


    public function invoiceNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["invoice_prefix"] . sprintf("%05d", $number);
    }

    public function billNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["bill_prefix"] . sprintf("%05d", $number);
    }

    public function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public function expenseNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["expense_prefix"] . sprintf("%05d", $number);
    }

    public function journalNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["journal_prefix"] . sprintf("%05d", $number);
    }

    //Supposed Customer
    /* public function authId()
    {
        return $this->id;
    }

    public function creatorId()
    {
        /* if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
        //return $this->id;
    }*/

    public function currentLanguage()
    {
        return $this->lang;
    }

    /* public function priceFormat($price)
    {
        $settings = Utility::settings();

        return (($settings['site_currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') . number_format($price, Utility::getValByName('decimal_number')) . (($settings['site_currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
    } */

    public function currencySymbol()
    {
        $settings = Utility::settings();

        return $settings['site_currency_symbol'];
    }

    /* public function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    } */

    public function timeFormat($time)
    {
        $settings = Utility::settings();

        return date($settings['site_time_format'], strtotime($time));
    }

    /* public function invoiceNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["invoice_prefix"] . sprintf("%05d", $number);
    }
 */
    public function proposalNumberFormat($number)
    {
        $settings = Utility::settings();

        return $settings["proposal_prefix"] . sprintf("%05d", $number);
    }

    public function invoiceChartData()
    {
        $month[]       = __('January');
        $month[]       = __('February');
        $month[]       = __('March');
        $month[]       = __('April');
        $month[]       = __('May');
        $month[]       = __('June');
        $month[]       = __('July');
        $month[]       = __('August');
        $month[]       = __('September');
        $month[]       = __('October');
        $month[]       = __('November');
        $month[]       = __('December');
        $data['month'] = $month;

        $data['currentYear'] = date('M-Y');

        $totalInvoice = Invoice::where('customer_id', Auth::user()->id)->count();
        $unpaidArr    = array();




        for($i = 1; $i <= 12; $i++)
        {
            $unpaidInvoice  = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '1')->where('due_date', '>', date('Y-m-d'))->get();
            $paidInvoice    = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '4')->get();
            $partialInvoice = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '3')->get();
            $dueInvoice     = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->where('status', '1')->where('due_date', '<', date('Y-m-d'))->get();


            $totalUnpaid = 0;
            for($j = 0; $j < count($unpaidInvoice); $j++)
            {
                $unpaidAmount = $unpaidInvoice[$j]->getDue();
                $totalUnpaid  += $unpaidAmount;

            }

            $totalPaid = 0;
            for($j = 0; $j < count($paidInvoice); $j++)
            {
                $paidAmount = $paidInvoice[$j]->getTotal();
                $totalPaid  += $paidAmount;

            }

            $totalPartial = 0;
            for($j = 0; $j < count($partialInvoice); $j++)
            {
                $partialAmount = $partialInvoice[$j]->getDue();
                $totalPartial  += $partialAmount;

            }

            $totalDue = 0;
            for($j = 0; $j < count($dueInvoice); $j++)
            {
                $dueAmount = $dueInvoice[$j]->getDue();
                $totalDue  += $dueAmount;

            }

            $unpaidData[]  = $totalUnpaid;
            $paidData[]    = $totalPaid;
            $partialData[] = $totalPartial;
            $dueData[]     = $totalDue;

            $statusData['unpaid']  = $unpaidData;
            $statusData['paid']    = $paidData;
            $statusData['partial'] = $partialData;
            $statusData['due']     = $dueData;
        }

        $data['data'] = $statusData;


        $unpaidInvoice  = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '1')->where('due_date', '>', date('Y-m-d'))->get();
        $paidInvoice    = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '4')->get();
        $partialInvoice = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '3')->get();
        $dueInvoice     = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->where('status', '1')->where('due_date', '<', date('Y-m-d'))->get();

        $progressData['totalInvoice']        = $totalInvoice = Invoice:: where('customer_id', Auth::user()->id)->whereRaw('year(`send_date`) = ?', array(date('Y')))->count();
        $progressData['totalUnpaidInvoice']  = $totalUnpaidInvoice = count($unpaidInvoice);
        $progressData['totalPaidInvoice']    = $totalPaidInvoice = count($paidInvoice);
        $progressData['totalPartialInvoice'] = $totalPartialInvoice = count($partialInvoice);
        $progressData['totalDueInvoice']     = $totalDueInvoice = count($dueInvoice);

        $progressData['unpaidPr']  = ($totalInvoice != 0) ? ($totalUnpaidInvoice * 100) / $totalInvoice : 0;
        $progressData['paidPr']    = ($totalInvoice != 0) ? ($totalPaidInvoice * 100) / $totalInvoice : 0;
        $progressData['partialPr'] = ($totalInvoice != 0) ? ($totalPartialInvoice * 100) / $totalInvoice : 0;
        $progressData['duePr']     = ($totalInvoice != 0) ? ($totalDueInvoice * 100) / $totalInvoice : 0;

        $progressData['unpaidColor']  = '#fc544b';
        $progressData['paidColor']    = '#63ed7a';
        $progressData['partialColor'] = '#6777ef';
        $progressData['dueColor']     = '#ffa426';

        $data['progressData'] = $progressData;


        return $data;
    }


    public function customerInvoice($customerId)
    {
        $invoices  = Invoice:: where('customer_id', $customerId)->orderBy('issue_date', 'desc')->get();
        //$proposals = Proposal:: where('customer_id', $customerId)->orderBy('issue_date', 'desc')->get()->toArray();

        return $invoices;
    }

    public function customerProposal($customerId)
    {
        $proposals = Proposal:: where('customer_id', $customerId)->orderBy('issue_date', 'desc')->get();

        return $proposals;
    }

    public function customerOverdue($customerId)
    {
        $dueInvoices = Invoice:: where('customer_id', $customerId)->whereNotIn(
            'status', [
                        '0',
                        '4',
                    ]
        )->where('due_date', '<', date('Y-m-d'))->get();
        $due         = 0;
        foreach($dueInvoices as $invoice)
        {
            $due += $invoice->getDue();
        }

        return $due;
    }

    public function customerTotalInvoiceSum($customerId)
    {
        $invoices = Invoice:: where('customer_id', $customerId)->get();
        $total    = 0;
        foreach($invoices as $invoice)
        {
            $total += $invoice->getTotal();
        }

        return $total;
    }

    public function customerTotalInvoice($customerId)
    {
        $invoices = Invoice:: where('customer_id', $customerId)->count();

        return $invoices;
    }

    public static function customer_id($customer_name)
    {

        $customers = DB::select(
            DB::raw("SELECT IFNULL( (SELECT id from customers where name = :name and created_by = :created_by limit 1), '0') as customer_id"), ['name' => $customer_name,  'created_by' => Auth::user()->creatorId(), ]
        );

        return $customers[0]->customer_id;
    }
    public function isUser()
    {

       // return $this->type === 'user' ? 1 : 0;
       return 0;
    }


    public function getincExpBarChartData()
    {
        $month[]          = __('January');
        $month[]          = __('February');
        $month[]          = __('March');
        $month[]          = __('April');
        $month[]          = __('May');
        $month[]          = __('June');
        $month[]          = __('July');
        $month[]          = __('August');
        $month[]          = __('September');
        $month[]          = __('October');
        $month[]          = __('November');
        $month[]          = __('December');
        $dataArr['month'] = $month;


        for($i = 1; $i <= 12; $i++)
        {
            $monthlyIncome = Revenue::selectRaw('sum(amount) amount')->where('created_by', '=', $this->creatorId())->whereRaw('year(`date`) = ?', array(date('Y')))->whereRaw('month(`date`) = ?', $i)->first();
            $invoices      = Invoice:: select('*')->where('created_by', \Auth::user()->creatorId())
                ->whereRaw('year(`send_date`) = ?', array(date('Y')))
                ->whereRaw('month(`send_date`) = ?', $i)->get();


            $invoiceArray = array();
            foreach($invoices as $invoice)
            {
                $invoiceArray[] = $invoice->getTotal();
            }
            $totalIncome = (!empty($monthlyIncome) ? $monthlyIncome->amount : 0) + (!empty($invoiceArray) ? array_sum($invoiceArray) : 0);


            $incomeArr[] = !empty($totalIncome) ? str_replace(",", "", number_format($totalIncome, 2) ): 0;


            $monthlyExpense = Payment::selectRaw('sum(amount) amount')->where('created_by', '=', $this->creatorId())->whereRaw('year(`date`) = ?', array(date('Y')))->whereRaw('month(`date`) = ?', $i)->first();
            $bills          = Bill:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRaw('year(`send_date`) = ?', array(date('Y')))->whereRaw('month(`send_date`) = ?', $i)->get();
            $billArray      = array();
            foreach($bills as $bill)
            {
                $billArray[] = $bill->getTotal();
            }

            $totalExpense = (!empty($monthlyExpense) ? $monthlyExpense->amount : 0) + (!empty($billArray) ? array_sum($billArray) : 0);

            $expenseArr[] = !empty($totalExpense) ? str_replace(",", "", number_format($totalExpense, 2) ): 0;
        }



        $dataArr['income']  = $incomeArr;
        $dataArr['expense'] = $expenseArr;

        return $dataArr;


    }

    public function getIncExpLineChartDate()
    {
        $usr           = \Auth::user();
        $m             = date("m");
        $de            = date("d");
        $y             = date("Y");
        $format        = 'Y-m-d';
        $arrDate       = [];
        $arrDateFormat = [];

        for($i = 0; $i <= 15 - 1; $i++)
        {
            $date = date($format, mktime(0, 0, 0, $m, ($de - $i), $y));

            $arrDay[]        = date('D', mktime(0, 0, 0, $m, ($de - $i), $y));
            $arrDate[]       = $date;
            $arrDateFormat[] = date("d-M", strtotime($date));;
        }
        $dataArr['day'] = $arrDateFormat;
        for($i = 0; $i < count($arrDate); $i++)
        {
            $dayIncome = Revenue::selectRaw('sum(amount) amount')->where('created_by', \Auth::user()->creatorId())->whereRaw('date = ?', $arrDate[$i])->first();

            $invoices     = Invoice:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRAW('send_date = ?', $arrDate[$i])->get();
            $invoiceArray = array();
            foreach($invoices as $invoice)
            {
                $invoiceArray[] = $invoice->getTotal();
            }

            $incomeAmount = (!empty($dayIncome->amount) ? $dayIncome->amount : 0) + (!empty($invoiceArray) ? array_sum($invoiceArray) : 0);
            $incomeArr[]  = str_replace(",", "", number_format($incomeAmount, 2));

            $dayExpense = Payment::selectRaw('sum(amount) amount')->where('created_by', \Auth::user()->creatorId())->whereRaw('date = ?', $arrDate[$i])->first();

            $bills     = Bill:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRAW('send_date = ?', $arrDate[$i])->get();
            $billArray = array();
            foreach($bills as $bill)
            {
                $billArray[] = $bill->getTotal();
            }
            $expenseAmount = (!empty($dayExpense->amount) ? $dayExpense->amount : 0) + (!empty($billArray) ? array_sum($billArray) : 0);
            $expenseArr[]  = str_replace(",", "", number_format($expenseAmount, 2));
        }

        $dataArr['income']  = $incomeArr;
        $dataArr['expense'] = $expenseArr;

        return $dataArr;
    }



    public function weeklyInvoice()
    {
        $staticstart  = date('Y-m-d', strtotime('last Week'));
        $currentDate  = date('Y-m-d');
        $invoices     = Invoice:: select('*')->where('created_by', \Auth::user()->creatorId())->where('issue_date', '>=', $staticstart)->where('issue_date', '<=', $currentDate)->get();
        $invoiceTotal = 0;
        $invoicePaid  = 0;
        $invoiceDue   = 0;
        foreach($invoices as $invoice)
        {
            $invoiceTotal += $invoice->getTotal();
            $invoicePaid  += ($invoice->getTotal() - $invoice->getDue());
            $invoiceDue   += $invoice->getDue();
        }

        $invoiceDetail['invoiceTotal'] = $invoiceTotal;
        $invoiceDetail['invoicePaid']  = $invoicePaid;
        $invoiceDetail['invoiceDue']   = $invoiceDue;

        return $invoiceDetail;
    }



    public function monthlyInvoice()
    {
        $staticstart  = date('Y-m-d', strtotime('last Month'));
        $currentDate  = date('Y-m-d');
        $invoices     = Invoice:: select('*')->where('created_by', \Auth::user()->creatorId())->where('issue_date', '>=', $staticstart)->where('issue_date', '<=', $currentDate)->get();
        $invoiceTotal = 0;
        $invoicePaid  = 0;
        $invoiceDue   = 0;
        foreach($invoices as $invoice)
        {
            $invoiceTotal += $invoice->getTotal();
            $invoicePaid  += ($invoice->getTotal() - $invoice->getDue());
            $invoiceDue   += $invoice->getDue();
        }

        $invoiceDetail['invoiceTotal'] = $invoiceTotal;
        $invoiceDetail['invoicePaid']  = $invoicePaid;
        $invoiceDetail['invoiceDue']   = $invoiceDue;

        return $invoiceDetail;
    }


    public function weeklyBill()
    {
        $staticstart = date('Y-m-d', strtotime('last Week'));
        $currentDate = date('Y-m-d');
        $bills       = Bill:: select('*')->where('created_by', \Auth::user()->creatorId())->where('bill_date', '>=', $staticstart)->where('bill_date', '<=', $currentDate)->get();
        $billTotal   = 0;
        $billPaid    = 0;
        $billDue     = 0;
        foreach($bills as $bill)
        {
            $billTotal += $bill->getTotal();
            $billPaid  += ($bill->getTotal() - $bill->getDue());
            $billDue   += $bill->getDue();
        }

        $billDetail['billTotal'] = $billTotal;
        $billDetail['billPaid']  = $billPaid;
        $billDetail['billDue']   = $billDue;

        return $billDetail;
    }
    public function isClient()
    {
        return $this->type == 'client' ? 1 : 0;
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'project_users', 'user_id', 'project_id')->withTimestamps();
    }

    public function checkProject($project_id)
    {
        $user_projects = $this->projects()->pluck('project_id')->toArray();
        if(array_key_exists($project_id, $user_projects))
        {
            $projectstatus = $user_projects[$project_id] == 'owner' ? 'Owner' : 'Shared';
        }

        return 'Owner';
    }
    public function monthlyBill()
    {
        $staticstart = date('Y-m-d', strtotime('last Month'));
        $currentDate = date('Y-m-d');
        $bills       = Bill:: select('*')->where('created_by', \Auth::user()->creatorId())->where('bill_date', '>=', $staticstart)->where('bill_date', '<=', $currentDate)->get();
        $billTotal   = 0;
        $billPaid    = 0;
        $billDue     = 0;
        foreach($bills as $bill)
        {
            $billTotal += $bill->getTotal();
            $billPaid  += ($bill->getTotal() - $bill->getDue());
            $billDue   += $bill->getDue();
        }

        $billDetail['billTotal'] = $billTotal;
        $billDetail['billPaid']  = $billPaid;
        $billDetail['billDue']   = $billDue;

        return $billDetail;
    }

    public function countCustomers()
    {
        return Customer::where('created_by', '=', $this->creatorId())->count();

    }
    public function countemployers(){
        return Employer::count();
    }

    public function countVenders()
    {
        return Vender::where('created_by', '=', $this->creatorId())->count();
    }
    public function countInvoices()
    {
        return Invoice::where('created_by', '=', $this->creatorId())->count();
    }
    public function countBills()
    {
        return Bill::where('created_by', '=', $this->creatorId())->count();
    }
    public function todayIncome()
    {
        $revenue      = Revenue::where('created_by', '=', $this->creatorId())->whereRaw('Date(date) = CURDATE()')->where('created_by', \Auth::user()->creatorId())->sum('amount');
        $invoices     = Invoice:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRAW('Date(send_date) = CURDATE()')->get();
        $invoiceArray = array();
        foreach($invoices as $invoice)
        {
            $invoiceArray[] = $invoice->getTotal();
        }
        $totalIncome = (!empty($revenue) ? $revenue : 0) + (!empty($invoiceArray) ? array_sum($invoiceArray) : 0);

        return $totalIncome;
    }


    public function todayExpense()
    {
        $payment = Payment::where('created_by', '=', $this->creatorId())->where('created_by', \Auth::user()->creatorId())->whereRaw('Date(date) = CURDATE()')->sum('amount');

        $bills = Bill:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRAW('Date(send_date) = CURDATE()')->get();

        $billArray = array();
        foreach($bills as $bill)
        {
            $billArray[] = $bill->getTotal();
        }

        $totalExpense = (!empty($payment) ? $payment : 0) + (!empty($billArray) ? array_sum($billArray) : 0);

        return $totalExpense;
    }

    public function incomeCurrentMonth()
    {
        $currentMonth = date('m');
        $revenue      = Revenue::where('created_by', '=', $this->creatorId())->whereRaw('MONTH(date) = ?', [$currentMonth])->sum('amount');

        $invoices = Invoice:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRAW('MONTH(send_date) = ?', [$currentMonth])->get();

        $invoiceArray = array();
        foreach($invoices as $invoice)
        {
            $invoiceArray[] = $invoice->getTotal();
        }
        $totalIncome = (!empty($revenue) ? $revenue : 0) + (!empty($invoiceArray) ? array_sum($invoiceArray) : 0);

        return $totalIncome;

    }


    public function expenseCurrentMonth()
    {
        $currentMonth = date('m');

        $payment = Payment::where('created_by', '=', $this->creatorId())->whereRaw('MONTH(date) = ?', [$currentMonth])->sum('amount');

        $bills     = Bill:: select('*')->where('created_by', \Auth::user()->creatorId())->whereRAW('MONTH(send_date) = ?', [$currentMonth])->get();
        $billArray = array();
        foreach($bills as $bill)
        {
            $billArray[] = $bill->getTotal();
        }

        $totalExpense = (!empty($payment) ? $payment : 0) + (!empty($billArray) ? array_sum($billArray) : 0);

        return $totalExpense;
    }

    public function salary_type()
    {
        return $this->hasOne('Modules\HRMSystem\Models\PayslipType', 'id', 'salary_type')->pluck('name')->first();
    }

    public function get_net_salary()
    {

        //allowance
        $allowances      = Allowance::where('employee_id', '=', $this->id)->get();
        $total_allowance = 0 ;
        foreach($allowances as $allowance)
        {
            if($allowance->type == 'fixed')
            {
                $totalAllowances  = $allowance->amount;
            }
            else
            {
                $totalAllowances  = $allowance->amount * $this->salary / 100;
            }
            $total_allowance += $totalAllowances ;
        }

        //commission
        $commissions      = Commission::where('employee_id', '=', $this->id)->get();
        $total_commission = 0;
        foreach($commissions as $commission)
        {
            if($commission->type == 'fixed')
            {
                $totalCom  = $commission->amount;
            }
            else
            {
                $totalCom  = $commission->amount * $this->salary / 100;
            }
            $total_commission += $totalCom ;
        }

        //Loan
        $loans      = Loan::where('employee_id', '=', $this->id)->get();
        $total_loan = 0;
        foreach($loans as $loan)
        {
            if($loan->type == 'fixed')
            {
                $totalloan  = $loan->amount;
            }
            else
            {
                $totalloan  = $loan->amount * $this->salary / 100;
            }
            $total_loan += $totalloan ;
        }


        //Saturation Deduction
        $saturation_deductions      = SaturationDeduction::where('employee_id', '=', $this->id)->get();
        $total_saturation_deduction = 0 ;
        foreach($saturation_deductions as $deductions)
        {
            if($deductions->type == 'fixed')
            {
                $totaldeduction  = $deductions->amount;
            }
            else
            {
                $totaldeduction  = $deductions->amount * $this->salary / 100;
            }
            $total_saturation_deduction += $totaldeduction ;
        }

        //OtherPayment
        $other_payments      = OtherPayment::where('employee_id', '=', $this->id)->get();
        $total_other_payment = 0;
        $total_other_payment = 0 ;
        foreach($other_payments as $otherPayment)
        {
            if($otherPayment->type == 'fixed')
            {
                $totalother  = $otherPayment->amount;
            }
            else
            {
                $totalother  = $otherPayment->amount * $this->salary / 100;
            }
            $total_other_payment += $totalother ;
        }

        //Overtime
        $over_times      = Overtime::where('employee_id', '=', $this->id)->get();
        $total_over_time = 0;
        foreach($over_times as $over_time)
        {
            $total_work      = $over_time->number_of_days * $over_time->hours;
            $amount          = $total_work * $over_time->rate;
            $total_over_time = $amount + $total_over_time;
        }


        //Net Salary Calculate
        $advance_salary = $total_allowance + $total_commission - $total_loan - $total_saturation_deduction + $total_other_payment + $total_over_time;

        $employee       = User::where('id', '=', $this->id)->first();

        $net_salary     = (!empty($employee->salary) ? $employee->salary : 0) + $advance_salary;

        return $net_salary;

    }

    public function employeeIdFormat($number)
    {
        $settings = Utility::settings();

        return $settings["employee_prefix"] . sprintf("%05d", $number);
    }
    public function getEmployee($employee)
    {
        $employee = User::where('id', '=', $employee)->first();

        return $employee;
    }

    public function getLeaveType($leave_type)
    {
        $leavetype = LeaveType::where('id', '=', $leave_type)->first();

        return $leavetype;
    }

    public function present_status($employee_id, $data)
    {
        return AttendanceEmployee::where('employee_id', $employee_id)->where('date', $data)->first();
    }

    public static function employee_salary($salary)
    {
        $employee = User::where("salary", $salary)->first();
        if ($employee->salary == '0' || $employee->salary == '0.0') {
            return "-";
        } else {
            return $employee->salary;
        }
    }

    public static function allowance($id)
    {

        //allowance
        $allowances      = Allowance::where('employee_id', '=', $id)->get();
        $total_allowance = 0;
        foreach($allowances as $allowance)
        {
            $total_allowance = $allowance->amount + $total_allowance;
        }

        $allowance_json = json_encode($allowances);

        return $allowance_json;

    }

    public static function commission($id)
    {
        //commission
        $commissions      = Commission::where('employee_id', '=', $id)->get();
        $total_commission = 0;
        foreach($commissions as $commission)
        {
            $total_commission = $commission->amount + $total_commission;
        }
        $commission_json = json_encode($commissions);

        return $commission_json;

    }

    public static function loan($id)
    {
        //Loan
        $loans      = Loan::where('employee_id', '=', $id)->get();
        $total_loan = 0;
        foreach($loans as $loan)
        {
            $total_loan = $loan->amount + $total_loan;
        }
        $loan_json = json_encode($loans);

        return $loan_json;
    }

    public static function saturation_deduction($id)
    {
        //Saturation Deduction
        $saturation_deductions      = SaturationDeduction::where('employee_id', '=', $id)->get();
        $total_saturation_deduction = 0;
        foreach($saturation_deductions as $saturation_deduction)
        {
            $total_saturation_deduction = $saturation_deduction->amount + $total_saturation_deduction;
        }
        $saturation_deduction_json = json_encode($saturation_deductions);

        return $saturation_deduction_json;

    }

    public static function other_payment($id)
    {
        //OtherPayment
        $other_payments      = OtherPayment::where('employee_id', '=', $id)->get();
        $total_other_payment = 0;
        foreach($other_payments as $other_payment)
        {
            $total_other_payment = $other_payment->amount + $total_other_payment;
        }
        $other_payment_json = json_encode($other_payments);

        return $other_payment_json;
    }

    public static function overtime($id)
    {
        //Overtime
        $over_times      = Overtime::where('employee_id', '=', $id)->get();
        $total_over_time = 0;
        foreach($over_times as $over_time)
        {
            $total_work      = $over_time->number_of_days * $over_time->hours;
            $amount          = $total_work * $over_time->rate;
            $total_over_time = $amount + $total_over_time;
        }
        $over_time_json = json_encode($over_times);

        return $over_time_json;
    }
    public function documents()
    {
        return $this->hasMany('Modules\HRMSystem\Models\EmployeeDocument', 'employee_id', 'employee_id')->get();
    }

    public function hasClockedInToday()
    {
        return $this->attendance()->whereDate('date', now()->toDateString())->where('status', 'Clock In')->exists();
    }

    // Add this relationship to the User model
    public function attendance()
    {
        return $this->hasMany(AttendanceEmployee::class, 'employee_id');
    }


    public function generateTwoFactorCode(): void
    {
        $this->timestamps = false;  // Prevent updating the 'updated_at' column
        $this->two_factor_code = rand(100000, 999999);  // Generate a random code
        $this->two_factor_expires_at = Carbon::now()->addMinutes(10);  // Set expiration time
        $this->save();
    }

    public function resetTwoFactorCode(): void
    {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

}
