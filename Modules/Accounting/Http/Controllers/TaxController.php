<?php

namespace Modules\Accounting\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Accounting\Models\BillProduct;
use Modules\Accounting\Models\InvoiceProduct;
use Modules\Accounting\Models\ProposalProduct;
use Modules\Accounting\Models\Tax;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TaxController extends AppBaseController
{


    public function index()
    {
        if(Auth::user()->can('manage constant tax'))
        {
            $taxes = Tax::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('accounting::taxes.index')->with('taxes', $taxes);
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create constant tax'))
        {
            return view('accounting::taxes.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create constant tax'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required|max:50',
                                   'rate' => 'required|numeric',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $tax             = new Tax();
            $tax->name       = $request->name;
            $tax->rate       = $request->rate;
            $tax->created_by = Auth::user()->creatorId();
            $tax->save();

            return redirect()->route('taxes.index')->with('success', __('Tax rate successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Tax $tax)
    {
        return redirect()->route('taxes.index');
    }


    public function edit(Tax $tax)
    {
        if(Auth::user()->can('edit constant tax'))
        {
            if($tax->created_by == Auth::user()->creatorId())
            {
                return view('accounting::taxes.edit', compact('tax'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, Tax $tax)
    {
        if(Auth::user()->can('edit constant tax'))
        {
            if($tax->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                       'rate' => 'required|numeric',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $tax->name = $request->name;
                $tax->rate = $request->rate;
                $tax->save();

                return redirect()->route('taxes.index')->with('success', __('Tax rate successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Tax $tax)
    {
        if(Auth::user()->can('delete constant tax'))
        {
            if($tax->created_by == Auth::user()->creatorId())
            {
                $proposalData = ProposalProduct::whereRaw("find_in_set('$tax->id',tax)")->first();
                $billData     = BillProduct::whereRaw("find_in_set('$tax->id',tax)")->first();
                $invoiceData  = InvoiceProduct::whereRaw("find_in_set('$tax->id',tax)")->first();

                if(!empty($proposalData) || !empty($billData) || !empty($invoiceData))
                {
                    return redirect()->back()->with('error', __('this tax is already assign to proposal or bill or invoice so please move or remove this tax related data.'));
                }

                $tax->delete();

                return redirect()->route('taxes.index')->with('success', __('Tax rate successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
