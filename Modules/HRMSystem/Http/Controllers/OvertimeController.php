<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Modules\HRMSystem\Models\Overtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OvertimeController extends AppBaseController
{
    public function overtimeCreate($id)
    {
        $employee = User::find($id);

        return view('hrmsystem::overtime.create', compact('employee'));
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create overtime'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'employee_id' => 'required',
                                   'title' => 'required',
                                   'number_of_days' => 'required',
                                   'hours' => 'required',
                                   'rate' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $overtime                 = new Overtime();
            $overtime->employee_id    = $request->employee_id;
            $overtime->title          = $request->title;
            $overtime->number_of_days = $request->number_of_days;
            $overtime->hours          = $request->hours;
            $overtime->rate           = $request->rate;
            $overtime->created_by     = Auth::user()->creatorId();
            $overtime->save();

            return redirect()->back()->with('success', __('Overtime  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Overtime $overtime)
    {
        return redirect()->route('commision.index');
    }

    public function edit($overtime)
    {
        $overtime = Overtime::find($overtime);
        if(Auth::user()->can('edit overtime'))
        {
            if($overtime->created_by == Auth::user()->creatorId())
            {
                return view('hrmsystem::overtime.edit', compact('overtime'));
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

    public function update(Request $request, $overtime)
    {
        $overtime = Overtime::find($overtime);
        if(Auth::user()->can('edit overtime'))
        {
            if($overtime->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'title' => 'required',
                                       'number_of_days' => 'required',
                                       'hours' => 'required',
                                       'rate' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $overtime->title          = $request->title;
                $overtime->number_of_days = $request->number_of_days;
                $overtime->hours          = $request->hours;
                $overtime->rate           = $request->rate;
                $overtime->save();

                return redirect()->back()->with('success', __('Overtime successfully updated.'));
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

    public function destroy(Overtime $overtime)
    {
        if(Auth::user()->can('delete overtime'))
        {
            if($overtime->created_by == Auth::user()->creatorId())
            {
                $overtime->delete();

                return redirect()->back()->with('success', __('Overtime successfully deleted.'));
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
