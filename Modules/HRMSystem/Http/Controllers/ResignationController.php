<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\Resignation;
use App\Models\User;
use Modules\Accounting\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ResignationController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage resignation'))
        {
            if(Auth::user()->hasRole('super-admin')){

                $resignations = Resignation::get();

            }else if(Auth::user()->hasRole('user'))
            {
                $emp          = User::where('id', '=', Auth::user()->id)->first();
                $resignations = Resignation::where('created_by', '=', Auth::user()->creatorId())->where('employee_id', '=', $emp->id)->get();
            }
            else
            {
                $resignations = Resignation::where('created_by', '=', Auth::user()->creatorId())->get();
            }

            return view('hrmsystem::resignation.index', compact('resignations'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create resignation'))
        {
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');

            return view('hrmsystem::resignation.create', compact('employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create resignation'))
        {

            $validator = Validator::make(
                $request->all(), [

                                   'notice_date' => 'required',
                                   'resignation_date' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $resignation = new Resignation();
            $user        = Auth::user();
            if(Auth::user()->hasRole('user'))
            {
                $employee                 = User::where('user_id', $user->id)->first();
                $resignation->employee_id = $employee->id;
            }
            else
            {
                $resignation->employee_id = $request->employee_id;
            }
            $resignation->notice_date      = $request->notice_date;
            $resignation->resignation_date = $request->resignation_date;
            $resignation->description      = $request->description;
            $resignation->created_by       = Auth::user()->creatorId();

            $resignation->save();
            $setings = Utility::settings();
            if($setings['resignation_sent'] == 1)
            {
                $employee           = User::find($resignation->employee_id);
                $resignation->name  = $employee->name;
                $resignation->email = $employee->email;

                $resignationArr = [
                    'resignation_email'=>$employee->email,
                    'assign_user'=>$employee->name,
                    'resignation_date'  =>$resignation->resignation_date,
                    'notice_date'  =>$resignation->notice_date,

                ];
//                dd($resignationArr);
                $resp = Utility::sendEmailTemplate('resignation_sent', [$employee->email], $resignationArr);



                return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.'). ((!empty($resp) && $resp['is_success'] == false && !empty($resp['error'])) ? '<br> <span class="text-danger">' . $resp['error'] . '</span>' : ''));

            }

//            $setings = Utility::settings();
//            if($setings['employee_resignation'] == 1)
//            {
//                $employee           = Employee::find($resignation->employee_id);
//                $resignation->name  = $employee->name;
//                $resignation->email = $employee->email;
//                try
//                {
//                    Mail::to($resignation->email)->send(new ResignationSend($resignation));
//                }
//                catch(\Exception $e)
//                {
//                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
//                }
//
//
//                $user           = User::find($employee->created_by);
//                $resignation->name  = $user->name;
//                $resignation->email = $user->email;
//                try
//                {
//                    Mail::to($resignation->email)->send(new ResignationSend($resignation));
//                }
//                catch(\Exception $e)
//                {
//                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
//                }
//
//                return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.') . (isset($smtp_error) ? $smtp_error : ''));
//
//            }

            return redirect()->route('resignation.index')->with('success', __('Resignation  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Resignation $resignation)
    {
        return redirect()->route('resignation.index');
    }

    public function edit(Resignation $resignation)
    {
        if(Auth::user()->can('edit resignation'))
        {
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');

            if($resignation->created_by == Auth::user()->creatorId())
            {

                return view('hrmsystem::resignation.edit', compact('resignation', 'employees'));
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

    public function update(Request $request, Resignation $resignation)
    {
        if(Auth::user()->can('edit resignation'))
        {
            if($resignation->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [

                                       'notice_date' => 'required',
                                       'resignation_date' => 'required',
                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                if(!Auth::user()->hasRole('user'))
                {
                    $resignation->employee_id = $request->employee_id;
                }


                $resignation->notice_date      = $request->notice_date;
                $resignation->resignation_date = $request->resignation_date;
                $resignation->description      = $request->description;

                $resignation->save();

                return redirect()->route('resignation.index')->with('success', __('Resignation successfully updated.'));
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

    public function destroy(Resignation $resignation)
    {
        if(Auth::user()->can('delete resignation'))
        {
            if($resignation->created_by == Auth::user()->creatorId())
            {
                $resignation->delete();

                return redirect()->route('resignation.index')->with('success', __('Resignation successfully deleted.'));
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
