<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Modules\Accounting\Models\Utility;
use Modules\HRMSystem\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class WarningController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage warning'))
        {
            if(Auth::user()->hasRole('super-admin')){

                $warnings = Warning::get();

            }else if(Auth::user()->hasRole('user'))
            {
                $emp      = User::where('user_id', '=', Auth::user()->id)->first();
                $warnings = Warning::where('warning_by', '=', $emp->id)->get();
            }
            else
            {
                $warnings = Warning::where('created_by', '=', Auth::user()->creatorId())->get();
            }

            return view('hrmsystem::warning.index', compact('warnings'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create warning'))
        {
            if(Auth::user()->hasRole('user'))
            {
                $user             = Auth::user();
                $current_employee = User::where('id', $user->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
                $employees = User::where('id','!=', $user->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
            }
            else
            {
                $user             = Auth::user();
                $current_employee = User::where('id', $user->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
                $employees = User::where('created_by', Auth::user()->creatorId())->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
            }

            return view('hrmsystem::warning.create', compact('employees', 'current_employee'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create warning'))
        {
            if(!Auth::user()->hasRole('user'))
            {
                $validator = Validator::make(
                    $request->all(), [
                                       'warning_by' => 'required',
                                   ]
                );
            }

            $validator = Validator::make(
                $request->all(), [
                                   'warning_to' => 'required',
                                   'subject' => 'required',
                                   'warning_date' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $warning = new Warning();
            if(Auth::user()->hasRole('user'))
            {
                $emp                 = User::where('id', '=', Auth::user()->id)->first();
                $warning->warning_by = $emp->id;
            }
            else
            {
                $warning->warning_by = $request->warning_by;
            }
            $warning->warning_to   = $request->warning_to;
            $warning->subject      = $request->subject;
            $warning->warning_date = $request->warning_date;
            $warning->description  = $request->description;
            $warning->created_by   = Auth::user()->creatorId();
            $warning->save();

            //Send Email

            $setings = Utility::settings();
            if($setings['warning_sent'] == 1)
            {
                $employee       = User::find($warning->warning_to);
                $warningArr = [
                    'employee_warning_name'=>$employee->name,
                    'warning_subject' =>$warning->subject,
                    'warning_description'  =>$warning->description,
                ];

                $resp = Utility::sendEmailTemplate('warning_sent', [$employee->id => $employee->email], $warningArr);

                return redirect()->route('warning.index')->with('success', __('Warning  successfully created.'). ((!empty($resp) && $resp['is_success'] == false && !empty($resp['error'])) ? '<br> <span class="text-danger">' . $resp['error'] . '</span>' : ''));;

            }

            return redirect()->route('warning.index')->with('success', __('Warning  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Warning $warning)
    {
        return redirect()->route('warning.index');
    }

    public function edit(Warning $warning)
    {

        if(Auth::user()->can('edit warning'))
        {
            
            if(Auth::user()->hasRole('user'))
            {
                $user             = Auth::user();
                $current_employee = User::where('id', $user->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
                $employees = User::where('id','!=', $user->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
            }
            else
            {
                $user             = Auth::user();
                $current_employee = User::where('id', $user->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
                $employees = User::where('created_by', Auth::user()->creatorId())->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
            }
            if($warning->created_by == Auth::user()->creatorId())
            {
                return view('hrmsystem::warning.edit', compact('warning', 'employees', 'current_employee'));
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

    public function update(Request $request, Warning $warning)
    {
        if(Auth::user()->can('edit warning'))
        {
            if($warning->created_by == Auth::user()->creatorId())
            {
                if(!Auth::user()->hasRole('user'))
                {
                    $validator = Validator::make(
                        $request->all(), [
                                           'warning_by' => 'required',
                                       ]
                    );
                }

                $validator = Validator::make(
                    $request->all(), [
                                       'warning_to' => 'required',
                                       'subject' => 'required',
                                       'warning_date' => 'required',
                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                if(Auth::user()->hasRole('user'))
                {
                    $emp                 = User::where('id', '=', Auth::user()->id)->first();
                    $warning->warning_by = $emp->id;
                }
                else
                {
                    $warning->warning_by = $request->warning_by;
                }

                $warning->warning_to   = $request->warning_to;
                $warning->subject      = $request->subject;
                $warning->warning_date = $request->warning_date;
                $warning->description  = $request->description;
                $warning->save();

                return redirect()->route('warning.index')->with('success', __('Warning successfully updated.'));
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

    public function destroy(Warning $warning)
    {
        if(Auth::user()->can('delete warning'))
        {
            if($warning->created_by == Auth::user()->creatorId())
            {
                $warning->delete();

                return redirect()->route('warning.index')->with('success', __('Warning successfully deleted.'));
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
