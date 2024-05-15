<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use Modules\DocumentManager\Models\Document;
use Modules\HRMSystem\Models\Designation;
use App\Models\User;
use Modules\HRMSystem\Models\Trainer;
use Modules\HRMSystem\Models\Training;
use Modules\HRMSystem\Models\TrainingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TrainingController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage training'))
        {
            $trainings = Training::where('created_by', '=', Auth::user()->creatorId())->get();
            $status    = Training::$Status;

            return view('hrmsystem::training.index', compact('trainings', 'status'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create training'))
        {
            $branches      = Branch::get()->pluck('branch_name', 'id');
            $trainingTypes = TrainingType::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $trainers      = Trainer::where('created_by', Auth::user()->creatorId())->get()->pluck('firstname', 'id');
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');
            $options       = Training::$options;

            return view('hrmsystem::training.create', compact('branches', 'trainingTypes', 'trainers', 'employees', 'options'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(Auth::user()->can('create training'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'training_type' => 'required',
                                   'training_cost' => 'required',
                                   'employee' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $training                 = new Training();
            $training->branch         = $request->branch;
            $training->trainer_option = $request->trainer_option;
            $training->training_type  = $request->training_type;
            $training->trainer        = $request->trainer;
            $training->training_cost  = $request->training_cost;
            $training->employee       = $request->employee;
            $training->start_date     = $request->start_date;
            $training->end_date       = $request->end_date;
            $training->description    = $request->description;
            $training->created_by     = Auth::user()->creatorId();
            $training->save();

            return redirect()->route('training.index')->with('success', __('Training successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show($id)
    {
        try {
            $traId       = Crypt::decrypt($id);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Training Not Found.'));
        }
        $traId       = Crypt::decrypt($id);
        $training    = Training::find($traId);
        $performance = Training::$performance;
        $status      = Training::$Status;

        return view('hrmsystem::training.show', compact('training', 'performance', 'status'));
    }

    public function profileShow($id)
    {
        if(Auth::user()->can('show employee profile'))
        {
            $empId        = Crypt::decrypt($id);
            $documents    = Document::get();
            $branches     = Branch::get()->pluck('branch_name', 'id');
            $departments  = Department::get()->pluck('name', 'id');
            $designations = Designation::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employee     = User::find($empId);
            $employeesId  = Auth::user()->employeeIdFormat($employee->id);

            return view('hrmsystem::training.show_user', compact('employee', 'employeesId', 'branches', 'departments', 'designations', 'documents'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(Training $training)
    {
        if(Auth::user()->can('create training'))
        {
            $branches      = Branch::get()->pluck('branch_name', 'id');
            $trainingTypes = TrainingType::where('created_by', Auth::user()->creatorId())->get()->pluck('name', 'id');
            $trainers      = Trainer::where('created_by', Auth::user()->creatorId())->get()->pluck('firstname', 'id');
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');
            $options       = Training::$options;

            return view('hrmsystem::training.edit', compact('branches', 'trainingTypes', 'trainers', 'employees', 'options', 'training'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Training $training)
    {
        if(Auth::user()->can('edit training'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'training_type' => 'required',
                                   'training_cost' => 'required',
                                   'employee' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $training->branch         = $request->branch;
            $training->trainer_option = $request->trainer_option;
            $training->training_type  = $request->training_type;
            $training->trainer        = $request->trainer;
            $training->training_cost  = $request->training_cost;
            $training->employee       = $request->employee;
            $training->start_date     = $request->start_date;
            $training->end_date       = $request->end_date;
            $training->description    = $request->description;
            $training->save();

            return redirect()->route('training.index')->with('success', __('Training successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Training $training)
    {
        if(Auth::user()->can('delete training'))
        {
            if($training->created_by == Auth::user()->creatorId())
            {
                $training->delete();

                return redirect()->route('training.index')->with('success', __('Training successfully deleted.'));
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

    public function updateStatus(Request $request)
    {
        $training              = Training::find($request->id);
        $training->performance = $request->performance;
        $training->status      = $request->status;
        $training->remarks     = $request->remarks;
        $training->save();

        return redirect()->route('training.index')->with('success', __('Training status successfully updated.'));
    }
}
