<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Shared\Models\Department;
use Modules\HRMSystem\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DesignationController extends AppBaseController
{
    public function index()
    {

        if(Auth::user()->can('manage designation'))
        {
            $designations = Designation::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('hrmsystem::designation.index', compact('designations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create designation'))
        {
            $departments = Department::get();
            $departments = $departments->pluck('name', 'id');

            return view('hrmsystem::designation.create', compact('departments'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if(Auth::user()->can('create designation'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'department_id' => 'required',
                                   'name' => 'required|max:20',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $designation                = new Designation();
            $designation->department_id = $request->department_id;
            $designation->name          = $request->name;
            $designation->created_by    = Auth::user()->creatorId();

            $designation->save();

            return redirect()->route('designation.index')->with('success', __('Designation  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Designation $designation)
    {
        return redirect()->route('designation.index');
    }

    public function edit(Designation $designation)
    {

        if(Auth::user()->can('edit designation'))
        {
            if($designation->created_by == Auth::user()->creatorId())
            {

                $departments = Department::get();
            $departments = $departments->pluck('name', 'id');

                return view('hrmsystem::designation.edit', compact('designation', 'departments'));
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

    public function update(Request $request, Designation $designation)
    {
        if(Auth::user()->can('edit designation'))
        {
            if($designation->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'department_id' => 'required',
                                       'name' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                $designation->name          = $request->name;
                $designation->department_id = $request->department_id;
                $designation->save();

                return redirect()->route('designation.index')->with('success', __('Designation  successfully updated.'));
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

    public function destroy(Designation $designation)
    {
        if(Auth::user()->can('delete designation'))
        {
            if($designation->created_by == Auth::user()->creatorId())
            {
                $designation->delete();

                return redirect()->route('designation.index')->with('success', __('Designation successfully deleted.'));
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
