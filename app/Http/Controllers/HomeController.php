<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Shared\Models\Department;

use Modules\UnitManager\Models\Region;
use Modules\WorkflowEngine\Models\Staff;
use Modules\EmployerManager\Models\Payment;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Models\Certificate;
use Modules\ClaimsCompensation\Models\ClaimsCompensation;
use App\Models\AttendanceEmployee;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use App\Models\Service;
//use App\Models\Level;
use App\Models\ServiceApplication;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /** @var $roleRepository RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->middleware('auth');
        $this->middleware('twofactor');
        $this->roleRepository = $roleRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        if (Auth::check() && Auth::user()->hasRole('super-admin')) {

            return redirect()->route('superadmin'); // go to super admin dashboard

        } else if (Auth::user()->level && Auth::user()->level->id == 20) {

            return redirect()->route('md_user'); // go to md dashboard

        }else if (Auth::user()->level && Auth::user()->level->id == 19) {

            return redirect()->route('ta_dashboard'); // go to ta dashboard

        } else if (Auth::user()->level && Auth::user()->level->id == 18){

            return redirect()->route('s_dashboard'); 

        } else if (Auth::user()->level && Auth::user()->level->id == 17){

            return redirect()->route('gm_dashboard');

        } else if (Auth::user()->level && 
        Auth::user()->level->id >= 14 && 
        Auth::user()->level->id <= 16){

            return redirect()->route('range_dashboard');

        } else if (Auth::user()->level && Auth::user()->level->id == 3){

            return redirect()->route('areamanager');
            
        } else {


            
            $branch = Branch::all();
            $services = Service::where('branch_id', Auth()->user()->staff->branch_id)->get();
            
            $services = $services->pluck('name', 'id'); // Pluck the values and assign it back to $services variable
           // $services->prepend('Select Service', 0); // Add an empty option with label 'Select Service'
           $documents12 = \App\Models\IncomingDocuments::query()
                    ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                    ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                    ->select(
                        'incoming_documents_categories.id as category_id',
                        'incoming_documents_categories.name as category_name',
                        'incoming_documents_manager.created_at as document_created_at',
                        'incoming_documents_manager.id as d_id',
                        'incoming_documents_manager.title',
                        'incoming_documents_manager.full_name as sender_full_name',
                        'incoming_documents_manager.email as sender_email',
                        'incoming_documents_manager.phone as sender_phone',
                        'incoming_documents_manager.document_url',
                        'incoming_documents_categories.description as doc_description',
                        'incoming_documents_manager.status',
                        'incoming_documents_categories.name as cat_name',
                        'departments.name as dep_name',
                        //'incoming_documents_has_users.user_id',
                        //'incoming_documents_has_users.assigned_by',
                        //DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name')
                        )
                    ->where('incoming_documents_manager.status','!=', '0')
                    ->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
                    ->where('incoming_documents_manager.department_id', Auth()->user()->staff->department_id)
                    ->latest('incoming_documents_manager.created_at')
                    ->groupBy('departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name','incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                    ->limit(10)
                    ->get();
                    $documents1 = DB::table('incoming_documents_has_users')
                    ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
                    ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                    ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
                    ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                    ->select(
                        'incoming_documents_manager.category_id',
                        'incoming_documents_categories.id',
                        'incoming_documents_manager.title',
                        'incoming_documents_manager.full_name as sender_full_name',
                        'incoming_documents_manager.email as sender_email',
                        'incoming_documents_manager.phone as sender_phone',
                        'incoming_documents_has_users.created_at as createdAt',
                        'incoming_documents_categories.name as category_name',
                        'incoming_documents_has_users.start_date',
                        'incoming_documents_has_users.end_date',
                        'incoming_documents_has_users.allow_share',
                        'incoming_documents_has_users.is_download',
                        'incoming_documents_has_users.user_id',
                        'incoming_documents_has_users.assigned_by',
                        'incoming_documents_manager.document_url as document_url',
                        'incoming_documents_manager.id as d_m_id',
                        'incoming_documents_categories.id as d_m_c_id',
                        'incoming_documents_categories.name as cat_name',
                        'departments.name as dep_name',
                
                        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
                        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
                        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
                    )
                    ->latest('incoming_documents_has_users.created_at')
                    ->groupBy(
                        'incoming_documents_categories.id',
                        'incoming_documents_has_users.start_date',
                        'incoming_documents_has_users.end_date',
                        'incoming_documents_manager.id',
                        'incoming_documents_manager.title',
                        'incoming_documents_manager.document_url',
                        'incoming_documents_has_users.id',
                        'incoming_documents_has_users.created_at',
                        'incoming_documents_categories.name',
                        'incoming_documents_has_users.allow_share',
                        'incoming_documents_has_users.is_download',
                        'incoming_documents_has_users.user_id',
                        'incoming_documents_has_users.assigned_by',
                        'incoming_documents_manager.created_by',
                        'incoming_documents_manager.category_id',
                        'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
                    )
                    ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
                    //->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
                    ->get();
    
                    $dept = Department::get();
         $deptData = $dept->map(function ($dept1) {
                return [
                    'id' => $dept1->id,
                    'name' => $dept1->name,
                ];
            });
    
            $departments_data = $deptData->pluck('name', 'id');
            $departments_data->prepend('Select Department', '');
    
            $departments_data1 = $deptData->pluck('name', 'id');
            //$departments_data1->prepend('Select Department', '');
    
            if(auth()->user()->staff && auth()->user()->staff->branch_id == 23){
                $users1 = DB::select('
                SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
                FROM users
                JOIN staff ON users.id = staff.user_id
                WHERE users.level_id = 17
            ');
            
            $users2 = DB::select('
            SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
            FROM users
            JOIN staff ON users.id = staff.user_id
            WHERE staff.department_id = ?
        ', [auth()->user()->staff->department_id]);
                } else{
                    $users1 = DB::select('
                    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
                    FROM users
                    JOIN staff ON users.id = staff.user_id
                    WHERE users.level_id = 3
                ');
                
                $users2 = DB::select('
                SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
                FROM users
                JOIN staff ON users.id = staff.user_id
                WHERE staff.branch_id = ?
            ', [auth()->user()->staff->branch_id]);
                }
            
    // Combine the results of all queries into one collection
    $userData = collect($users1)
        ->merge($users2)
        ->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });
    
            
            $users123 = $userData->pluck('name', 'id');
            if (Auth()->user()->hasRole('super-admin')) {
            $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->get();
            } else{
            $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->where('branch_id', '=', Auth::user()->staff->branch_id)->get();
            }
    
            return view('home', compact('branch', 'services', 'documents1', 'departments_data1', 'departments_data', 'users123', 'service_applications'));
        
        }
    }

    public function engineering()
    {
        $branch = Branch::all();
        return view('engineering', compact('branch'));
    }

    public function marineadmin()
    {
        $branch = Branch::all();
        $diseaseclaims = ClaimsCompensation::where('claimstype_id', 2)->count();
        $deathclaims = ClaimsCompensation::where('claimstype_id', 3)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $pendingclaims = ClaimsCompensation::where('regional_manager_status', 0)->count();
        $approvedclaims = ClaimsCompensation::where('regional_manager_status', 1)->count();

        return view('marineadmin', compact(
            'branch',
            'diseaseclaims',
            'deathclaims',
            'registered_employees',
            'pending_employees',
            'pending_employers',
            'pendingclaims',
            'approvedclaims'
        ));
    }


    public function getbranch(Request $request)
    {


        $branch_id = $request->thevalue;

        if ($branch_id == null) {

            $data = DB::table('users')
                ->join('staff', 'staff.user_id', 'users.id')
                // ->join('leave_request',' leave_request.user_id','users.id')
                ->join('departments', 'staff.department_id', 'departments.id')

                ->select(['users.id', 'first_name', 'last_name', 'name'])
                ->get();
                return response()->json($data);
        } else {

            $data = DB::table('users')
                ->join('staff', 'staff.user_id', 'users.id')
                ->where('staff.branch_id', $branch_id)
                // ->join('leave_request',' leave_request.user_id','users.id')
                ->join('departments', 'staff.department_id', 'departments.id')
                ->select(['users.id', 'first_name', 'last_name', 'name'])
                ->get();

                return response()->json($data);

        }
    }


    public function totalrevenue(Request $request){

        $from = $request->from;
        $to=$request->to;

        if($to == null){

            $data= DB::table('payments')
            ->where('invoice_duration','>=',$from)
            // ->where('invoice_duration','<=',$to)

            ->sum('amount');
            return response()->json($data);

        } else if($from == null){
            $data= DB::table('payments')
            // ->where('invoice_duration','>=',$from)
            ->where('invoice_duration','<=',$to)

            ->sum('amount');
            return response()->json($data);
        }

        $data= DB::table('payments')
        ->where('invoice_duration','>=',$from)
        ->where('invoice_duration','<=',$to)

        ->sum('amount');
        return response()->json($data);

    }
    public function aoc()
    {



        $claims_table = 'death_claims';
        $claims_death_count = DB::table($claims_table)->count();

        $staffs = 'staff';
        $staff_count = DB::table($staffs)->count();
        $ictstaff = Staff::where('department_id', 3)->count();

        $totalemployers = Employer::count();
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        $diseaseclaims = ClaimsCompensation::where('claimstype_id', 2)->count();
        $deathclaims = ClaimsCompensation::where('claimstype_id', 3)->count();
        // $diseaseclaims=ClaimsCompensation::where('id',1)->count();
        $approvedclaims = ClaimsCompensation::where('regional_manager_status', 1)->count();
        $pendingclaims = ClaimsCompensation::where('regional_manager_status', 0)->count();


        //my own side that i want to do;

        $thestaffbranch_id = Auth::user()->staff->branch_id;


        $theareas = \DB::table('users')
            ->join('staff', 'users.id', '=', 'staff.user_id')
            ->where('staff.branch_id', '=', $thestaffbranch_id)
            ->join('departments', 'staff.department_id', '=', 'departments.id')
            // ->join('leave_request as lr','staff.id','=','lr.staff_id')
            ->get();



        $active_project = DB::table('projects')->where('status', 'in_progress')
            ->count();
        $completed_project = DB::table('projects')->where('status', 'complete')
            ->count();

        // dd(auth()->user()->staff->department->name);


        $total_department = DB::table('departments')->count();
        //i will add all the information here

        $staff = DB::table('staff')->count();
        $total_clients = DB::table('employers')->count();
        $documents = \DB::table('documents_categories')
            ->selectRaw('COUNT(name) AS num, name')
            ->groupBy('name')
            ->get(['name', 'num']);

        $project_chart = DB::table('projects')
            ->selectRaw('COUNT("status") as number,status')
            ->groupBy('status')
            ->get();


        $totalfolders = DB::table('documents_categories')->count();

        $thebranch = Branch::all()->pluck('branch_name', 'id')->prepend('ALL RECORD', '');

        $staffonleave = DB::table('leave_request')->count();


        $totalrevenue= DB::table('payments')
        ->where('payment_status',1)
        ->select('amount')
        ->sum('amount');



        $paymentbybranch = DB::table('payments')
        ->join('branches', 'payments.branch_id', 'branches.id')
        ->where('payment_status',1)
        ->selectRaw('branches.branch_name, SUM(payments.amount) as sum')
        ->groupBy('branches.branch_name')
        ->get();


        // dd(DB::table('services')->get());
        // dd(DB::table('payments')->get());
        // dd($totalrevenue);

        // dd($totalrevenue);

        // $revenuesources= DB::table('payments')
        // ->get('')





        return view('aocadmin', compact(

            'active_project',
            'completed_project',
            'staff',
            'total_department',
            'total_clients',
            'documents',
            'project_chart',
            'totalfolders',
            'staffonleave',
            'thebranch',
            'totalrevenue',
            'paymentbybranch',




            'theareas',
            'registered_employers',
            'pending_employers',
            'registered_employees',
            'pending_employees',
            'claims_death_count',
            'deathclaims',
            'staff_count',
            'diseaseclaims',
            'data',
            'ictstaff',
            'totalemployers',
            'pendingclaims',
            'approvedclaims'
        ));
    }

    public function superdash()
    {

        $claims_table = 'death_claims';
        $claims_death_count = DB::table($claims_table)->count();

        $staffs = 'staff';
        $staff_count = DB::table($staffs)->count();
        $ictstaff = Staff::where('department_id', 3)->count();

        $totalemployers = Employer::count();
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        $diseaseclaims = ClaimsCompensation::where('claimstype_id', 2)->count();
        $deathclaims = ClaimsCompensation::where('claimstype_id', 3)->count();
        // $diseaseclaims=ClaimsCompensation::where('id',1)->count();
        $approvedclaims = ClaimsCompensation::where('regional_manager_status', 1)->count();
        $pendingclaims = ClaimsCompensation::where('regional_manager_status', 0)->count();

        $branch = Branch::all();

        //i will add all the information here

        $staff = DB::table('staff')->count();

        return view('superadmin', compact(
            'branch',
            'registered_employers',
            'pending_employers',
            'registered_employees',
            'pending_employees',
            'claims_death_count',
            'deathclaims',
            'staff',
            'staff_count',
            'diseaseclaims',
            'data',
            'ictstaff',
            'totalemployers',
            'pendingclaims',
            'approvedclaims'
        ));
    }



    public function regional()
    {

        $totalbranches = Branch::count();
        $totalregional = Region::count();
        $totaldepartment = Department::count();
        // dd(auth()->user()->staff->branch);
        $userbranch = auth()->user()->staff->branch_id;
        $region = Region::all();

        $myregionid = auth()->user()->staff->branch->region_id;

        $totalbranchinregion = DB::table('branches')
            ->where('region_id', $myregionid)->count();




        $totaldepartmentinregion = DB::table('departments')
            ->join('branches', 'departments.branch_id', '=', 'branches.id')
            ->join('regions', 'branches.region_id', '=', 'regions.id')
            ->count();


        $totalstaffinregion = DB::table('staff')
            ->join('branches', 'staff.branch_id', '=', 'branches.id')
            ->join('regions', 'branches.region_id', '=', 'regions.id')
            ->count();

        $totalunitinregion = DB::table('units')
            ->join('departments as d', 'units.department_id', '=', 'd.id')
            ->join('branches as b', 'd.branch_id', '=', 'b.id')
            ->join('regions as r', 'b.region_id', '=', 'r.id')
            ->count();



        $totalemployersinbranch = DB::table('employers as e')
            ->join('branches as b', 'e.branch_id', '=', 'b.id')
            ->join('regions as r', 'b.region_id', '=', 'r.id')
            ->count();
        // dd( $totalemployersinbranch );

        $totalcerticateinbranches = DB::table('certificates as c')
            ->where('payment_status', '=', 1)
            ->join('branches as b', 'c.branch_id', '=', 'b.id')
            ->join('regions as r', 'b.region_id', '=', 'r.id')
            ->count();



        return view('regionaladmin', compact(
            'totalbranches',
            'totalregional',
            'totaldepartment',
            'region',
            'totalbranchinregion',
            'totaldepartmentinregion',
            'totalstaffinregion',
            'totalunitinregion',
            'totalemployersinbranch',
            'totalcerticateinbranches',

        ));

        // return view('regionaladmin',compact('allstaff','totalregion','totaldept',
        // 'totalemployer','managementstaff'));

    }
    public function branch(Request $request)
    {
        // dd(DB::table('staff')->count());
        $userdepartment = auth()->user()->staff->department_id;
        $userbranch = auth()->user()->staff->branch_id;

        $totaldept = Department::count();
        $totalbranches = Branch::count();
        $allstaff = DB::table('staff as s')
            ->join('branches as b', 's.branch_id', '=', 'b.id')
            ->count();
        // $allstaff=Staff::where('branch_id',$userbranch)->count() ;

        $totalregion = Region::count();
        // $totaldept= Department::count();
        $totaldept = DB::table('departments')
            // ->join('staff','staff.department_id','=','departments.id')
            // ->join('branches','staff.branch_id','=','branches.id')
            ->count();
        // dd($totaldept);



        // dd(auth()->user()->employer);
        $totalemployer = Employer::count();

        $managementstaff = Staff::where('ranking_id', '!==', 1)->count();

        return view('areaadmin', compact(
            'allstaff',
            'totaldept',
            'totalbranches',
            'totalregion',
            'totaldept',
            'totalemployer',
            'managementstaff'
        ));
    }

    public function areamanager()
    {
        $branch = Branch::all();
        $services = Service::where('branch_id', Auth()->user()->staff->branch_id)->get();
        
        $services = $services->pluck('name', 'id'); // Pluck the values and assign it back to $services variable
       // $services->prepend('Select Service', 0); // Add an empty option with label 'Select Service'
       $documents1vv = \App\Models\IncomingDocuments::query()
                ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'incoming_documents_categories.id as category_id',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_manager.created_at as document_created_at',
                    'incoming_documents_manager.id as d_id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.full_name as sender_full_name',
                    'incoming_documents_manager.email as sender_email',
                    'incoming_documents_manager.phone as sender_phone',
                    'incoming_documents_manager.document_url',
                    'incoming_documents_categories.description as doc_description',
                    'incoming_documents_manager.status',
                    'incoming_documents_categories.name as cat_name',
                    'departments.name as dep_name',
                    //'incoming_documents_has_users.user_id',
                    //'incoming_documents_has_users.assigned_by',
                    //DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name')
                    )
                ->where('incoming_documents_manager.status','!=', '0')
                ->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
                ->latest('incoming_documents_manager.created_at')
                ->groupBy('departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name','incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                ->limit(10)
                ->get();
                $documents1 = DB::table('incoming_documents_has_users')
                ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
                ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'incoming_documents_manager.category_id',
                    'incoming_documents_categories.id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.full_name as sender_full_name',
                    'incoming_documents_manager.email as sender_email',
                    'incoming_documents_manager.phone as sender_phone',
                    'incoming_documents_has_users.created_at as createdAt',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_has_users.start_date',
                    'incoming_documents_has_users.end_date',
                    'incoming_documents_has_users.allow_share',
                    'incoming_documents_has_users.is_download',
                    'incoming_documents_has_users.user_id',
                    'incoming_documents_has_users.assigned_by',
                    'incoming_documents_manager.document_url as document_url',
                    'incoming_documents_manager.id as d_id',
                    'incoming_documents_categories.id as d_m_c_id',
                    'incoming_documents_categories.name as cat_name',
                    'departments.name as dep_name',
            
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
                )
                ->latest('incoming_documents_has_users.created_at')
                ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
                ->groupBy(
                    'incoming_documents_manager.category_id',
                    'incoming_documents_categories.id',
                    'incoming_documents_has_users.start_date',
                    'incoming_documents_has_users.end_date',
                    'incoming_documents_manager.id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.document_url',
                    'incoming_documents_has_users.id',
                    'incoming_documents_has_users.created_at',
                    'incoming_documents_categories.name',
                    'incoming_documents_has_users.allow_share',
                    'incoming_documents_has_users.is_download',
                    'incoming_documents_has_users.user_id',
                    'incoming_documents_has_users.assigned_by',
                    'incoming_documents_manager.created_by',
                    'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
                )
                ->get();

                $dept = Department::get();
     $deptData = $dept->map(function ($dept1) {
            return [
                'id' => $dept1->id,
                'name' => $dept1->name,
            ];
        });

        $departments_data = $deptData->pluck('name', 'id');
        $departments_data->prepend('Select Department', '');

        $departments_data1 = $deptData->pluck('name', 'id');
        //$departments_data1->prepend('Select Department', '');

        $users1 = DB::select('
        SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
        FROM users
        JOIN staff ON users.id = staff.user_id
        WHERE users.level_id = 20
    ');

    $users2 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE staff.branch_id = ?
', [auth()->user()->staff->branch_id]);
   
    
    
    // Combine the results of all queries into one collection
    $userData = collect($users1)
        ->merge($users2)
        ->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });
        



        
        $users123 = $userData->pluck('name', 'id');
        if (Auth()->user()->hasRole('super-admin')) {
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->get();
        } else{
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->where('branch_id', '=', Auth::user()->staff->branch_id)->get();
        }

        return view('am', compact('branch', 'services', 'documents1', 'departments_data1', 'departments_data', 'users123', 'service_applications'));
    }

    //secretary dashboard
    public function sDashboard()
    {
        $branch = Branch::all();
        $services = Service::where('branch_id', Auth()->user()->staff->branch_id)->get();
        
        $services = $services->pluck('name', 'id'); // Pluck the values and assign it back to $services variable
       // $services->prepend('Select Service', 0); // Add an empty option with label 'Select Service'
       $documents12 = \App\Models\IncomingDocuments::query()
                ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'incoming_documents_categories.id as category_id',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_manager.created_at as document_created_at',
                    'incoming_documents_manager.id as d_id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.full_name as sender_full_name',
                    'incoming_documents_manager.email as sender_email',
                    'incoming_documents_manager.phone as sender_phone',
                    'incoming_documents_manager.document_url',
                    'incoming_documents_categories.description as doc_description',
                    'incoming_documents_manager.status',
                    'incoming_documents_categories.name as cat_name',
                    'departments.name as dep_name',
                    //'incoming_documents_has_users.user_id',
                    //'incoming_documents_has_users.assigned_by',
                    //DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name')
                    )
                ->where('incoming_documents_manager.status','=', '0')
                ->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
                ->latest('incoming_documents_manager.created_at')
                ->groupBy('departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name','incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                ->limit(10)
                ->get();
                $documents1 = DB::table('incoming_documents_has_users')
    ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
    ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
    ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
    ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
    ->select(
        'incoming_documents_manager.category_id',
        'incoming_documents_categories.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.full_name as sender_full_name',
        'incoming_documents_manager.email as sender_email',
        'incoming_documents_manager.phone as sender_phone',
        'incoming_documents_has_users.created_at as createdAt',
        'incoming_documents_categories.name as category_name',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_has_users.allow_share',
        'incoming_documents_has_users.is_download',
        'incoming_documents_has_users.user_id',
        'incoming_documents_has_users.assigned_by',
        'incoming_documents_manager.document_url as document_url',
        'incoming_documents_categories.description as doc_description',
        'incoming_documents_manager.id as d_id',
        'incoming_documents_categories.id as d_m_c_id',
        'incoming_documents_categories.name as cat_name',
        'departments.name as dep_name',

        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
    )
    ->latest('incoming_documents_has_users.created_at')
    ->groupBy(
        'incoming_documents_categories.id',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_manager.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.document_url',
        'incoming_documents_has_users.id',
        'incoming_documents_has_users.created_at',
        'incoming_documents_categories.name',
        'incoming_documents_has_users.allow_share',
        'incoming_documents_has_users.is_download',
        'incoming_documents_has_users.user_id',
        'incoming_documents_has_users.assigned_by',
        'incoming_documents_manager.created_by',
        'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
    )
    ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
    //->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->get();

                $dept = Department::get();
     $deptData = $dept->map(function ($dept1) {
            return [
                'id' => $dept1->id,
                'name' => $dept1->name,
            ];
        });

        $departments_data = $deptData->pluck('name', 'id');
        $departments_data->prepend('Select Department', '');

        $departments_data1 = $deptData->pluck('name', 'id');
        //$departments_data1->prepend('Select Department', '');

        $users1 = DB::select('
        SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
        FROM users
        JOIN staff ON users.id = staff.user_id
        WHERE users.level_id = 20
    ');
    
    // Combine the results of all queries into one collection
    $userData = collect($users1)
        ->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });
        


        
        $users123 = $userData->pluck('name', 'id');
        if (Auth()->user()->hasRole('super-admin')) {
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->get();
        } else{
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->where('branch_id', '=', Auth::user()->staff->branch_id)->get();
        }

        return view('s_dashboard', compact('branch', 'services', 'documents1', 'departments_data1', 'departments_data', 'users123', 'service_applications'));
    }

    //General Managers dashboard
    public function gmDashboard()
    {
        $branch = Branch::all();
        $services = Service::where('branch_id', Auth()->user()->staff->branch_id)->get();
        
        $services = $services->pluck('name', 'id'); // Pluck the values and assign it back to $services variable
       
                $documents1 = DB::table('incoming_documents_has_users')
    ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
    ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
    ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
    ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
    ->select(
        'incoming_documents_manager.category_id',
        'incoming_documents_categories.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.full_name as sender_full_name',
        'incoming_documents_manager.email as sender_email',
        'incoming_documents_manager.phone as sender_phone',
        'incoming_documents_has_users.created_at as createdAt',
        'incoming_documents_categories.name as category_name',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_has_users.allow_share',
        'incoming_documents_has_users.is_download',
        'incoming_documents_has_users.user_id',
        'incoming_documents_has_users.assigned_by',
        'incoming_documents_manager.document_url as document_url',
        'incoming_documents_categories.description as doc_description',
        'incoming_documents_manager.id as d_m_id',
        'incoming_documents_categories.id as d_m_c_id',
        'incoming_documents_categories.name as cat_name',
        'departments.name as dep_name',

        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
    )
    ->latest('incoming_documents_has_users.created_at')
    ->groupBy(
        'incoming_documents_categories.id',
        'incoming_documents_has_users.start_date',
        'incoming_documents_has_users.end_date',
        'incoming_documents_manager.id',
        'incoming_documents_manager.title',
        'incoming_documents_manager.document_url',
        'incoming_documents_has_users.id',
        'incoming_documents_has_users.created_at',
        'incoming_documents_categories.name',
        'incoming_documents_has_users.allow_share',
        'incoming_documents_has_users.is_download',
        'incoming_documents_has_users.user_id',
        'incoming_documents_has_users.assigned_by',
        'incoming_documents_manager.created_by',
        'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
    )
    ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
    //->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->get();

                $dept = Department::get();
     $deptData = $dept->map(function ($dept1) {
            return [
                'id' => $dept1->id,
                'name' => $dept1->name,
            ];
        });

        $departments_data = $deptData->pluck('name', 'id');
        $departments_data->prepend('Select Department', '');

        $departments_data1 = $deptData->pluck('name', 'id');
        //$departments_data1->prepend('Select Department', '');

        
    $users1 = DB::select('
        SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
        FROM users
        JOIN staff ON users.id = staff.user_id
        WHERE users.level_id = 20
    ');
    
    $users2 = DB::select('
        SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
        FROM users
        JOIN staff ON users.id = staff.user_id
        WHERE users.level_id = 17
    ');

    $users3 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE staff.department_id = ?
', [auth()->user()->staff->department_id]);
   
    
    
    // Combine the results of all queries into one collection
    $userData = collect($users1)
        ->merge($users2)
        ->merge($users3)
        ->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });
        


        
        $users123 = $userData->pluck('name', 'id');
        if (Auth()->user()->hasRole('super-admin')) {
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->get();
        } else{
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->where('branch_id', '=', Auth::user()->staff->branch_id)->get();
        }

        return view('gm_dashboard', compact('branch', 'services', 'documents1', 'departments_data1', 'departments_data', 'users123', 'service_applications'));
    }

    //From level 6 to 14 dashboard
    public function rangeDashboard()
    {
        $branch = Branch::all();
        $services = Service::where('branch_id', Auth()->user()->staff->branch_id)->get();
        
        $services = $services->pluck('name', 'id'); // Pluck the values and assign it back to $services variable
       // $services->prepend('Select Service', 0); // Add an empty option with label 'Select Service'
       $documents1 = DB::table('incoming_documents_has_users')
       ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
       ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
       ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
       ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
       ->select(
           'incoming_documents_manager.category_id',
           'incoming_documents_categories.id',
           'incoming_documents_manager.title',
           'incoming_documents_manager.full_name as sender_full_name',
           'incoming_documents_manager.email as sender_email',
           'incoming_documents_manager.phone as sender_phone',
           'incoming_documents_has_users.created_at as createdAt',
           'incoming_documents_categories.name as category_name',
           'incoming_documents_has_users.start_date',
           'incoming_documents_has_users.end_date',
           'incoming_documents_has_users.allow_share',
           'incoming_documents_has_users.is_download',
           'incoming_documents_has_users.user_id',
           'incoming_documents_has_users.assigned_by',
           'incoming_documents_manager.document_url as document_url',
           'incoming_documents_categories.description as doc_description',
           'incoming_documents_manager.id as d_m_id',
           'incoming_documents_categories.id as d_m_c_id',
           'incoming_documents_categories.name as cat_name',
           'departments.name as dep_name',
   
           DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
           DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
           DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
       )
       ->latest('incoming_documents_has_users.created_at')
       ->groupBy(
           'incoming_documents_categories.id',
           'incoming_documents_has_users.start_date',
           'incoming_documents_has_users.end_date',
           'incoming_documents_manager.id',
           'incoming_documents_manager.title',
           'incoming_documents_manager.document_url',
           'incoming_documents_has_users.id',
           'incoming_documents_has_users.created_at',
           'incoming_documents_categories.name',
           'incoming_documents_has_users.allow_share',
           'incoming_documents_has_users.is_download',
           'incoming_documents_has_users.user_id',
           'incoming_documents_has_users.assigned_by',
           'incoming_documents_manager.created_by',
           'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
       )
       ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
       //->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
       ->get();

                $dept = Department::get();
     $deptData = $dept->map(function ($dept1) {
            return [
                'id' => $dept1->id,
                'name' => $dept1->name,
            ];
        });

        $departments_data = $deptData->pluck('name', 'id');
        $departments_data->prepend('Select Department', '');

        $departments_data1 = $deptData->pluck('name', 'id');
        //$departments_data1->prepend('Select Department', '');

        if(auth()->user()->staff && auth()->user()->staff->branch_id == 23){
        $users1 = DB::select('
        SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
        FROM users
        JOIN staff ON users.id = staff.user_id
        WHERE users.level_id = 17
    ');
    
    $users2 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE staff.department_id = ?
', [auth()->user()->staff->department_id]);
        } else{
            $users1 = DB::select('
            SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
            FROM users
            JOIN staff ON users.id = staff.user_id
            WHERE users.level_id = 3
        ');
        
        $users2 = DB::select('
        SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
        FROM users
        JOIN staff ON users.id = staff.user_id
        WHERE staff.branch_id = ?
    ', [auth()->user()->staff->branch_id]);
        }
   
    
    
    // Combine the results of all queries into one collection
    $userData = collect($users1)
        ->merge($users2)
        ->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        
        $users123 = $userData->pluck('name', 'id');
        if (Auth()->user()->hasRole('super-admin')) {
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->get();
        } else{
        $service_applications = ServiceApplication::orderBy('id', 'desc')->where('current_step', '=', '110')->where('branch_id', '=', Auth::user()->staff->branch_id)->get();
        }

        return view('range_dashboard', compact('branch', 'services', 'documents1', 'departments_data1', 'departments_data', 'users123', 'service_applications'));
    }

    public function getForAreaManager($id)
{
    $month = request()->input('month');
    $year = request()->input('year');
    
    $pending_application_forms = ServiceApplication::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('current_step', 4)
        ->where('branch_id', Auth()->user()->staff->branch->id)
        ->count();

    $pending_inspections = ServiceApplication::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('current_step', 8)
        ->where('branch_id', Auth()->user()->staff->branch->id)
        ->count();

    $total_amount = Payment::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('branch_id', Auth()->user()->staff->branch->id)
        ->sum('amount');

    $total_permit = ServiceApplication::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('current_step', 15)
        ->where('branch_id', Auth()->user()->staff->branch->id)
        ->count();
    
    // Return the data as JSON
    return response()->json([
        'pending_application_forms' => $pending_application_forms,
        'pending_inspections' => $pending_inspections,
        'total_amount' => '₦ '.number_format($total_amount, 2),
        'total_permit' => $total_permit,
    ]);
}

public function getForMD($id)
{
    $month = request()->input('month');
    $year = request()->input('year');
    $branch = request()->input('branch');
    
    $pending_application_forms = ServiceApplication::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('current_step', 4)
        ->where('branch_id', $branch)
        ->count();

    $pending_inspections = ServiceApplication::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('current_step', 8)
        ->where('branch_id', $branch)
        ->count();

    $total_amount = Payment::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('branch_id', $branch)
        ->sum('amount');

    $total_permit = ServiceApplication::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->where('service_id', $id)
        ->where('current_step', 15)
        ->where('branch_id', $branch)
        ->count();
    
    // Return the data as JSON
    return response()->json([
        'pending_application_forms' => $pending_application_forms,
        'pending_inspections' => $pending_inspections,
        'total_amount' => '₦ '.number_format($total_amount, 2),
        'total_permit' => $total_permit,
    ]);
}


    public function md()
    {



        $services = \DB::table('services')
            ->count();

        // $revenue = \DB::table('revenues')

        //     ->sum('amount');
        $revenue= DB::table('payments')
            ->where('payment_status',1)
            ->select('amount')
            ->sum('amount');

            // dd(DB::table('payments')->get());
        $ta = \DB::table('service_applications as sp')
            ->where('sp.application_form_payment_status', 1)
            ->join('staff as s', 'sp.user_id', 's.id')
            ->count();

        // dd($totalapplicationform);

        $branch = Branch::all()->pluck('branch_name', 'id');
        $branch->prepend('Select Location', '0');

        $departments = Department::all();

        $tc = \DB::table('employers')
            ->count();


$data = \DB::table('documents_categories')
            ->join('departments', 'departments.id', 'documents_categories.department_id')
            ->selectRaw('COUNT(documents_categories.name) AS num, CONCAT(departments.name, "/", documents_categories.name) AS name')
            ->groupBy('name')
            ->get();

            $data1 = \DB::table('documents_manager')
    ->selectRaw('COUNT(documents_manager.title) AS num, MONTH(documents_manager.created_at) AS month')
    ->whereYear('documents_manager.created_at', '=', now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();

$data2 = \DB::table('incoming_documents_manager')
    ->selectRaw('COUNT(incoming_documents_manager.title) AS num, MONTH(incoming_documents_manager.created_at) AS month')
    ->whereYear('incoming_documents_manager.created_at', '=', now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();
    $data3 = \DB::table('documents_manager')
    ->join('incoming_documents_manager', 'documents_manager.created_at', '=', 'incoming_documents_manager.created_at')
    ->selectRaw('(COUNT(documents_manager.title) + COUNT(incoming_documents_manager.title)) AS total_count, MONTH(documents_manager.created_at) AS month')
    ->whereYear('documents_manager.created_at', now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();


    $documents1vv = \App\Models\IncomingDocuments::query()
            ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select(
                'incoming_documents_categories.id as category_id',
                'incoming_documents_categories.name as category_name',
                'incoming_documents_manager.created_at as assigned_created_at',
                'incoming_documents_manager.id as d_m_id',
                'incoming_documents_manager.title',
                'incoming_documents_manager.full_name as sender_full_name',
                'incoming_documents_manager.email as sender_email',
                'incoming_documents_manager.phone as sender_phone',
                'incoming_documents_manager.document_url',
                'incoming_documents_categories.description as doc_description',
                'incoming_documents_manager.status',
                'incoming_documents_categories.name as cat_name',
                'departments.name as dep_name',
                    )
                ->where('incoming_documents_manager.status','!=', '0')
                ->latest('incoming_documents_manager.created_at')
                ->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
                ->groupBy('departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name','incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                //->where('incoming_documents_manager.department_id', '=', '15')
                ->limit(10)
                ->get();
                
                $documents1 = DB::table('incoming_documents_has_users')
                ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
                ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'incoming_documents_manager.category_id',
                    'incoming_documents_categories.id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.full_name as sender_full_name',
                    'incoming_documents_manager.email as sender_email',
                    'incoming_documents_manager.phone as sender_phone',
                    'incoming_documents_has_users.created_at as createdAt',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_has_users.start_date',
                    'incoming_documents_has_users.end_date',
                    'incoming_documents_has_users.allow_share',
                    'incoming_documents_has_users.is_download',
                    'incoming_documents_has_users.user_id',
                    'incoming_documents_has_users.assigned_by',
                    'incoming_documents_manager.document_url as document_url',
                    'incoming_documents_manager.id as d_m_id',
                    'incoming_documents_categories.id as d_m_c_id',
                    'incoming_documents_categories.name as cat_name',
                    'departments.name as dep_name',
            
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
                )
                ->latest('incoming_documents_has_users.created_at')
                ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
                ->groupBy(
                    'incoming_documents_manager.category_id',
                    'incoming_documents_categories.id',
                    'incoming_documents_has_users.start_date',
                    'incoming_documents_has_users.end_date',
                    'incoming_documents_manager.id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.document_url',
                    'incoming_documents_has_users.id',
                    'incoming_documents_has_users.created_at',
                    'incoming_documents_categories.name',
                    'incoming_documents_has_users.allow_share',
                    'incoming_documents_has_users.is_download',
                    'incoming_documents_has_users.user_id',
                    'incoming_documents_has_users.assigned_by',
                    'incoming_documents_manager.created_by',
                    'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
                )
                ->get();

    $documents2 = \App\Models\Documents::query()
    ->join('documents_has_users', 'documents_manager.id', '=', 'documents_has_users.document_id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->join('users', 'documents_has_users.user_id', '=', 'users.id')
    ->select(
        'documents_categories.id as category_id',
        'documents_categories.name as category_name',
        'documents_manager.created_at as assigned_created_at',
        'documents_manager.id as d_id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_categories.description as doc_description',
        'documents_has_users.is_download',
        'documents_has_users.allow_share',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        \DB::raw('CONCAT(users.first_name, " ", users.last_name) AS assigned_to_name')
    )
    ->latest('documents_manager.created_at')
    ->where('documents_has_users.assigned_by','!=', '0')
    ->groupBy('documents_has_users.assigned_by',
               'documents_has_users.user_id',
               'documents_has_users.is_download',
               'documents_has_users.allow_share',
               'documents_has_users.user_id',
               'documents_categories.description',
               'documents_manager.document_url',
               'documents_manager.title',
               'documents_categories.id',
               'documents_categories.name',
               'documents_manager.created_at',
               'documents_manager.id',
               'assigned_to_name') // Include the nonaggregated column in the GROUP BY clause
    ->with('createdBy')
    ->limit(5)
    ->get();

    $dept = Department::get();
     $deptData = $dept->map(function ($dept1) {
            return [
                'id' => $dept1->id,
                'name' => $dept1->name,
            ];
        });

        $departments_data = $deptData->pluck('name', 'id');
        $departments_data->prepend('Select Department', '');

        $documents123 = DB::table('documents_has_users')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users.document_id')
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('users', 'documents_has_users.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_manager.title',
        'documents_has_users.created_at as createdAt',
        'documents_categories.name as category_name',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'documents_manager.document_url as document_url',
        'documents_manager.id as d_m_id',
        'documents_categories.id as d_m_c_id',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_manager.created_by) AS created_by_name')
    )
    ->latest('documents_has_users.created_at')
    ->groupBy(
        'documents_manager.department_id',
        'documents_categories.id',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users.id',
        'documents_has_users.created_at',
        'documents_categories.name',
        'documents_manager.category_id',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
    ->where('documents_manager.department_id', '=', '1')
    ->get();

    $users1 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE users.level_id = 19
');
$users2 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE users.level_id = 18
');

$users3 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE users.level_id = 17
');
$users4 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE users.level_id = 3
');

$users5 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE staff.department_id = 19
');

// Combine the results of all queries into one collection
$userData = collect($users1)
    ->merge($users2)
    ->merge($users3)
    ->merge($users4)
    ->merge($users5)
    ->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
        ];
    });
   
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        
        $users123 = $userData->pluck('name', 'id');

    /* $reminder = \DB::table('reminders')
    ->join('documents_manager', 'documents_manager.id', 'reminders.documents_manager_id')
    ->selectRaw('reminders.subject, reminders.message, reminders.reminderstart_date, documents_manager.title, documents_manager.document_url')
    ->get(); */

        return view('md', compact(
            'branch',
            'tc',
            'data',
            'ta',
            'revenue',
            'services',
            'departments',
            'departments_data',
            'documents123',
            'data1',
            'data2',
            'data3',
            'documents1',
            'documents2',
            'users123',
            //'reminder',
        ));
    }

    public function taDashboard()
    {



        $services = \DB::table('services')
            ->count();

        // $revenue = \DB::table('revenues')

        //     ->sum('amount');
        $revenue= DB::table('payments')
            ->where('payment_status',1)
            ->select('amount')
            ->sum('amount');

            // dd(DB::table('payments')->get());
        $ta = \DB::table('service_applications as sp')
            ->where('sp.application_form_payment_status', 1)
            ->join('staff as s', 'sp.user_id', 's.id')
            ->count();

        // dd($totalapplicationform);

        $branch = Branch::all()->pluck('branch_name', 'id');
        $branch->prepend('Select Location', '0');

        $departments = Department::all();

        $tc = \DB::table('employers')
            ->count();


$data = \DB::table('documents_categories')
            ->join('departments', 'departments.id', 'documents_categories.department_id')
            ->selectRaw('COUNT(documents_categories.name) AS num, CONCAT(departments.name, "/", documents_categories.name) AS name')
            ->groupBy('name')
            ->get();

            $data1 = \DB::table('documents_manager')
    ->selectRaw('COUNT(documents_manager.title) AS num, MONTH(documents_manager.created_at) AS month')
    ->whereYear('documents_manager.created_at', '=', now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();

$data2 = \DB::table('incoming_documents_manager')
    ->selectRaw('COUNT(incoming_documents_manager.title) AS num, MONTH(incoming_documents_manager.created_at) AS month')
    ->whereYear('incoming_documents_manager.created_at', '=', now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();
    $data3 = \DB::table('documents_manager')
    ->join('incoming_documents_manager', 'documents_manager.created_at', '=', 'incoming_documents_manager.created_at')
    ->selectRaw('(COUNT(documents_manager.title) + COUNT(incoming_documents_manager.title)) AS total_count, MONTH(documents_manager.created_at) AS month')
    ->whereYear('documents_manager.created_at', now()->year)
    ->groupBy('month')
    ->orderBy('month')
    ->get();


    $documents1vv = \App\Models\IncomingDocuments::query()
            ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
            ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
            ->select(
                'incoming_documents_categories.id as category_id',
                'incoming_documents_categories.name as category_name',
                'incoming_documents_manager.created_at as assigned_created_at',
                'incoming_documents_manager.id as d_m_id',
                'incoming_documents_manager.title',
                'incoming_documents_manager.full_name as sender_full_name',
                'incoming_documents_manager.email as sender_email',
                'incoming_documents_manager.phone as sender_phone',
                'incoming_documents_manager.document_url',
                'incoming_documents_categories.description as doc_description',
                'incoming_documents_manager.status',
                'incoming_documents_categories.name as cat_name',
                'departments.name as dep_name',
                    )
                ->where('incoming_documents_manager.status','!=', '0')
                ->latest('incoming_documents_manager.created_at')
                ->where('incoming_documents_manager.branch_id', auth()->user()->staff->branch_id)
                ->groupBy('departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name','incoming_documents_categories.description','incoming_documents_manager.document_url','incoming_documents_manager.title','incoming_documents_categories.id', 'incoming_documents_categories.name', 'incoming_documents_manager.created_at', 'incoming_documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                //->where('incoming_documents_manager.department_id', '=', '15')
                ->limit(10)
                ->get();
                
                $documents1 = DB::table('incoming_documents_has_users')
                ->join('incoming_documents_manager', 'incoming_documents_manager.id', '=', 'incoming_documents_has_users.document_id')
                ->join('departments', 'departments.id', '=', 'incoming_documents_manager.department_id')
                ->join('users', 'incoming_documents_has_users.user_id', '=', 'users.id')
                ->join('incoming_documents_categories', 'incoming_documents_manager.category_id', '=', 'incoming_documents_categories.id')
                ->select(
                    'incoming_documents_manager.category_id',
                    'incoming_documents_categories.id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.full_name as sender_full_name',
                    'incoming_documents_manager.email as sender_email',
                    'incoming_documents_manager.phone as sender_phone',
                    'incoming_documents_has_users.created_at as createdAt',
                    'incoming_documents_categories.name as category_name',
                    'incoming_documents_has_users.start_date',
                    'incoming_documents_has_users.end_date',
                    'incoming_documents_has_users.allow_share',
                    'incoming_documents_has_users.is_download',
                    'incoming_documents_has_users.user_id',
                    'incoming_documents_has_users.assigned_by',
                    'incoming_documents_manager.document_url as document_url',
                    'incoming_documents_manager.id as d_m_id',
                    'incoming_documents_categories.id as d_m_c_id',
                    'incoming_documents_categories.name as cat_name',
                    'departments.name as dep_name',
            
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.user_id) AS assigned_to_name'),
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_has_users.assigned_by) AS assigned_by_name'),
                    DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = incoming_documents_manager.created_by) AS created_by_name')
                )
                ->latest('incoming_documents_has_users.created_at')
                ->where('incoming_documents_has_users.user_id', '=', auth()->user()->id)
                ->groupBy(
                    'incoming_documents_manager.category_id',
                    'incoming_documents_categories.id',
                    'incoming_documents_has_users.start_date',
                    'incoming_documents_has_users.end_date',
                    'incoming_documents_manager.id',
                    'incoming_documents_manager.title',
                    'incoming_documents_manager.document_url',
                    'incoming_documents_has_users.id',
                    'incoming_documents_has_users.created_at',
                    'incoming_documents_categories.name',
                    'incoming_documents_has_users.allow_share',
                    'incoming_documents_has_users.is_download',
                    'incoming_documents_has_users.user_id',
                    'incoming_documents_has_users.assigned_by',
                    'incoming_documents_manager.created_by',
                    'departments.name','incoming_documents_manager.status','incoming_documents_manager.phone','incoming_documents_manager.email','incoming_documents_manager.full_name',
                )
                ->get();

    $documents2 = \App\Models\Documents::query()
    ->join('documents_has_users', 'documents_manager.id', '=', 'documents_has_users.document_id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->join('users', 'documents_has_users.user_id', '=', 'users.id')
    ->select(
        'documents_categories.id as category_id',
        'documents_categories.name as category_name',
        'documents_manager.created_at as assigned_created_at',
        'documents_manager.id as d_id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_categories.description as doc_description',
        'documents_has_users.is_download',
        'documents_has_users.allow_share',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        \DB::raw('CONCAT(users.first_name, " ", users.last_name) AS assigned_to_name')
    )
    ->latest('documents_manager.created_at')
    ->where('documents_has_users.assigned_by','!=', '0')
    ->groupBy('documents_has_users.assigned_by',
               'documents_has_users.user_id',
               'documents_has_users.is_download',
               'documents_has_users.allow_share',
               'documents_has_users.user_id',
               'documents_categories.description',
               'documents_manager.document_url',
               'documents_manager.title',
               'documents_categories.id',
               'documents_categories.name',
               'documents_manager.created_at',
               'documents_manager.id',
               'assigned_to_name') // Include the nonaggregated column in the GROUP BY clause
    ->with('createdBy')
    ->limit(5)
    ->get();

    $dept = Department::get();
     $deptData = $dept->map(function ($dept1) {
            return [
                'id' => $dept1->id,
                'name' => $dept1->name,
            ];
        });

        $departments_data = $deptData->pluck('name', 'id');
        $departments_data->prepend('Select Department', '');

        $documents123 = DB::table('documents_has_users')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users.document_id')
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('users', 'documents_has_users.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_manager.title',
        'documents_has_users.created_at as createdAt',
        'documents_categories.name as category_name',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'documents_manager.document_url as document_url',
        'documents_manager.id as d_m_id',
        'documents_categories.id as d_m_c_id',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_manager.created_by) AS created_by_name')
    )
    ->latest('documents_has_users.created_at')
    ->groupBy(
        'documents_manager.department_id',
        'documents_categories.id',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users.id',
        'documents_has_users.created_at',
        'documents_categories.name',
        'documents_manager.category_id',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
    ->where('documents_manager.department_id', '=', '1')
    ->get();

    $users1 = DB::select('
    SELECT users.id as id, users.first_name as first_name, users.last_name as last_name
    FROM users
    JOIN staff ON users.id = staff.user_id
    WHERE users.level_id = 20
');

// Combine the results of all queries into one collection
$userData = collect($users1)
    ->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
        ];
    });
   
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        
        $users123 = $userData->pluck('name', 'id');

    /* $reminder = \DB::table('reminders')
    ->join('documents_manager', 'documents_manager.id', 'reminders.documents_manager_id')
    ->selectRaw('reminders.subject, reminders.message, reminders.reminderstart_date, documents_manager.title, documents_manager.document_url')
    ->get(); */

        return view('md', compact(
            'branch',
            'tc',
            'data',
            'ta',
            'revenue',
            'services',
            'departments',
            'departments_data',
            'documents123',
            'data1',
            'data2',
            'data3',
            'documents1',
            'documents2',
            'users123',
            //'reminder',
        ));
    }

    public function showareaoffice(Request $request)
    {

        dd($request->get('branch_id'));
    }
    public function edfinance()
    {
        $branchtotal = Branch::count();


        $departmenttotal = Department::count();
        $regiontotal = Region::count();
        $revenuefromecs = Payment::where('payment_type', 1)->count();
        $revenuefromcertificate = Payment::where('payment_type', 2)->count();
        $revenuefromregistration = Payment::where('payment_type', 3)->count();
        $totalstaff = Staff::count();
        $totalemployers = Employer::count();
        $totalemployees = Employee::count();
        $totalcertificate = Certificate::count();

        return view('ed_md', compact(
            'branchtotal',
            'departmenttotal',
            'regiontotal',
            'revenuefromecs',
            'revenuefromcertificate',
            'revenuefromregistration',
            'totalemployers',
            'totalemployees',
            'totalcertificate',

            'totalstaff'
        ));
    }
    public function edadmin()
    {
        $totalbranch = Branch::count();
        $totalregion = Region::count();
        $totaldept = Department::count();

        return view('ed_admin', compact('totalbranch', 'totalregion', 'totaldept'));
    }



    public function minister()
    {
        $branchtotal = Branch::count();


        $departmenttotal = Department::count();
        $regiontotal = Region::count();
        $revenuefromecs = Payment::where('payment_type', 1)->count();
        $revenuefromcertificate = Payment::where('payment_type', 2)->count();
        $revenuefromregistration = Payment::where('payment_type', 3)->count();
        $totalstaff = Staff::count();
        $totalemployers = Employer::count();
        $totalemployees = Employee::count();
        $totalcertificate = Certificate::count();

        return view('minister', compact(
            'branchtotal',
            'departmenttotal',
            'regiontotal',
            'revenuefromecs',
            'revenuefromcertificate',
            'revenuefromregistration',
            'totalemployers',
            'totalemployees',
            'totalcertificate',

            'totalstaff'
        ));
    }


    public function hradmin()
    {


        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('layouts/hradmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function aocadmin()
    {


        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('aocadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function superadmin()
    {


        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('superadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function aprd()
    {

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('aprd', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function fre()
    {

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $branch = Branch::all();
        $data = $data->paginate(10);
        return view('fre', compact(
            'registered_employers',
            'branch',
            'pending_employers',
            'registered_employees',
            'pending_employees',
            'data'
        ));
    }
    public function copaffairs()
    {

        $branch = Branch::all();
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('copaffairs', compact(
            'registered_employers',
            'branch',
            'pending_employers',
            'registered_employees',
            'pending_employees',
            'data'
        ));
    }

    public function financeadmin()
    {

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        $branch = Branch::all();
        return view('financeadmin', compact(
            'registered_employers',
            'branch',
            'pending_employers',
            'registered_employees',
            'pending_employees',
            'data'
        ));
    }


    public function claimsadmin()
    {

        //starting myown claims data
        $deathclaims = ClaimsCompensation::where('claimstype_id', 3)->count();
        $diseaseclaims = ClaimsCompensation::where('claimstype_id', 2)->count();

        //
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();

        $data = Employer::where('status', 1);
        $data = $data->paginate(10);


        return view('claimsadmin', compact(
            'registered_employers',
            'pending_employers',
            'registered_employees',
            'pending_employees',
            'data',
            'deathclaims',
            'diseaseclaims'

        ));
    }


    public function ictadmin()
    {
        $ictstaff = Staff::where('department_id', 3)->count();
        $branch = Branch::get()->prepend('All');
        return view('ictadmin', compact('ictstaff', 'branch'));
    }

    public function itmadmin()
    {

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('itmadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function legaladmin()
    {
        return view('legaladmin');
    }

    public function procurementadmin()
    {
        return view('procurement');
    }

    public function complianceadmin()
    {


        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('complianceadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }

    public function riskadmin()
    {

        return view('riskadmins');
    }


    public function auditadmin()
    {
        return view('auditadmin');
    }
    public function hseadmin()
    {

        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('hseadmin', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }
    public function pamsec()
    {
        $allstaff = Staff::count();
        $totalregion = Region::count();
        $totaldept = Department::count();
        $totalemployer = Employer::count();
        $managementstaff = Staff::where('ranking_id', '!==', 1)->count();

        return view('pamsec', compact(
            'allstaff',
            'totalregion',
            'totaldept',
            'totalemployer',
            'managementstaff'
        ));
    }
    // Mail Demo UI
    public function composeMail()
    {
        return view('composemail');
    }
    public function mailInbox()
    {
        return view('mailinbox');
    }

    public function viewReplyMail()
    {
        return view('viewreplymail');
    }

    public function loginToRoundcube($username, $password, $roundcubeUrl)
    {
        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $roundcubeUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            '_task' => 'login',
            '_action' => 'login',
            '_timezone' => '1',
            '_url' => '_task=login',
            '_user' => $username,
            '_pass' => $password,
        ]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Close cURL session
        curl_close($ch);

        // Return the response
        return [
            'status_code' => $statusCode,
            'body' => $response,
        ];
    }

    public function roundcubeLogin(Request $request)
    {
        $username = 'test1@NIWA.gov.ng';
        $password = 'Testingdata1!';
        $roundcubeUrl = 'http://localhost/NIWAmail/?_task=login';

        $response = $this->loginToRoundcube($username, $password, $roundcubeUrl);

        return response()->json($response);
    }

    public function clockIn(Request $request)
    {
        // Validate the request data as needed
        $data = $request->validate([
            'employee_id' => 'required',
            // Add validation rules for other fields
        ]);

        // Check if the user has already clocked in for the current day
        $existingAttendance = AttendanceEmployee::where('employee_id', Auth::user()->id)
            ->where('date', now()->toDateString())
            ->where('status', 'Clock In')
            ->first();

        if ($existingAttendance) {
            return response()->json(['message' => 'You have already clocked in for today.']);
        }

        // Insert the clock-in record
        $data['date'] = now()->toDateString(); // Current date
        $data['status'] = 'Clock In';
        $data['clock_in'] = now()->toTimeString(); // Current time
        $data['clock_out'] = now()->toTimeString(); // Current time
        $data['employee_id'] = Auth::user()->id;
        $data['late'] = now()->toTimeString();
        $data['early_leaving'] = now()->toTimeString();
        $data['overtime'] = now()->toTimeString();
        $data['total_rest'] = "23";
        $data['created_by'] = "4";

        $attendance = AttendanceEmployee::create($data);

        return response()->json(['message' => 'Clock In Successful']);
    }

    public function clockOut(Request $request)
    {
        // Validate the request data as needed
        $data = $request->validate([
            'employee_id' => 'required',
            // Add validation rules for other fields
        ]);

        // Find the last clock-in record for the user and update the clock-out time
        $attendance = AttendanceEmployee::where('employee_id', $data['employee_id'])
            ->where('date', now()->toDateString()) // Current date
            ->where('status', 'Clock In')
            ->latest()
            ->first();

        if ($attendance) {
            $attendance->status = 'Clock Out';
            $attendance->clock_out = now()->toTimeString(); // Current time
            $attendance->save();
            return response()->json(['message' => 'Clock Out Successful']);
        }

        return response()->json(['message' => 'No matching Clock In record found'], 404);
    }
}
