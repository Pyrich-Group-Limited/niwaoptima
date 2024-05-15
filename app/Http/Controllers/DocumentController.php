<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DocumentController extends Controller
{

    public function ldmsCreate()
    {
        $user = auth()->user();

        $role = $user->roles->first();

        // if ($role->name == 'super-admin') {
        $ldms_documents_all = Document::all();
        $todayDate = now()->toDateString();
        $ldms_expired_documents_all = Document::where('expired_date', '<', $todayDate)->get();
        $interval = now()->addDays(30)->toDateString();
        $ldms_close_expired_documents_all = Document::whereBetween('expired_date', [$todayDate, $interval])->get();

        // } else {
        //     $ldms_documents_all = $user->documents;
        //     $todayDate = now()->toDateString();
        //     $ldms_expired_documents_all = $user->documents()->where('expired_date', '<', $todayDate)->get();

        //     $interval = now()->addDays(30)->toDateString();
        //     $ldms_close_expired_documents_all = $user->documents()->whereBetween('expired_date', [$todayDate, $interval])->get();
        // }

        $ldms_total_documents_number = $ldms_documents_all->count();
        $document_list = $ldms_documents_all;

        return view('document.newcreate', compact('ldms_documents_all', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'ldms_total_documents_number', 'document_list'));
    }

    public function ldmsExpiredDocuments()
    {
        $user = auth()->user();

        if ($user) {
            $role = $user->roles->first();

            if ($role && $role->name == 'super-admin') {
                $ldms_documents_all = Document::all();
            } else {
                $ldms_documents_all = Document::where('role_id', $user->role_id)->get();
            }

            $todayDate = now()->toDateString();
            $interval = now()->addDays(30)->toDateString();

            $ldms_expired_documents_all = Document::where('expired_date', '<', $todayDate)->get();
            $ldms_close_expired_documents_all = Document::whereBetween('expired_date', [$todayDate, $interval])->get();

            $ldms_total_documents_number = $ldms_expired_documents_all->count();
            $document_list = $ldms_documents_all->where('expired_date', '<', $todayDate);

            return view('document.expired_documents', compact('ldms_documents_all', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'ldms_total_documents_number', 'document_list'));
        }

        // Handle case where user is not authenticated
        return redirect()->route('login');
    }

    public function ldmsCloseToBeExpiredDocuments()
    {
        $userData = DB::table('users')->where('id', Auth::id())->first();
        $ldms_documents_all = DB::table('documents')->where('role_id', $userData->role_id)->get();
        $todayDate = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('+30 days'));
        $roleData = DB::table('roles')->where('id', $userData->role_id)->first();

        if ($roleData->title == 'admin') {
            $ldms_expired_documents_all =  DB::table('documents')
                ->where('expired_date', '<', $todayDate)
                ->get();
            $ldms_close_expired_documents_all = DB::table('documents')
                ->where(
                    [
                        ['expired_date', '>=', $todayDate],
                        ['expired_date', '<', $interval]
                    ]
                )->get();
            $ldms_total_documents_number = count($ldms_close_expired_documents_all);
            $document_list = DB::table('documents')
                ->where(
                    [
                        ['expired_date', '>=', $todayDate],
                        ['expired_date', '<', $interval]
                    ]
                )->get();

            return view('document.close_to_be_expired_documents', compact('ldms_documents_all', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'ldms_total_documents_number', 'document_list'));
        } else {
            $ldms_expired_documents_all =  DB::table('documents')
                ->where(
                    [
                        ['role_id', $userData->role_id],
                        ['expired_date', '<', $todayDate]
                    ]
                )
                ->get();
            $ldms_close_expired_documents_all = DB::table('documents')
                ->where(
                    [
                        ['role_id', $userData->role_id],
                        ['expired_date', '>=', $todayDate],
                        ['expired_date', '<', $interval]
                    ]
                )->get();
            $ldms_total_documents_number = count($ldms_close_expired_documents_all);
            $document_list = DB::table('documents')
                ->where(
                    [
                        ['role_id', $userData->role_id],
                        ['expired_date', '>=', $todayDate],
                        ['expired_date', '<', $interval]
                    ]
                )->get();

            return view('document.close_to_be_expired_documents', compact('ldms_documents_all', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'ldms_total_documents_number', 'document_list'));
        }
    }

    public function ldmsSearch()
    {
        $userData = DB::table('users')->where('id', Auth::id())->first();
        $roleData = DB::table('roles')->where('id', $userData->role_id)->first();
        $todayDate = date('Y-m-d');
        $interval = date('Y-m-d', strtotime('+30 days'));
        if ($roleData->title == 'admin') {
            $ldms_documents_all = DB::table('documents')->get();

            $ldms_expired_documents_all = DB::table('documents')
                ->where('expired_date', '<', $todayDate)->get();
            $ldms_close_expired_documents_all = DB::table('documents')
                ->where(
                    [
                        ['expired_date', '>=', $todayDate],
                        ['expired_date', '<', $interval]
                    ]
                )->get();

            $ldms_total_documents_number = 1;
            $ldms_searched_title = $_GET['ldms_documentTitleSearch'];
            $document_list = DB::table('documents')
                ->where('title', $ldms_searched_title)->get();

            if (count($document_list) == 0) {
                return redirect()->back()->with('message1', 'Searched item not exists.');
            }

            return view('document.search', compact('ldms_documents_all', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'ldms_total_documents_number', 'document_list'));
        } else {
            $ldms_documents_all = DB::table('documents')->where('role_id', $userData->role_id)->get();

            $ldms_expired_documents_all = DB::table('documents')
                ->where(
                    [
                        ['role_id', $userData->role_id],
                        ['expired_date', '<', $todayDate]
                    ]
                )->get();
            $ldms_close_expired_documents_all = DB::table('documents')
                ->where(
                    [
                        ['role_id', $userData->role_id],
                        ['expired_date', '>=', $todayDate],
                        ['expired_date', '<', $interval]
                    ]
                )->get();

            $ldms_total_documents_number = 1;
            $ldms_searched_title = $_GET['ldms_documentTitleSearch'];
            $document_list = DB::table('documents')
                ->where(
                    [
                        ['role_id', $userData->role_id],
                        ['title', $ldms_searched_title]
                    ]
                )->get();

            if (count($document_list) == 0) {
                return redirect()->back()->with('message1', 'Searched item not exists.');
            }

            return view('document.search', compact('ldms_documents_all', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'ldms_total_documents_number', 'document_list'));
        }
    }

    public function ldmsStore(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'ldms_documentFile' => 'required|file|max:10000|mimes:jpg,jpeg,png,pdf,doc,docx',
            'ldms_experiedDate' => 'required|date|after:2 days',
            'ldms_email' => 'required|email',
            'mobile' => 'required',
            'vendor' => 'required',
            'description' => 'required',

        ]);


        $user = Auth::user();
        $role = $user->getRoleNames()->first();
