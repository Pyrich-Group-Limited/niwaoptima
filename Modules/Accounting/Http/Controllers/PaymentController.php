<?php

namespace Modules\Accounting\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Accounting\Models\Utility;
use Illuminate\Support\Facades\Validator;
use Modules\Accounting\Models\BankAccount;
use Modules\Accounting\Models\BillPayment;
use Modules\Accounting\Models\Transaction;
use App\Http\Controllers\AppBaseController;
use Modules\EmployerManager\Models\Payment;
use Modules\Accounting\Models\ProductServiceCategory;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Models\Payment as ModelsPayment;

class PaymentController extends AppBaseController
{

    public function index(Request $request)
    {
        if (Auth::user()->can('manage payment')) {

            $vender = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id')->prepend('Select Vendor', '');

            $account = BankAccount::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('holder_name', 'id');
            $account->prepend('Select Account', '');

            $category = ProductServiceCategory::where('created_by', '=', Auth::user()->creatorId())->where('type', '=', 'expense')->get()->pluck('name', 'id');
            $category->prepend('Select Category', '');


            $query = Payment::where('created_by', '=', Auth::user()->creatorId());

            if (count(explode('to', $request->date)) > 1) {
                $date_range = explode(' to ', $request->date);
                $query->whereBetween('date', $date_range);
            } elseif (!empty($request->date)) {
                $date_range = [$request->date, $request->date];
                $query->whereBetween('date', $date_range);
            }

            if (!empty($request->vender)) {
                $query->where('id', '=', $request->vender);
            }
            if (!empty($request->account)) {
                $query->where('account_id', '=', $request->account);
            }

            if (!empty($request->category)) {
                $query->where('category_id', '=', $request->category);
            }


            $payments = $query->get();


            return view('accounting::payment.index', compact('payments', 'account', 'category', 'vender'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function paymenthistory()
    {

        $payment = ModelsPayment::orderBy('id', 'desc')->get();
        // dd($payment);
        return view('accounting::payment.history', compact('payment'));
    }

    public function paymenthistoryedit($id)
    {
        $data = Payment::findOrFail($id);

        $applicant = Employer::get()->pluck('company_name', 'id');
        // dd($data);
        // dd($data->employer->company_name);
        return view('accounting::payment.historyedit', compact('data', 'applicant'));
    }

    public function paymenthistoryupdate($id, Request $request)
    {
        $data = Payment::findOrFail($id);

        $data->update($request->all());
        return redirect()->route('payhistory')->with('success', 'updated successfully');
    }
    public function create()
    {
        if (Auth::user()->can('create payment')) {
            $venders = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id')->prepend('--', 0);

            $categories = ProductServiceCategory::where('created_by', '=', Auth::user()->creatorId())->where('type', '=', 'expense')->get()->pluck('name', 'id');
            $accounts   = BankAccount::select('*', DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('accounting::payment.create', compact('venders', 'categories', 'accounts'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {

        //        dd($request->all());

        if (Auth::user()->can('create payment')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'date' => 'required',
                    'amount' => 'required',
                    'account_id' => 'required',
                    'category_id' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $payment                 = new Payment();
            $payment->date           = $request->date;
            $payment->amount         = $request->amount;
            $payment->account_id     = $request->account_id;
            $payment->vender_id      = $request->vender_id;
            $payment->category_id    = $request->category_id;
            $payment->payment_method = 0;
            $payment->reference      = $request->reference;
            if (!empty($request->add_receipt)) {

                $fileName = time() . "_" . $request->add_receipt->getClientOriginalName();
                $payment->add_receipt = $fileName;
                $dir        = 'uploads/payment';
                $path = Utility::upload_file($request, 'add_receipt', $fileName, $dir, []);
                if ($path['flag'] == 0) {
                    return redirect()->back()->with('error', __($path['msg']));
                }
                //                $request->add_receipt  = $path['url'];
                //                $payment->save();
            }


            $payment->description    = $request->description;
            $payment->created_by     = Auth::user()->creatorId();
            $payment->save();

            $category            = ProductServiceCategory::where('id', $request->category_id)->first();
            $payment->payment_id = $payment->id;
            $payment->type       = 'Payment';
            $payment->category   = $category->name;
            $payment->user_id    = $payment->vender_id;
            $payment->user_type  = 'Vender';
            $payment->account    = $request->account_id;

            Transaction::addTransaction($payment);

            $vender          = User::where('id', $request->vender_id)->first();
            $payment         = new BillPayment();
            $payment->name   = !empty($vender) ? $vender['name'] : '';
            $payment->method = '-';
            $payment->date   = Auth::user()->dateFormat($request->date);
            $payment->amount = Auth::user()->priceFormat($request->amount);
            $payment->bill   = '';

            if (!empty($vender)) {
                Utility::userBalance('vendor', $vender->id, $request->amount, 'debit');
            }

            Utility::bankAccountBalance($request->account_id, $request->amount, 'debit');


            //For Notification
            $setting  = Utility::settings(Auth::user()->creatorId());
            $vender = User::find($request->vender_id);
            $paymentNotificationArr = [
                'payment_amount' => Auth::user()->priceFormat($request->amount),
                'vendor_name' => $vender->name,
                'payment_type' =>  'Payment',
            ];
            //Twilio Notification
            /* if(isset($setting['twilio_payment_notification']) && $setting['twilio_payment_notification'] ==1)
            {
                Utility::send_twilio_msg($request->contact,'bill_payment', $paymentNotificationArr);
            }
 */
            return redirect()->route('payment.index')->with('success', __('Payment successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit(Payment $payment)
    {

        if (Auth::user()->can('edit payment')) {

            $venders = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id')->prepend('--', 0);
            $categories = ProductServiceCategory::where('created_by', '=', Auth::user()->creatorId())->get()->where('type', '=', 'expense')->pluck('name', 'id');

            $accounts = BankAccount::select('*', DB::raw("CONCAT(bank_name,' ',holder_name) AS name"))->where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('accounting::payment.edit', compact('venders', 'categories', 'accounts', 'payment'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Payment $payment)
    {
        if (Auth::user()->can('edit payment')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'date' => 'required',
                    'amount' => 'required',
                    'account_id' => 'required',
                    'vender_id' => 'required',
                    'category_id' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $vender = User::where('id', $request->vender_id)->first();
            if (!empty($vender)) {
                Utility::userBalance('vendor', $vender->id, $payment->amount, 'credit');
            }
            Utility::bankAccountBalance($payment->account_id, $payment->amount, 'credit');

            $payment->date           = $request->date;
            $payment->amount         = $request->amount;
            $payment->account_id     = $request->account_id;
            $payment->vender_id      = $request->vender_id;
            $payment->category_id    = $request->category_id;
            $payment->payment_method = 0;
            $payment->reference      = $request->reference;

            if (!empty($request->add_receipt)) {

                if ($payment->add_receipt) {
                    $path = storage_path('uploads/payment' . $payment->add_receipt);
                    if (file_exists($path)) {
                        \File::delete($path);
                    }
                }
                $fileName = time() . "_" . $request->add_receipt->getClientOriginalName();
                $payment->add_receipt = $fileName;
                $dir        = 'uploads/payment';
                $path = Utility::upload_file($request, 'add_receipt', $fileName, $dir, []);
                if ($path['flag'] == 0) {
                    return redirect()->back()->with('error', __($path['msg']));
                }
                //                $request->add_receipt  = $fileName;
                //                $payment->save();
            }

            $payment->description    = $request->description;
            $payment->save();

            $category            = ProductServiceCategory::where('id', $request->category_id)->first();
            $payment->category   = $category->name;
            $payment->payment_id = $payment->id;
            $payment->type       = 'Payment';
            $payment->account    = $request->account_id;
            Transaction::editTransaction($payment);

            if (!empty($vender)) {
                Utility::userBalance('vendor', $vender->id, $request->amount, 'debit');
            }

            Utility::bankAccountBalance($request->account_id, $request->amount, 'debit');

            return redirect()->route('payment.index')->with('success', __('Payment successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Payment $payment)
    {
        if (Auth::user()->can('delete payment')) {
            if ($payment->created_by == Auth::user()->creatorId()) {
                $payment->delete();
                $type = 'Payment';
                $user = 'Vender';
                Transaction::destroyTransaction($payment->id, $type, $user);

                if ($payment->vender_id != 0) {
                    Utility::userBalance('vendor', $payment->vender_id, $payment->amount, 'credit');
                }
                Utility::bankAccountBalance($payment->account_id, $payment->amount, 'credit');

                return redirect()->route('payment.index')->with('success', __('Payment successfully deleted.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
