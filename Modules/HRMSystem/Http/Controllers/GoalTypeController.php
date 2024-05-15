<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\GoalType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GoalTypeController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage goal type'))
        {
            $goaltypes = GoalType::where('created_by', '=', Auth::user()->creatorId())->get();
            return view('hrmsystem::goaltype.index', compact('goaltypes'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create goal type'))
        {
            return view('hrmsystem::goaltype.create');
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(Auth::user()->can('create goal type'))
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

            $goaltype             = new GoalType();
            $goaltype->name       = $request->name;
            $goaltype->created_by = Auth::user()->creatorId();
            $goaltype->save();

            return redirect()->route('goaltype.index')->with('success', __('GoalType  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(GoalType $goalType)
    {
        //
    }


    public function edit($id)
    {

        if(Auth::user()->can('edit goal type'))
        {
            $goalType = GoalType::find($id);

            return view('hrmsystem::goaltype.edit', compact('goalType'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $id)
    {
        if(Auth::user()->can('edit goal type'))
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
            $goalType       = GoalType::find($id);
            $goalType->name = $request->name;
            $goalType->save();

            return redirect()->route('goaltype.index')->with('success', __('GoalType successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($id)
    {
        if(Auth::user()->can('delete goal type'))
        {
            $goalType = GoalType::find($id);
            if($goalType->created_by == Auth::user()->creatorId())
            {
                $goalType->delete();

                return redirect()->route('goaltype.index')->with('success', __('GoalType successfully deleted.'));
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
