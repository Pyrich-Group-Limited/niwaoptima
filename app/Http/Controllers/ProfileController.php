<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Shared\Models\Department;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        //echo "I am on the profile page";
        return view('users/profile', compact('user'));
    }

    public function showProfile()
    {

       $id= auth()->id();
       $data= DB::table('users')
       ->join('staff','users.id','=','staff.user_id')
       ->join('model_has_roles','users.id','=','model_has_roles.model_id')
       ->join('roles','model_has_roles.role_id','=','roles.id')
       ->join('departments', 'staff.department_id', '=', 'departments.id')
       ->join('branches', 'staff.branch_id', '=', 'branches.id')
       ->where('users.id','=',$id)
       ->get();

       //
    //   $thedepartmentid= auth()->user()->staff->department_id;
    //   dd($thedepartmentid);

//   $depa= Department::where('id',$thedepartmentid)->get();
// //   dd($depa);
//  $aa= \DB::table('departments')
//   ->select('name');
//   dd($aa);






        $role=Auth::user()->roles->pluck('name');

        return view('users.show_profile',compact('role','data'));
    }

    // public function update(Request $request, $id)
    // {

    //     $request->validate([
    //         'password' => 'nullable|string|min:6|same:password_confirmation'
    //     ]);

    //     if($request->filled('password')){
    //         $request->request->add([
    //             'password' => Hash::make($request->password),
    //         ]);
    //     }else {
    //         $request->request->remove('password');
    //     }
    //     if ($request->hasFile('profile_picture')) {
    //         $file = $request->file('profile_picture');
    //         if ($file->isValid()) {
    //             $fileName = $file->hashName();
    //             $path = $file->store('public');
    //             $input['profile_picture'] = $fileName;
    //         } else {
    //             Flash::success(' Image Rejected, Please Recheck it and Reupload.');
    //             return redirect()->route('home');
    //         }
    //     }

    //     $input = $request->all();
    //     $item = User::findorFail($id);
    //     $item->staff->update(['profile_picture' => $input['profile_picture']]);
    //     $item->update($input);
    //     Flash::success(' saved successfully.');
    //     return redirect()->route('home');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|string|min:6|same:password_confirmation',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation rules
        ]);

        $input = $request->all();
        $item = User::findOrFail($id);

        $item->is_two_factor_enabled = $request->is_two_factor_enabled;

        if ($request->filled('password')) {
            $item->password = Hash::make($request->password);
        } else {
            unset($input['password']);
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            if ($file->isValid()) {
                $fileName = $file->hashName();
                $path = $file->store('public');
                $item->staff->profile_picture = $fileName;
                $item->staff->save(); // Update the staff record
            } else {
                // Handle file validation errors
                return redirect()->route('home')->withErrors(['profile_picture' => 'Image Rejected, please check and reupload.']);
            }
        }

        $item->save(); // Update the user record
        Flash::success('Saved successfully.');

        return redirect()->route('profile');
    }


}


