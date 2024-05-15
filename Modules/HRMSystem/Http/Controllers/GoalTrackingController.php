<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Shared\Models\Branch;
use App\Models\User;
use Modules\HRMSystem\Models\GoalTracking;
use Modules\HRMSystem\Models\GoalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GoalTrackingController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage goal tracking'))
        {
            $user = Auth::user();
            if(Auth::user()->hasRole('super-admin')){

                $goalTrackings = GoalTracking::where('created_by', '=', Auth::user()->creatorId())->get();

            }else if(Auth::user()->hasRole('user'))
            {
                $employee      = User::where('id', $user->id)->first();
                $goalTrackings = GoalTracking::where('created_by', '=', Auth::user()->creatorId())->where('branch', $employee->branch_id)->get();
            }
            else
            {
                $goalTrackings = GoalTracking::where('created_by', '=', Auth::user()->creatorId())->get();
            }

            return view('hrmsystem::goaltracking.index', compact('goalTrackings'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create goal tracking'))
        {

            $brances = Branch::get()->pluck('branch_name', 'id');
            $brances->prepend('Select Branch', '');
            $goalTypes = GoalType::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $goalTypes->prepend('Select Goal Type', '');
            $status = GoalTracking::$status;

            return view('hrmsystem::goaltracking.create', compact('brances', 'goalTypes','status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(Auth::user()->can('create goal tracking'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'goal_type' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                                   'subject' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $goalTracking                     = new GoalTracking();
            $goalTracking->branch             = $request->branch;
            $goalTracking->goal_type          = $request->goal_type;
            $goalTracking->start_date         = $request->start_date;
            $goalTracking->end_date           = $request->end_date;
            $goalTracking->subject            = $request->subject;
            $goalTracking->target_achievement = $request->target_achievement;
            $goalTracking->description        = $request->description;
            $goalTracking->created_by         = Auth::user()->creatorId();
            $goalTracking->save();

            return redirect()->route('goaltracking.index')->with('success', __('Goal tracking successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(GoalTracking $goalTracking)
    {
        //
    }


    public function edit($id)
    {

        if(Auth::user()->can('edit goal tracking'))
        {
            $goalTracking = GoalTracking::find($id);
            $brances      = Branch::get()->pluck('branch_name', 'id');
            $brances->prepend('Select Branch', '');
            $goalTypes = GoalType::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $goalTypes->prepend('Select Goal Type', '');
            $status = GoalTracking::$status;

            $ratings = json_decode($goalTracking->rating,true);

            return view('hrmsystem::goaltracking.edit', compact('brances', 'goalTypes', 'goalTracking', 'ratings','status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $id)
    {
        if(Auth::user()->can('edit goal tracking'))
        {
            $goalTracking = GoalTracking::find($id);
            $validator    = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'goal_type' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                                   'subject' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $goalTracking->branch             = $request->branch;
            $goalTracking->goal_type          = $request->goal_type;
            $goalTracking->start_date         = $request->start_date;
            $goalTracking->end_date           = $request->end_date;
            $goalTracking->subject            = $request->subject;
            $goalTracking->target_achievement = $request->target_achievement;
            $goalTracking->status             = $request->status;
            $goalTracking->progress           = $request->progress;
            $goalTracking->description        = $request->description;
            $goalTracking->rating         = json_encode($request->rating, true);
            $goalTracking->rating        = $request->rating;
            $goalTracking->save();

            return redirect()->route('goaltracking.index')->with('success', __('Goal tracking successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }



    public function destroy($id)
    {

        if(Auth::user()->can('delete goal tracking'))
        {
            $goalTracking = GoalTracking::find($id);
            if($goalTracking->created_by == Auth::user()->creatorId())
            {
                $goalTracking->delete();

                return redirect()->route('goaltracking.index')->with('success', __('GoalTracking successfully deleted.'));
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
