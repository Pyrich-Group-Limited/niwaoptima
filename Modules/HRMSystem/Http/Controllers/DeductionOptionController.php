<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\DeductionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DeductionOptionController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage deduction option'))
        {
            $deductionoptions = DeductionOption::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('hrmsystem::deductionoption.index', compact('deductionoptions'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create deduction option'))
        {
            return view('hrmsystem::deductionoption.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create deduction option'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $deductionoption             = new DeductionOption();
            $deductionoption->name       = $request->name;
            $deductionoption->created_by = Auth::user()->creatorId();
            $deductionoption->save();

            return redirect()->route('deductionoption.index')->with('success', __('DeductionOption  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(DeductionOption $deductionoption)
    {
        return redirect()->route('deductionoption.index');
    }

    public function edit($deductionoption)
    {
        $deductionoption = DeductionOption::find($deductionoption);
        if(Auth::user()->can('edit deduction option'))
        {
            if($deductionoption->created_by == Auth::user()->creatorId())
            {

                return view('hrmsystem::deductionoption.edit', compact('deductionoption'));
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

    public function update(Request $request, DeductionOption $deductionoption)
    {
        if(Auth::user()->can('edit deduction option'))
        {
            if($deductionoption->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'name' => 'required',

                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                $deductionoption->name = $request->name;
                $deductionoption->save();

                return redirect()->route('deductionoption.index')->with('success', __('DeductionOption successfully updated.'));
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

    public function destroy(DeductionOption $deductionoption)
    {
        if(Auth::user()->can('delete deduction option'))
        {
            if($deductionoption->created_by == Auth::user()->creatorId())
            {
                $deductionoption->delete();

                return redirect()->route('deductionoption.index')->with('success', __('DeductionOption successfully deleted.'));
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
