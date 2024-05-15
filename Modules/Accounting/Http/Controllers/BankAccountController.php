<?php

namespace Modules\Accounting\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Accounting\Models\BankAccount;
use Modules\Accounting\Models\BillPayment;
use Modules\Accounting\Models\ChartOfAccount;
use Modules\Accounting\Models\CustomField;
use Modules\Accounting\Models\InvoicePayment;
use Modules\Accounting\Models\Payment;
use Modules\Accounting\Models\Revenue;
use Modules\Accounting\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BankAccountController extends AppBaseController
{

    public function index()
    {
        /* if(\Auth::user()->can('create bank account'))
        { */
            $accounts = BankAccount::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('accounting::bankAccount.index', compact('accounts'));
       /*  }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }

    public function create()
    {
        /* if(\Auth::user()->can('create bank account'))
        { */
            $chart_accounts = ChartOfAccount::select(DB::raw('CONCAT(code, " - ", name) AS code_name, id'))
                ->where('created_by', Auth::user()->creatorId())->get()
                ->pluck('code_name', 'id');
            $chart_accounts->prepend('Select Account', '');
            $customFields = CustomField::where('created_by', '=', Auth::user()->creatorId())->where('module', '=', 'account')->get();

            return view('accounting::bankAccount.create', compact('customFields','chart_accounts'));
       /*  }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        } */
    }

    public function store(Request $request)
    {
        /* if(\Auth::user()->can('create bank account'))
        { */

            $validator = Validator::make(
                $request->all(), [
                    'holder_name' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'opening_balance' => 'required',
                    'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('bank-account.index')->with('error', $messages->first());
            }

            $account                  = new BankAccount();
            $account->chart_account_id = $request->chart_account_id;
            $account->holder_name     = $request->holder_name;
            $account->bank_name       = $request->bank_name;
            $account->account_number  = $request->account_number;
            $account->opening_balance = $request->opening_balance;
            $account->contact_number  = $request->contact_number;
            $account->bank_address    = $request->bank_address;
            $account->created_by      = Auth::user()->creatorId();
            $account->save();
            CustomField::saveData($account, $request->customField);

            return redirect()->route('bank-account.index')->with('success', __('Account successfully created.'));
       /*  }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }


    public function show()
    {
        return redirect()->route('bank-account.index');
    }


    public function edit(BankAccount $bankAccount)
    {
        /* if(\Auth::user()->can('edit bank account'))
        { */
            if($bankAccount->created_by == Auth::user()->creatorId())
            {
                $chart_accounts = ChartOfAccount::select(DB::raw('CONCAT(code, " - ", name) AS code_name, id'))
                    ->where('created_by', Auth::user()->creatorId())->get()
                    ->pluck('code_name', 'id');
                $chart_accounts->prepend('Select Account', '');

                $bankAccount->customField = CustomField::getData($bankAccount, 'account');
                $customFields             = CustomField::where('created_by', '=', Auth::user()->creatorId())->where('module', '=', 'account')->get();

                return view('accounting::bankAccount.edit', compact('bankAccount', 'customFields','chart_accounts'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        /* }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        } */
    }


    public function update(Request $request, BankAccount $bankAccount)
    {
        /* if(\Auth::user()->can('create bank account'))
        { */

            $validator = Validator::make(
                $request->all(), [
                    'holder_name' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'opening_balance' => 'required',
                    'contact_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
                ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->route('bank-account.index')->with('error', $messages->first());
            }
            $bankAccount->chart_account_id = $request->chart_account_id;
            $bankAccount->holder_name     = $request->holder_name;
            $bankAccount->bank_name       = $request->bank_name;
            $bankAccount->account_number  = $request->account_number;
            $bankAccount->opening_balance = $request->opening_balance;
            $bankAccount->contact_number  = $request->contact_number;
            $bankAccount->bank_address    = $request->bank_address;
            $bankAccount->created_by      = Auth::user()->creatorId();
            $bankAccount->save();
            CustomField::saveData($bankAccount, $request->customField);

            return redirect()->route('bank-account.index')->with('success', __('Account successfully updated.'));
        /* }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }


    public function destroy(BankAccount $bankAccount)
    {
        /* if(\Auth::user()->can('delete bank account'))
        { */
            if($bankAccount->created_by == Auth::user()->creatorId())
            {
                $revenue        = Revenue::where('account_id', $bankAccount->id)->first();
                $invoicePayment = InvoicePayment::where('account_id', $bankAccount->id)->first();
                $transaction    = Transaction::where('account', $bankAccount->id)->first();
                $payment        = Payment::where('account_id', $bankAccount->id)->first();
                $billPayment    = BillPayment::first();

                if(!empty($revenue) && !empty($invoicePayment) && !empty($transaction) && !empty($payment) && !empty($billPayment))
                {
                    return redirect()->route('bank-account.index')->with('error', __('Please delete related record of this account.'));
                }
                else
                {
                    $bankAccount->delete();

                    return redirect()->route('bank-account.index')->with('success', __('Account successfully deleted.'));
                }

            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
       /*  }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }
}
