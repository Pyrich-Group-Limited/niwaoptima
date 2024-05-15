<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\Announcement;
use Modules\HRMSystem\Models\AnnouncementEmployee;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use App\Models\User;
use Modules\Accounting\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage announcement'))
        {

            if(Auth::user()->hasRole('super-admin')){

                $current_employee = User::where('id', '=', Auth::user()->id)->first();
                $announcements    = Announcement::get();

            }else if(Auth::user()->hasRole('user'))
            {
                $current_employee = User::where('id', '=', Auth::user()->id)->first();
                $announcements    = Announcement::orderBy('announcements.id', 'desc')->leftjoin('announcement_employees', 'announcements.id', '=', 'announcement_employees.announcement_id')->where('announcement_employees.employee_id', '=', $current_employee->id)->orWhere(
                    function ($q){
                        $q->where('announcements.department_id', '["0"]')->where('announcements.employee_id', '["0"]');
                    }
                )->get();
            }
            else
            {
                $current_employee = User::where('id', '=', Auth::user()->id)->first();
                $announcements    = Announcement::where('created_by', '=', Auth::user()->creatorId())->get();
            }

            return view('hrmsystem::announcement.index', compact('announcements', 'current_employee'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create announcement'))
        {
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');
            $branch      = Branch::get();
            $departments = Department::get();

            return view('hrmsystem::announcement.create', compact('employees', 'branch', 'departments'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create announcement'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'title' => 'required',
                                   'start_date' => 'required',
                                   'end_date' => 'required',
                                   'branch_id' => 'required',
                                   'department_id' => 'required',
                                   'employee_id' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $announcement                = new Announcement();
            $announcement->title         = $request->title;
            $announcement->start_date    = $request->start_date;
            $announcement->end_date      = $request->end_date;
            $announcement->branch_id     = $request->branch_id;
            $announcement->department_id = json_encode($request->department_id);
            $announcement->employee_id   = json_encode($request->employee_id);
            $announcement->description   = $request->description;
            $announcement->created_by    = Auth::user()->creatorId();
            $announcement->save();

            if($request->employee_id)
            {
                $departmentEmployee = User::whereHas('staff', function ($query) use ($request) {
    $query->where('department_id', $request->department_id);
})->get()->pluck('id');
                $departmentEmployee = $departmentEmployee;

            }
            else
            {
                $departmentEmployee = $request->employee_id;
            }
            foreach($departmentEmployee as $employee)
            {
                $announcementEmployee                  = new AnnouncementEmployee();
                $announcementEmployee->announcement_id = $announcement->id;
                $announcementEmployee->employee_id     = $employee;
                $announcementEmployee->created_by      = Auth::user()->creatorId();
                $announcementEmployee->save();
            }



            //For Notification
            $setting  = Utility::settings(Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            $announceNotificationArr = [
                'announcement_title' =>  $request->title,
                'branch_name' =>  $branch->branch_name,
                'start_date' =>  $request->start_date,
                'end_date' =>  $request->end_date,
            ];
            //Slack Notification
            /* if(isset($setting['announcement_notification']) && $setting['announcement_notification'] ==1)
            {
                Utility::send_slack_msg('new_announcement', $announceNotificationArr);
            }
            //Telegram Notification
            if(isset($setting['telegram_announcement_notification']) && $setting['telegram_announcement_notification'] ==1)
            {
                Utility::send_telegram_msg('new_announcement', $announceNotificationArr);
            } */

            //webhook
            $module ='New Announcement';
            $webhook=  Utility::webhookSetting($module);
            if($webhook)
            {
                $parameter = json_encode($announcement);
                $status = Utility::WebhookCall($webhook['url'],$parameter,$webhook['method']);
                if($status == true)
                {
                    return redirect()->back()->with('success', __('Announcement successfully created.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Webhook call failed.'));
                }
            }


            return redirect()->route('announcement.index')->with('success', __('Announcement  successfully created.'));
        }

        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Announcement $announcement)
    {
        return redirect()->route('announcement.index');
    }

    public function edit($announcement)
    {
        if(Auth::user()->can('edit announcement'))
        {
            $announcement = Announcement::find($announcement);
            if($announcement->created_by == Auth::user()->creatorId())
            {
                $branch      = Branch::get()->pluck('branch_name', 'id');
                $departments = Department::get()->pluck('name', 'id');

                return view('hrmsystem::announcement.edit', compact('announcement', 'branch', 'departments'));
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

    public function update(Request $request, Announcement $announcement)
    {
        if(Auth::user()->can('edit announcement'))
        {
            if($announcement->created_by == Auth::user()->creatorId())
            {

                $validator = Validator::make(
                    $request->all(), [
                                       'title' => 'required',
                                       'start_date' => 'required',
                                       'end_date' => 'required',
                                       'branch_id' => 'required',
                                       'department_id' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $announcement->title         = $request->title;
                $announcement->start_date    = $request->start_date;
                $announcement->end_date      = $request->end_date;
                $announcement->branch_id     = $request->branch_id;
                $announcement->department_id = $request->department_id;
                $announcement->description   = $request->description;
                $announcement->save();

                return redirect()->route('announcement.index')->with('success', __('Announcement successfully updated.'));
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

    public function destroy(Announcement $announcement)
    {
        if(Auth::user()->can('delete announcement'))
        {
            if($announcement->created_by == Auth::user()->creatorId())
            {
                $announcement->delete();

                return redirect()->route('announcement.index')->with('success', __('Announcement successfully deleted.'));
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

    public function getdepartment(Request $request)
    {

        /* if($request->branch_id == 0)
        {
            $departments = Department::get()->pluck('name', 'id')->toArray();
        }
        else
        {
            $departments = Department::where('branch_id', $request->branch_id)->get()->pluck('name', 'id')->toArray();
        } */
        $departments = Department::get()->pluck('name', 'id')->toArray();

        return response()->json($departments);
    }

    public function getemployee(Request $request)
    {
        // dd(department_id);
        if(!$request->department_id )
        {
            $employees = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id')->toArray();
           
        }
        else
        {
            
            $employees = User::whereHas('staff', function ($query) use ($request) {
                $query->where('department_id', $request->department_id);
            })
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })
            ->pluck('full_name', 'id')
            ->toArray();
            
        }

        return response()->json($employees);
    }
}
