<?php

namespace Modules\Accounting\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Accounting\Models\ChartOfAccountSubType;
use Modules\Accounting\Models\ChartOfAccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChartOfAccountSubTypeController extends AppBaseController
{

    public function index()
    {
        /* if(\Auth::user()->can('manage constant chart of account type'))
        { */
            $subtypes = ChartOfAccountSubType::get();

            return view('accounting::chartOfAccountSubType.index', compact('subtypes'));
        /* }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }


    public function create()
    {
        $types = ChartOfAccountType::get()->pluck('name', 'id');
        $types->prepend('Select Account Type', 0);
        
        return view('accounting::chartOfAccountSubType.create', compact('types'));
    }


    public function store(Request $request)
    {
        /* if(\Auth::user()->can('create constant chart of account type'))
        { */
            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'type' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $account             = new ChartOfAccountSubType();
            $account->name       = $request->name;
            $account->type = $request->type;
            $account->save();

            return redirect()->route('chart-of-account-subtype.index')->with('success', __('Chart of account sub-type successfully created.'));
        /* }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }


    public function show(ChartOfAccountSubType $chartOfAccountType)
    {
        //
    }


    public function edit(ChartOfAccountSubType $chartOfAccountType)
    {
        $types = ChartOfAccountType::where('created_by', '=', Auth::user()->creatorId())->get();
        return view('accounting::chartOfAccountSubType.edit', compact('chartOfAccountType','types'));
    }


    public function update(Request $request, ChartOfAccountSubType $chartOfAccountType)
    {
        /* if(\Auth::user()->can('edit constant chart of account type'))
        { */
            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'type' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $chartOfAccountType->name = $request->name;
            $chartOfAccountType->save();

            return redirect()->route('chart-of-account-subtype.index')->with('success', __('Chart of account sub-type successfully updated.'));
        /* }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }


    public function destroy(ChartOfAccountSubType $chartOfAccountType)
    {
       /*  if(\Auth::user()->can('delete constant chart of account type'))
        { */
            $chartOfAccountType->delete();

            return redirect()->route('chart-of-account-subtype.index')->with('success', __('Chart of account sub-type successfully deleted.'));
        /* }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        } */
    }
}
