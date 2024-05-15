<?php

namespace App\Http\Controllers;

use App\Mail\Remainder;
use App\Models\Documents;
use App\Models\Reminder;

use App\Models\Reminderuser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginaudit()
    {
        return view('dms.loginaudit');
    }
    public function dashboard()
    {
        // return view('dms.dashboard');
        $result = \DB::select(\DB::raw('SELECT COUNT(name) AS num, name FROM documents_categories GROUP BY name'));
        $data = "";
        foreach ($result as $values) {
            $data .= "['" . $values->name . "',  " . $values->num . "],";
            # code...
        }
        $alldata = $data;
        // dd($data);
        return view('dms.dashboard2', compact('alldata'));
    }
    public function index(Request $request)
    {
        if (Auth()->user()->hasRole('super-admin')) {
        $data = Reminder::orderBy('id','desc')->get();
        } else{
        $data = Reminder::orderBy('id','desc')->where('user_id', Auth()->user()->id)->get();
        }

        return view('dms.reminder', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::get()->pluck('first_name', 'id');

        $users= User::selectRaw('id,CONCAT(first_name," ",last_name) AS name')->get()->pluck('name','');
        $user= \Auth::user()->id;
        // dd($users);
        $freq = [
            '' => '--None--',
            'Daily' => 'Daily',
            'Weekly' => 'Weekly',
            'Monthly' => 'Monthly',
            'Quartely' => 'Quartely',
            'Half Yearly' => 'Half Yearly',
            'Yearly' => ' Yearly',

        ];
        $doc=Documents::where('created_by',$user)->get();

        return view('dms.createreminder', compact('freq', 'users','doc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $data = new Reminder;

        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->reminderstart_date = $request->reminderstart_date;
        $data->user_id = Auth()->user()->id;

        if ($request->documents_manager_id !== null) {

            $data->documents_manager_id = $request->documents_manager_id;
        }
        if ($request->reminderend_date !== null) {

            $data->reminderend_date = $request->reminderend_date;
        }
        if ($request->frequency !== null) {

            $data->frequency = $request->frequency;
        }

        $data->save();

        $users = $request->user_id;
        if ($users !== null) {

            foreach ($users as $key => $value) {
                # code...
                Reminderuser::create(
                    [

                        'reminder_id' => $data->id,
                        'user_id' => $value,
                    ]

                );
            }
        }
        if ($request->sendemailbtn) {
            $users = User::whereIn('id', $request->user_id)->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new Remainder($data));
            }
        }


        return redirect()->route('reminder.index')->with('success', 'Reminder Set Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Reminder::findOrFail($id);

        $users = User::get()->pluck('first_name', 'id');

        $user= \Auth::user()->id;
        // dd($users);
        $freq = [
            '' => '--None--',
            'Daily' => 'Daily',
            'Weekly' => 'Weekly',
            'Monthly' => 'Monthly',
            'Quartely' => 'Quartely',
            'Half Yearly' => 'Half Yearly',
            'Yearly' => ' Yearly',

        ];
        $doc=Documents::where('created_by',$user)->get();

        return view('dms.editreminder',compact('data','users','user','freq','doc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Reminder::findOrFail($id)->update($request->all());
        return redirect()->route('reminder.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //   $data= Reminder::findOrFail($id);

    //    $data->delete();

       return redirect()->route('reminder.index');
    }
}
