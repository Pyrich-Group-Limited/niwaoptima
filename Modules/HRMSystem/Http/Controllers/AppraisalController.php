<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\Appraisal;
use Modules\Shared\Models\Branch;
use Modules\HRMSystem\Models\Competencies;
use App\Models\User;
use Modules\HRMSystem\Models\Indicator;
use Modules\HRMSystem\Models\PerformanceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppraisalController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage appraisal'))
        {
            $user = Auth::user();
            if(Auth::user()->hasRole('super-admin')){
                $competencyCount = Competencies::count();

                $appraisals = Appraisal::get();
            }else if(Auth::user()->hasRole('user'))
            {
                $employee   = User::where('id', $user->id)->first();
                $competencyCount = Competencies::where('created_by', '=', $user->creatorId())->count();
                $appraisals = Appraisal::where('created_by', '=', Auth::user()->creatorId())->where('branch', $employee->branch_id)->where('employee', $employee->id)->get();
            }
            else
            {
                $competencyCount = Competencies::where('created_by', '=', $user->creatorId())->count();

                $appraisals = Appraisal::where('created_by', '=', Auth::user()->creatorId())->get();
            }

            return view('hrmsystem::appraisal.index', compact('appraisals','competencyCount'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create appraisal'))
        {

            $performance     = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get();
            $brances = Branch::get();
            return view('hrmsystem::appraisal.create', compact( 'brances', 'performance'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {

        if(Auth::user()->can('create appraisal'))
        {
            $validator = Validator::make(
                $request->all(), [
                    'branch' => 'required',
                    'employee' => 'required',
                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $appraisal                 = new Appraisal();
            $appraisal->branch         = $request->branch;
            $appraisal->employee       = $request->employee;
            $appraisal->appraisal_date = $request->appraisal_date;
            $appraisal->rating         = json_encode($request->rating, true);
            $appraisal->remark         = $request->remark;
            $appraisal->created_by     = Auth::user()->creatorId();
            $appraisal->save();

            return redirect()->route('appraisal.index')->with('success', __('Appraisal successfully created.'));
        }
    }

    public function show(Appraisal $appraisal)
    {
        $rating = json_decode($appraisal->rating, true);
        $performance_types     = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get();
        $employee = User::find($appraisal->employee);

        $indicator = Indicator::where('branch',$employee->branch_id)->where('department',$employee->department_id)->where('designation',$employee->designation_id)->first();
        $ratings = json_decode($indicator->rating, true);

        return view('hrmsystem::appraisal.show', compact('appraisal', 'performance_types', 'ratings','rating'));
    }

    public function edit(Appraisal $appraisal)
    {
        if(Auth::user()->can('edit appraisal'))
        {

            $performance_types     = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get();
            $brances = Branch::get();
            $ratings = json_decode($appraisal->rating,true);


            return view('hrmsystem::appraisal.edit', compact( 'brances', 'appraisal', 'performance_types','ratings'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, Appraisal $appraisal)
    {
        if(Auth::user()->can('edit appraisal'))
        {
            $validator = Validator::make(
                $request->all(), [
                    'branch' => 'required',
                    'employee' => 'required',
                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $appraisal->branch         = $request->branch;
            $appraisal->employee       = $request->employee;
            $appraisal->appraisal_date = $request->appraisal_date;
            $appraisal->rating         = json_encode($request->rating, true);
            $appraisal->remark         = $request->remark;
            $appraisal->save();

            return redirect()->route('appraisal.index')->with('success', __('Appraisal successfully updated.'));
        }
    }

    public function destroy(Appraisal $appraisal)
    {
        if(Auth::user()->can('delete appraisal'))
        {
            if($appraisal->created_by == Auth::user()->creatorId())
            {
                $appraisal->delete();

                return redirect()->route('appraisal.index')->with('success', __('Appraisal successfully deleted.'));
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

    public function empByStar(Request $request)
    {
        $employee = User::find($request->employee);

        $indicator = Indicator::where('branch',$employee->branch_id)->where('department',$employee->department_id)->where('designation',$employee->designation_id)->first();

        $ratings = !empty($indicator)? json_decode($indicator->rating, true):[];

        $performance_types = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get();

        $viewRender = view('hrmsystem::appraisal.star', compact('ratings','performance_types'))->render();
        // dd($viewRender);
        return response()->json(array('success' => true, 'html'=>$viewRender));

    }

    public function empByStar1(Request $request)
    {
        $employee = User::find($request->employee);

        $appraisal = Appraisal::find($request->appraisal);

        $indicator = Indicator::where('branch',$employee->branch_id)->where('department',$employee->department_id)->where('designation',$employee->designation_id)->first();

        $ratings = json_decode($indicator->rating, true);
        $rating = json_decode($appraisal->rating,true);
        $performance_types = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get();
        $viewRender = view('hrmsystem::appraisal.staredit', compact('ratings','rating','performance_types'))->render();
        // dd($viewRender);
        return response()->json(array('success' => true, 'html'=>$viewRender));

    }

    public function getemployee(Request $request)
    {
        $data['employee'] = User::whereHas('staff', function ($query) use ($request) {
            $query->where('branch_id', $request->branch_id);
        })->get();
        
         return response()->json($data);
    }
}
