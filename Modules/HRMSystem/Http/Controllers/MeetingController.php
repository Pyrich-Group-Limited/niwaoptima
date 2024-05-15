<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;

use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use App\Models\User;
use Modules\HRMSystem\Models\Meeting;
use Modules\HRMSystem\Models\MeetingEmployee;
use Modules\Accounting\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MeetingController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage meeting'))
        {
            $employees = User::get();
            if(Auth::user()->hasRole('super-admin')){
                $meetings = Meeting::get();
            }else if(Auth::user()->hasRole('user')){
                $current_employee = User::where('id', '=', Auth::user()->id)->first();
                $meetings         = Meeting::orderBy('meetings.id', 'desc')
                                           ->leftjoin('meeting_employees', 'meetings.id', '=', 'meeting_employees.meeting_id')
                                           ->where('meeting_employees.employee_id', '=', $current_employee->id)
                                            ->orWhere(function($q) {
                                                $q->where('meetings.department_id', '["0"]')
                                                  ->where('meetings.employee_id', '["0"]');
                                            })
                                           ->get();
            }
            else
            {
                $meetings = Meeting::where('branch_id', '=', Auth()->user()->staff->branch_id)->get();
            }

            return view('hrmsystem::meeting.index', compact('meetings', 'employees'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create meeting'))
        {
            if(Auth::user()->hasRole('user'))
            {
                $employees = User::where('id', '!=', Auth::user()->id)->get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
                $settings = Utility::settings();
            }
            else
            {
                $branch      = Branch::get();
                $departments = Department::get();
                $employees = User::get()->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'full_name' => $user->first_name . ' ' . $user->last_name,
                    ];
                })->pluck('full_name', 'id');
                $settings = Utility::settings();
            }

            return view('hrmsystem::meeting.create', compact('employees', 'departments', 'branch','settings'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(), [
                               'branch_id' => 'required',
                               'department_id' => 'required',
                               'employee_id' => 'required',
                               'department_id' => 'required',
                               'title' => 'required',
                               'date' => 'required',
                               'time' => 'required',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        if(Auth::user()->can('create meeting'))
        {
            $meeting                = new Meeting();
            $meeting->branch_id     = $request->branch_id;
            $meeting->department_id = json_encode($request->department_id);
            $meeting->employee_id   = json_encode($request->employee_id);
            $meeting->title         = $request->title;
            $meeting->date          = $request->date;
            $meeting->time          = $request->time;
            $meeting->note          = $request->note;
            $meeting->created_by    = Auth::user()->creatorId();
           // $meeting->branch_id    = Auth::user()->staff->branch_id;

            $meeting->save();

            if(in_array('0', $request->employee_id))
            {
                //$departmentEmployee = User::whereIn('department_id', $request->department_id)->get()->pluck('id');
                $departmentEmployee = User::whereHas('staff', function ($query) use ($request) {
                    $query->whereIn('department_id', $request->department_id);
                })->get()->pluck('id');
                $departmentEmployee = $departmentEmployee;
            }
            else
            {

                $departmentEmployee = $request->employee_id;
            }
            foreach($departmentEmployee as $employee)
            {
                $meetingEmployee              = new MeetingEmployee();
                $meetingEmployee->meeting_id  = $meeting->id;
                $meetingEmployee->employee_id = $employee;
                $meetingEmployee->created_by  = Auth::user()->creatorId();
                $meetingEmployee->save();
            }


            //For Notification
            $setting  = Utility::settings(Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            $meetingNotificationArr = [
                'meeting_title' =>  $request->title,
                'branch_name' =>  $branch->name,
                'meeting_date' =>  $request->date,
                'meeting_time' =>  $request->time,
            ];
            //Slack Notification
            /* if(isset($setting['support_notification']) && $setting['support_notification'] ==1)
            {
                Utility::send_slack_msg('new_meeting', $meetingNotificationArr);
            }
            //Telegram Notification
            if(isset($setting['telegram_meeting_notification']) && $setting['telegram_meeting_notification'] ==1)
            {
                Utility::send_telegram_msg('new_meeting', $meetingNotificationArr);
            }

            //For Google Calendar
            if($request->get('synchronize_type')  == 'google_calender')
            {
                $type ='meeting';
                $request1=new Meeting();
                $request1->title=$request->title;
                $request1->start_date=$request->date;
                $request1->end_date=$request->date;
                Utility::addCalendarData($request1 , $type);
            } */

            //webhook
            $module ='New Meeting';
            $webhook =  Utility::webhookSetting($module);
            if($webhook)
            {
                $parameter = json_encode($meetingEmployee);
                $status = Utility::WebhookCall($webhook['url'],$parameter,$webhook['method']);
                if($status == true)
                {
                    return redirect()->route('meeting.index')->with('success', __('Meeting  successfully created.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Webhook call failed.'));
                }
            }

            return redirect()->route('meeting.index')->with('success', __('Meeting  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Meeting $meeting)
    {
        return redirect()->route('meeting.index');
    }

    public function edit($meeting)
    {
        if(Auth::user()->can('edit meeting'))
        {
            $meeting = Meeting::find($meeting);
            if($meeting->created_by == Auth::user()->creatorId())
            {
                if(Auth::user()->hasRole('user'))
                {
                    $employees = User::where('id', '!=', Auth::user()->id)->get()->map(function ($user) {
                        return [
                            'id' => $user->id,
                            'full_name' => $user->first_name . ' ' . $user->last_name,
                        ];
                    })->pluck('full_name', 'id');
                }
                else
                {
                    $employees = User::get()->map(function ($user) {
                        return [
                            'id' => $user->id,
                            'full_name' => $user->first_name . ' ' . $user->last_name,
                        ];
                    })->pluck('full_name', 'id');
                }

                return view('hrmsystem::meeting.edit', compact('meeting', 'employees'));
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

    public function update(Request $request, Meeting $meeting)
    {
        if(Auth::user()->can('edit meeting'))
        {
            $validator = Validator::make(
                $request->all(), [

                                   'title' => 'required',
                                   'date' => 'required',
                                   'time' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if($meeting->created_by == Auth::user()->creatorId())
            {
                $meeting->title = $request->title;
                $meeting->date  = $request->date;
                $meeting->time  = $request->time;
                $meeting->note  = $request->note;
                $meeting->save();

                return redirect()->route('meeting.index')->with('success', __('Meeting successfully updated.'));
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

    public function destroy(Meeting $meeting)
    {
        if(Auth::user()->can('delete meeting'))
        {
            if($meeting->created_by == Auth::user()->creatorId())
            {
                $meeting->delete();

                return redirect()->route('meeting.index')->with('success', __('Meeting successfully deleted.'));
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
        }
 */
$departments = Department::get()->pluck('name', 'id')->toArray();
        return response()->json($departments);
    }

    public function getemployee(Request $request)
    {
        if(!$request->department_id)
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

    public function calender(Request $request)
    {

        if(Auth::user()->can('manage meeting'))
        {
            $transdate = date('Y-m-d', time());

            $meetings = Meeting::where('created_by', '=', Auth::user()->creatorId());


            if(!empty($request->start_date))
            {
                $meetings->where('date', '>=', $request->start_date);
            }
            if(!empty($request->end_date))
            {
                $meetings->where('date', '<=', $request->end_date);
            }

            $meetings = $meetings->get();

            $arrMeetings = [];

            foreach($meetings as $meeting)
            {
                $arr['id']        = $meeting['id'];
                $arr['title']     = $meeting['title'];
                $arr['start']     = $meeting['date'];
                $arr['time']     = $meeting['time'];
                $arr['className'] = 'event-primary';
                $arr['url']       = route('meeting.edit', $meeting['id']);
                $arrMeetings[]    = $arr;
            }
            $arrMeetings = str_replace('"[', '[', str_replace(']"', ']', json_encode($arrMeetings)));

            return view('hrmsystem::meeting.calender', compact('arrMeetings','transdate','meetings'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }


    }

    //for Google Calendar
    public function get_meeting_data(Request $request)
    {

        if($request->get('calender_type') == 'goggle_calender')
        {
            $type ='meeting';
            $arrayJson =  Utility::getCalendarData($type);
        }
        else
        {
            $data =Meeting::where('created_by', '=', Auth::user()->creatorId())->get();
            $arrayJson = [];
            foreach($data as $val)
            {
                $arrayJson[] = [
                    "id"=> $val->id,
                    "title" => $val->title,
                    "start" => $val->date.' '.$val->time,
                    "className" =>'event-primary',
                    "textColor" => '#51459d',
                    'url'      => route('meeting.edit', $val->id),
                    "allDay" => false,
                ];
            }
        }

        return $arrayJson;
    }
}
