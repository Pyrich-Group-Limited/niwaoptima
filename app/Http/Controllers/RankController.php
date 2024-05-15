<?php

namespace App\Http\Controllers;


use view;

use Response;
use App\Models\Rank;
use App\Mail\EBSMail;
use App\Models\Signature;
use Laracasts\Flash\Flash;
use App\Mail\BulkStaffEmail;
use Illuminate\Http\Request;
use App\Notifications\UserCreated;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\StaffRepository;
use Modules\Shared\Models\Department;
use Modules\UnitManager\Models\Region;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Support\Facades\Validator;
use Modules\HRMSystem\Models\Designation;
use Modules\HumanResource\Models\Ranking;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Notification;
use Modules\EmployerManager\Models\Employer;
use Modules\Shared\Repositories\BranchRepository;
use Modules\Shared\Repositories\DepartmentRepository;
use App\Imports\RanksImport; // Create this import class
use Modules\HumanResource\Repositories\RankingRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;



class RankController extends AppBaseController
{
    

    public function __construct()
    {
        
    }


    /**
     * Mass upload of ranks.
     *
     * 
     */
    
     public function rankUpload()
    {

        return view('ranks.upload');
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'excel' => 'required|file|mimes:csv|max:10240',
        ]);


        if ($validator->fails()) {
            return redirect()->route('rankUpload')->withErrors($validator)
                ->withInput()
                //->with('error', 'File upload error')//$validator->errors()[0])
            ;
        }

        Excel::import(new RanksImport, request()->file('excel'));

        return redirect()->route('rankUpload')->with('success', 'Bulk Ranks uploaded successfully!');

    }

    public function getRanks(Request $request)
    {
        $departmentId = $request->get('department_id');

        // Fetch ranks based on the department ID
        $ranks = Rank::where('department_id', $departmentId)->get();

        return response()->json(['data' => ['ranks' => $ranks]]);
    }
}