// dd($role);
        // Create document
        $document = new Document();
        $document->role_id = Role::where('name', $role)->first()->id;
        $document->title = $request->title;

        $document->file_name = strtotime(now()) . $request->file('ldms_documentFile')->getClientOriginalName();

        // $document->expired_date = $request->ldms_experiedDate;
        $document->expired_date = date('Y-m-d', strtotime($_POST["ldms_experiedDate"]));

        $document->email = $request->ldms_email;
        $document->mobile = $request->mobile;
        $document->vendor = $request->vendor;
        $document->description = $request->description;

        // Move uploaded file to storage
        $request->file('ldms_documentFile')->storeAs('public/document', $document->file_name);

        // Calculate alarm dates
        $totalRemainingDays = now()->diffInDays($request->ldms_experiedDate);
        $alarmDate = [];


        if ($totalRemainingDays > 30) {
            // Populate alarm dates accordingly
        } elseif ($totalRemainingDays > 15) {
            // Populate alarm dates accordingly
        } elseif ($totalRemainingDays > 7) {
            // Populate alarm dates accordingly
        } elseif ($totalRemainingDays > 1) {
            // Populate alarm dates accordingly
        }

        $document->alarm = implode(",", $alarmDate);

        $document->save();
        if ($document->save()) {
            return redirect("document/ldms_create")->with('message', 'Document Inserted Successfully');
        } else {
            return redirect("document/ldms_create")->with('message1', 'Failed to save,try again.');
        }
    }

    public function import(Request $request)
    {
        //get file
        $upload = $request->file('file');
        $ext = pathinfo($upload->getClientOriginalName(), PATHINFO_EXTENSION);
        if ($ext != 'csv')
            return redirect()->back()->with('message1', 'Please upload a CSV file');

        $filePath = $upload->getRealPath();
        //open and read
        $file = fopen($filePath, 'r');
        $header = fgetcsv($file);
        $escapedHeader = [];
        //validate
        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapedItem = preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        //looping through other columns
        while ($columns = fgetcsv($file)) {
            foreach ($columns as $key => $value) {
                if ($value == '' && $key != 3)
                    return redirect()->back()->with('message1', 'Column cant be empty!');
                if ($key == 1) {
                    $todayDate = strtotime(date('d-m-Y'));
                    $expiredDate = strtotime(date('d-m-Y', strtotime($value)));
                    $dateDifference = ($expiredDate - $todayDate);
                    $totalRemainingDays = floor($dateDifference / (60 * 60 * 24));
                    if ($totalRemainingDays < 2)
                        return redirect()->back()->with('message1', 'Expired date must be 2 days from now');
                }
            }
            $data = array_combine($escapedHeader, $columns);
            $old_name = "./public/document/" . $data['filename'];
            $new_name = "./public/document/" . strtotime(date('Y-m-d H:i:s')) . $data['filename'];
            $file_name = strtotime(date('Y-m-d H:i:s')) . $data['filename'];
            rename($old_name, $new_name);
            if ($totalRemainingDays > 30) {
                $alarmDate = array(
                    date('Y-m-d', strtotime('-30 day', strtotime($data['expireddate']))),
                    date('Y-m-d', strtotime('-15 day', strtotime($data['expireddate']))),
                    date('Y-m-d', strtotime('-7 day', strtotime($data['expireddate']))),
                    date('Y-m-d', strtotime('-1 day', strtotime($data['expireddate'])))
                );
            } elseif ($totalRemainingDays > 15) {
                $alarmDate = array(
                    date('Y-m-d', strtotime('-15 day', strtotime($data['expireddate']))),
                    date('Y-m-d', strtotime('-7 day', strtotime($data['expireddate']))),
                    date('Y-m-d', strtotime('-1 day', strtotime($data['expireddate'])))
                );
            } elseif ($totalRemainingDays > 7) {
                $alarmDate = array(
                    date('Y-m-d', strtotime('-7 day', strtotime($data['expireddate']))),
                    date('Y-m-d', strtotime('-1 day', strtotime($data['expireddate'])))
                );
            } elseif ($totalRemainingDays > 1) {
                $alarmDate = array(date('Y-m-d', strtotime('-1 day', strtotime($data['expireddate']))));
            }

            $alarmDateList = implode(",", $alarmDate);
            $document = new Document();
            $document->role_id = Auth::user()->role_id;
            $document->title = $data['title'];
            $document->file_name = $file_name;
            $document->expired_date = date('Y-m-d', strtotime($data['expireddate']));
            $document->email = $data['email'];
            $document->mobile = $data['mobile'];
            $document->alarm = $alarmDateList;
            $document->save();
        }
        return redirect()->back()->with('message', 'Documents imported successfully');
    }

    public function ldmsEdit($id)
    {
        $user = Auth::user();
        $role = $user->roles()->first();

        $ldms_objDocumentModel = new Document();
        $document = $ldms_objDocumentModel->find($id);

        $file_path = public_path('document/' . $document->file_name);
        $file_exist = file_exists($file_path) ? 1 : 0;

        $todayDate = now()->toDateString();
        $interval = now()->addDays(30)->toDateString();

        if ($role->name == 'admin') {
            $ldms_expired_documents_all = Document::where('expired_date', '<', $todayDate)->get('*');
            $ldms_close_expired_documents_all = Document::where('expired_date', '>=', $todayDate)
                ->where('expired_date', '<', $interval)
                ->get('*');
        } else {
            $ldms_expired_documents_all = $user->documents()->where('expired_date', '<', $todayDate)->get('*');
            $ldms_close_expired_documents_all = $user->documents()
                ->where('expired_date', '>=', $todayDate)
                ->where('expired_date', '<', $interval)
                ->get('*');
        }

        return view('document.edit', compact('document', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all', 'file_exist'));
    }


    public function ldmsUpdate(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $role_id = $document->role_id;

        if (!empty($request->file('ldms_documentFile'))) {
            $request->validate([
                'ldms_documentFile' => 'mimes:jpg,jpeg,png,pdf,doc,docx|max:10000',
            ]);

            $target_dir = "public/document/";
            $uploadedFile = $request->file('ldms_documentFile');
            $fileName = strtotime(now()) . $uploadedFile->getClientOriginalName();
            $uploadedFile->move($target_dir, $fileName);

            // Delete previous file
            unlink(public_path() . '/document/' . $document->file_name);

            $document->file_name = $fileName;
        }

        $document->title = $request->input('ldms_documentTitle');
        $document->expired_date = date('Y-m-d', strtotime($request->input('ldms_experiedDate')));
        $document->email = $request->input('ldms_email');
        $document->mobile = $request->input('mobile');

        $status = $document->save();

        if ($status) {
            return redirect("document/ldms_create")->with('message', 'Document Updated Successfully');
        } else {
            return redirect("document/ldms_create")->with('message1', 'Failed to update, try again.');
        }
    }



    public function ldmsDelete($id, $fileName)
    {
        $ldms_objDocumentModel = new Document();
        $status = $ldms_objDocumentModel->find($id)->delete();
        unlink(public_path() . '/document/' . $fileName);

        if ($status) {
            return redirect()->back()->with('message', 'Document Deleted Successfully');
        } else {
            return redirect()->back()->with('message1', 'Failed to delete,try again.');
        }
    }

    public function ldmsAlarmDate($id)
    {
        $ldms_objDocumentModel = new Document();
        $alarmDateList = $ldms_objDocumentModel->find($id);

        $todayDate = strtotime(date('Y-m-d'));
        $expiredDate = strtotime($alarmDateList['expired_date']);

        if ($expiredDate < $todayDate) {
            $document = $ldms_objDocumentModel->find($id);
            $document->alarm = "";
            $document->save();
            $alarmDateList = $ldms_objDocumentModel->find($id);
        }

        $todayDate = date('Y-m-d');

        $ldms_expired_documents_all = DB::table('documents')
            ->where('expired_date', '<', $todayDate)
            ->get();

        $ldms_close_expired_documents_all = DB::table('documents')
            ->whereRaw('expired_date > now() and expired_date < now() + INTERVAL 30 DAY')
            ->get();

        return view('document.alarm_date', compact('alarmDateList', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all'));
    }


    public function ldmsAlarmAdd()
    {
        $ldms_objDocumentModel = new Document();
        $id = $_POST["id"];
        $document = $ldms_objDocumentModel->find($id);
        $inputAlarm = strtotime($_POST["ldms_new_alarm"]);
        $newAlarm = date('Y-m-d', $inputAlarm);

        $previousAlarmDateList = $_POST["previousAlarmDateString"];
        if (strpos($previousAlarmDateList, $newAlarm) === false) {
            if (!empty($previousAlarmDateList)) {
                $alarmDateList = $previousAlarmDateList . "," . $newAlarm;
            } else {
                $alarmDateList = $newAlarm;
            }
            $document->alarm = $alarmDateList;

            $status = $document->update();
            if ($status) {
                return redirect("document/ldms_alarm_date/$id")->with('message', 'Alarm Added Successfully');
            } else {
                return redirect("document/ldms_alarm_date/$id")->with('message1', 'Failed to add,try again.');
            }
        } else {
            return redirect("document/ldms_alarm_date/$id")->with('message1', 'Warning! duplicate alarm cannot be set.');
        }
    }

    public function ldmsAlarmDelete($alarmDate, $id, $alarmDateList)
    {
        $ldms_objDocumentModel = new Document();
        $alarmDateList = explode(",", $alarmDateList);
        $alarmDateList = (array_diff($alarmDateList, array($alarmDate)));
        $alarmDateList = implode(",", $alarmDateList);
        $document = $ldms_objDocumentModel->find($id);
        $document->alarm = $alarmDateList;
        $status = $document->update();
        if ($status) {
            return redirect("document/ldms_alarm_date/$id")->with('message', 'Alarm Deleted Successfully');
        } else {
            return redirect("document/ldms_alarm_date/$id")->with('message1', 'Failed to delete,try again.');
        }
    }

    public function ldmsUpdateProfile()
    {
        $userID =  Auth::user()->id;
        $userInformation = DB::table('users')->where('id', '=', $userID)->get();
        $todayDate = date('Y-m-d');
        $ldms_expired_documents_all = DB::table('documents')
            ->where('expired_date', '<', $todayDate)
            ->get();
        $ldms_close_expired_documents_all = DB::table('documents')
            ->whereRaw('expired_date > now() and expired_date < now()+INTERVAL 30 DAY')
            ->get();
        return view('document.updateProfile', compact('userInformation', 'ldms_expired_documents_all', 'ldms_close_expired_documents_all'));
    }

    public function ldmsManageProfileUpdate()
    {
        // if (!env('USER_VERIFIED'))
        //     return redirect()->back()->with('not_permitted', 'This feature is disable for demo!');

        $userID = $_POST["id"];
        $status = DB::table('users')
            ->where('id', $userID)
            ->update(
                [
                    'name' => $_POST["ldms_name"],
                    'email' => $_POST["ldms_email"]
                ]
            );
        if (isset($status)) {
            return redirect("document/ldms_updateProfile")->with('message', 'Profile Updated Successfully');
        } else {
            redirect("document/ldms_updateProfile")->with('message1', 'Failed to Profile Update,try again.');
        }
    }

    public function ldmsChangePassword()
    {
        if (!env('USER_VERIFIED'))
            return redirect()->back()->with('not_permitted', 'This feature is disable for demo!');

        $userID = $_POST["id"];
        $oldPassword = $_POST['ldms_old_password'];
        $allData = DB::table('users')->where('id', $userID)->get();
        if (Hash::check($oldPassword, $allData[0]->password)) {
            if ($_POST['ldms_new_password'] == $_POST['ldms_confirm_password']) {
                $status = DB::table('users')
                    ->where('id', $userID)
                    ->update(['password' => bcrypt($_POST["ldms_new_password"])]);
                if (isset($status)) {
                    return redirect("document/ldms_updateProfile")->with('message', 'Password Changed Successfully');
                }
            } else {
                return redirect("document/ldms_updateProfile")->with('message1', "New Password amd Confirm Password don't match");
            }
        } else {
            return redirect("document/ldms_updateProfile")->with('message1', "Current Password don't match");
        }
    }


    public function ldmsEmailSend()
    {
        $todayDate = date('Y-m-d');
        $ldms_alarm_sending_info = DB::table('documents')
            ->select('title', 'expired_date', 'email', 'mobile')
            ->where('alarm', 'like', '%' . $todayDate . '%')
            ->get();
        $ldms_general_setting_data = GeneralSettings::latest()->first();

        foreach ($ldms_alarm_sending_info as $ldms_alarm_sending_info_single) {
            if ($ldms_general_setting_data->notify_by == 'email') {
                $data['email'] = $ldms_alarm_sending_info_single->email;
                $data['document_name'] = $ldms_alarm_sending_info_single->title;
                $data['document_exp'] = $ldms_alarm_sending_info_single->expired_date;

                Mail::send('mail.expiration', $data, function ($message) use ($data) {
                    $message->to($data['email'])->subject('Your ' . $data['document_name'] . ' expired date ' . $data['document_exp']);
                });
            } elseif ($ldms_alarm_sending_info_single->mobile) {
                if (env('SMS_GATEWAY') == 'twilio') {
                    $account_sid = env('ACCOUNT_SID');
                    $auth_token = env('AUTH_TOKEN');
                    $twilio_phone_number = env('Twilio_Number');
                    try {
                        $client = new Client($account_sid, $auth_token);
                        $client->messages->create(
                            $ldms_alarm_sending_info_single->mobile,
                            array(
                                "from" => $twilio_phone_number,
                                "body" => 'Document Title : ' . $ldms_alarm_sending_info_single->title . '. Expired Date : ' . $ldms_alarm_sending_info_single->expired_date
                            )
                        );
                    } catch (\Exception $e) {
                        $message = 'User created successfully. Please setup your SMS Setting to send SMS';
                    }
                } elseif (env('SMS_GATEWAY') == 'clickatell') {
                    try {
                        $clickatell = new \Clickatell\Rest(env('CLICKATELL_API_KEY'));
                        $result = $clickatell->sendMessage(['to' => [$ldms_alarm_sending_info_single->mobile], 'content' => 'Document Title : ' . $ldms_alarm_sending_info_single->title . '. Expired Date : ' . $ldms_alarm_sending_info_single->expired_date]);
                    } catch (ClickatellException $e) {
                        $message = 'User created successfully. Please setup your SMS Setting to send SMS';
                    }
                }
            }
        }
    }
}
