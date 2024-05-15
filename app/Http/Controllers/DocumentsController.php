<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendEmail;
use App\Models\MetaTag;
use App\Models\Documents;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\DocumentComment;
use App\Models\DocumentCommentFile;
use App\Models\DocumentHasRole;
use App\Models\DocumentHasUser;
use App\Models\DocumentHistory;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Shared\Models\Department;
use Illuminate\Support\Facades\Storage;
use App\Repositories\DocumentsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\CreateDocumentsRequest;
use App\Http\Requests\UpdateDocumentsRequest;
use App\Repositories\DocumentHasRoleRepository;
use App\Repositories\DocumentHasUserRepository;
use App\Repositories\DocumentsCategoryRepository;
use Modules\WorkflowEngine\Models\Staff;
use App\Models\DocumentsCategory;
use App\Repositories\DocumentHasUserFileRepository;
use App\Models\ClickedLink;

class DocumentsController extends AppBaseController
{


    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;


    /** @var DocumentsCategoryRepository $documentsCategoryRepository*/
    private $documentsCategoryRepository;

    /** @var $roleRepository RoleRepository */
    private $roleRepository;

    private $documentHasUserRepository;

    private $documentHasRoleRepository;

    private $documentHasUserFileRepository;


    public function __construct(DocumentHasUserFileRepository $documentHasUserFileRepo, DocumentHasRoleRepository $documentHasRoleRepo, DocumentHasUserRepository $documentHasUserRepo, RoleRepository $roleRepo, DocumentsCategoryRepository $documentsCategoryRepo, DocumentsRepository $documentRepo,  UserRepository $userRepo)
    {

        $this->documentRepository = $documentRepo;
        $this->userRepository = $userRepo;
        $this->documentsCategoryRepository = $documentsCategoryRepo;
        $this->roleRepository = $roleRepo;
        $this->documentHasUserRepository = $documentHasUserRepo;
        $this->documentHasRoleRepository = $documentHasRoleRepo;
        $this->documentHasUserFileRepository = $documentHasUserFileRepo;
    }

    /**
     * Display a listing of the documents.
     */
    public function index(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;

        $userIds = DocumentHasUser::get()->pluck('user_id');
        $loggedInUserId = auth()->id(); // Get the ID of the logged-in user

        $user_id = $userIds->contains($loggedInUserId);

        if (Auth::user()->hasRole('super-admin')) {
            // The logged-in user ID exists in the $userIds array
            //$documents = $this->documentRepository->paginate(10);
            $documents = \App\Models\Documents::query()
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_categories.id as category_id',
        'documents_categories.name as category_name',
        'documents_manager.created_at as document_created_at',
        'documents_manager.id as d_id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_categories.description as doc_description',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
       // 'documents_has_users.is_download',
       // 'documents_has_users.allow_share',
       // 'documents_has_users.user_id',
       // 'documents_has_users.assigned_by',
       // DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users.user_id) AS assigned_to_name')
    )
    ->latest('documents_manager.created_at')
    //->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->groupBy('departments.name','documents_categories.description','documents_manager.document_url','documents_manager.title','documents_categories.id', 'documents_categories.name', 'documents_manager.created_at', 'documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
    //->with('createdBy')
    ->get();

    $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });
   

        } else if (Auth::user()->level && Auth::user()->level->id == 20) {
            // The logged-in user ID exists in the $userIds array
            //$documents = $this->documentRepository->paginate(10);
            $documents = \App\Models\Documents::query()
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_categories.id as category_id',
        'documents_categories.name as category_name',
        'documents_manager.created_at as document_created_at',
        'documents_manager.id as d_id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_categories.description as doc_description',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
       // 'documents_has_users.is_download',
       // 'documents_has_users.allow_share',
       // 'documents_has_users.user_id',
       // 'documents_has_users.assigned_by',
       // DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users.user_id) AS assigned_to_name')
    )
    ->latest('documents_manager.created_at')
    ->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->groupBy('departments.name','documents_categories.description','documents_manager.document_url','documents_manager.title','documents_categories.id', 'documents_categories.name', 'documents_manager.created_at', 'documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
    //->with('createdBy')
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

   

        } else {
            // The logged-in user ID does not exist in the $userIds array
                $documents = \App\Models\Documents::query()
                ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_categories.id as category_id',
        'documents_categories.name as category_name',
        'documents_manager.created_at as document_created_at',
        'documents_manager.id as d_id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_categories.description as doc_description',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
         )
                ->where('documents_manager.created_by', $userId)
                ->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
                ->latest('documents_manager.created_at')
                ->groupBy('documents_categories.description','documents_manager.document_url','documents_manager.title','documents_categories.id', 'documents_categories.name', 'documents_manager.created_at', 'documents_manager.id') // Include the nonaggregated column in the GROUP BY clause
                //->with('createdBy')
                ->get();


                if (Auth::user()->level && Auth::user()->level->id == 19) {
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
                } else if (Auth::user()->level && Auth::user()->level->id == 18) {
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
                } else if (Auth::user()->level && Auth::user()->level->id == 17) {
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
                } else if (Auth::user()->level && Auth::user()->level->id == 3) {
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
                
                } else{

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
                }


        }


        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        /* $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });
 */
        $users = $userData->pluck('name', 'id');

        return view('documents.index', compact('documents', 'users', 'roles'));
    }

    public function storeClickedLink(Request $request)
{
    $userId = Auth::id();
    $linkUrl = $request->input('linkUrl');

    // Check if a record already exists for the given user and link_url
    $existingRecord = ClickedLink::where('user_id', $userId)
                                  ->where('link_url',  $linkUrl)
                                  ->first();

    if ($existingRecord) {
        // Update the existing record if it already exists
        $existingRecord->update([
            'updated_at' => now(), // Update the timestamp
        ]);
    } else {
        // Create a new record if it doesn't exist
        ClickedLink::create([
            'user_id' => $userId,
            'link_url' => $linkUrl,
        ]);
    }
}

public function fetchClickedLinks(Request $request)
{
    $userId = $userId = Auth::id();

    // Fetch clicked links for the user
    $clickedLinks = ClickedLink::where('user_id', $userId)->get();

    return response()->json($clickedLinks);
}
    public function showDepartementalDocuments(Request $request, $id)
{
    $documents = DB::table('documents_has_users')
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
        ->where('documents_has_users.user_id', '=', auth()->user()->id)
        //->where('documents_manager.branch_id', '=', auth()->user()->staff->branch_id)
        ->limit(10)
        ->get();

    return response()->json($documents);
}

public function showDepartementalDocumentsByUser(Request $request, $id)
{
    $documents = DB::table('documents_has_users')
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
        ->where('documents_has_users.user_id', '=', auth()->user()->id)
        //->where('documents_manager.branch_id', '=', auth()->user()->staff->branch_id)
        ->limit(10)
        ->get();

    return response()->json($documents);
}


    public function documentsByAudits()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */

       // if (Auth()->user()->hasRole('super-admin') || Auth()->user()->hasRole('MANAGING DIRECTOR')) {

        /* $documents = DB::table('documents_manager')
            ->join('audits', 'documents_manager.id', '=', 'audits.auditable_id')
            ->join('users', 'documents_manager.created_by', '=', 'users.id')
            ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            ->select('documents_manager.*', 'documents_manager.id as id', 'audits.*', 'users.*', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name')
            ->where('audits.auditable_type', "App\Models\Documents")
            ->latest('documents_manager.created_at')
            ->get(); */
            $documents = DB::table('documents_manager')
            ->join('audits', 'documents_manager.id', '=', 'audits.auditable_id')
            ->join('users as created_by_user', 'documents_manager.created_by', '=', 'created_by_user.id')
            ->join('documents_has_users', 'documents_manager.id', '=', 'documents_has_users.document_id')
            ->join('users as assigned_to_user', 'documents_has_users.user_id', '=', 'assigned_to_user.id')
            ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            ->select('documents_categories.id as d_c_id','documents_manager.*', 'documents_manager.id as id', 'audits.*', 'created_by_user.first_name as created_by_first_name', 'created_by_user.last_name as created_by_last_name', 'assigned_to_user.first_name as assigned_to_first_name', 'assigned_to_user.last_name as assigned_to_last_name', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name')
            ->where('audits.auditable_type', "App\Models\Documents")
            ->latest('documents_manager.created_at')
            ->distinct() // Ensure distinct results
            ->get();        

        // Now that you have the documents, you can load the category relationship
$documentIds = $documents->pluck('d_c_id')->toArray();
$categories = DocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');
       /*  } else{
            
            return redirect()->back()->with('error', 'Permission denied for document audit trail access');
        } */

        return view('documents.document_audits', compact('documents','categories'));
    }

    public function documentsVersion(Request $request, $id)
    {
        //if (Auth()->user()->hasRole('super-admin')) {

        $documentHistory = DB::table('documents_histories')
           // ->join('documents_manager', 'documents_histories.created_by', '=', 'documents_manager.id')
            ->join('users', 'documents_histories.created_by', '=', 'users.id')
            ->select('documents_histories.*', 'documents_histories.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_histories.document_url as doc_url')
            ->where('documents_histories.document_id', $id)
            //->latest('documents_histories.id')
            ->get();

        /* }else{

            $userId = Auth::user()->id;
        $documentHistory = DB::table('documents_histories')
           // ->join('documents_manager', 'documents_histories.created_by', '=', 'documents_manager.id')
            ->join('users', 'documents_histories.created_by', '=', 'users.id')
            ->select('documents_histories.*', 'documents_histories.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_histories.document_url as doc_url')
            ->where('documents_histories.document_id', $id)
            ->where('documents_histories.created_by', '=', $userId)
            //->latest('documents_histories.id')
            ->get();

        } */

        return response()->json($documentHistory);
    }

    public function sharedUser()
    {
        

        $userId = Auth::user()->id;


        if (Auth::user()->hasRole('super-admin')) {

            /* $documents = DB::table('documents_has_users')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users.document_id')
    ->join('users', 'documents_has_users.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select('documents_has_users.*', 'documents_manager.*', 'users.*', 'documents_has_users.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.category_id as d_m_c_id')
    ->latest('documents_has_users.created_at')
    ->groupBy('documents_manager.document_url','documents_manager.category_id','documents_has_users.id','documents_has_users.created_at', 'documents_categories.name', 'documents_manager.category_id')
    ->get(); */
   
    $documents = DB::table('documents_has_users')
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
    //->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->groupBy(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users.id',
        'documents_has_users.created_at',
        'documents_categories.name',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
    ->get();

    
    $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        } else if (Auth::user()->level && Auth::user()->level->id == 20) {

   
    $documents = DB::table('documents_has_users')
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
    ->where('documents_has_users.user_id', '=', $userId)
    ->groupBy(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users.id',
        'documents_has_users.created_at',
        'documents_categories.name',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
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


        } else if (Auth::user()->level && Auth::user()->level->id == 19) {

            
   
    $documents = DB::table('documents_has_users')
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
    ->where('documents_has_users.user_id', '=', $userId)
    ->groupBy(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users.id',
        'documents_has_users.created_at',
        'documents_categories.name',
        'documents_has_users.allow_share',
        'documents_has_users.is_download',
        'documents_has_users.user_id',
        'documents_has_users.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
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


        } else if (Auth::user()->level && Auth::user()->level->id == 17) {

            
   
            $documents = DB::table('documents_has_users')
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
            ->where('documents_has_users.user_id', '=', $userId)
            ->groupBy(
                'documents_manager.category_id',
                'documents_categories.id',
                'documents_has_users.start_date',
                'documents_has_users.end_date',
                'documents_manager.id',
                'documents_manager.title',
                'documents_manager.document_url',
                'documents_has_users.id',
                'documents_has_users.created_at',
                'documents_categories.name',
                'documents_has_users.allow_share',
                'documents_has_users.is_download',
                'documents_has_users.user_id',
                'documents_has_users.assigned_by',
                'departments.name',
                'documents_manager.created_by',
            )
            ->get();
        
            
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
        
        
     } else if (Auth::user()->level && Auth::user()->level->id == 18) {

            
   
                    $documents = DB::table('documents_has_users')
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
                    ->where('documents_has_users.user_id', '=', $userId)
                    ->groupBy(
                        'documents_manager.category_id',
                        'documents_categories.id',
                        'documents_has_users.start_date',
                        'documents_has_users.end_date',
                        'documents_manager.id',
                        'documents_manager.title',
                        'documents_manager.document_url',
                        'documents_has_users.id',
                        'documents_has_users.created_at',
                        'documents_categories.name',
                        'documents_has_users.allow_share',
                        'documents_has_users.is_download',
                        'documents_has_users.user_id',
                        'documents_has_users.assigned_by',
                        'departments.name',
                        'documents_manager.created_by',
                    )
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
                
     } else if (Auth::user()->level && Auth::user()->level->id == 3) {

            
   
        $documents = DB::table('documents_has_users')
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
        ->where('documents_has_users.user_id', '=', $userId)
        ->groupBy(
            'documents_manager.category_id',
            'documents_categories.id',
            'documents_has_users.start_date',
            'documents_has_users.end_date',
            'documents_manager.id',
            'documents_manager.title',
            'documents_manager.document_url',
            'documents_has_users.id',
            'documents_has_users.created_at',
            'documents_categories.name',
            'documents_has_users.allow_share',
            'documents_has_users.is_download',
            'documents_has_users.user_id',
            'documents_has_users.assigned_by',
            'departments.name',
            'documents_manager.created_by',
        )
        ->get();
    
        
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
    
} else {
           

    //here
    $documents = DB::table('documents_has_users')
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
        'documents_categories.id',
        'documents_has_users.start_date',
        'documents_has_users.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users.id',
        'documents_has_users.created_at',
        'documents_categories.name'
    )
    ->where('documents_has_users.user_id', '=', $userId)
    ->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->get();

    
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
      
        
        }

        // Now that you have the documents, you can load the category relationship
$documentIds = $documents->pluck('d_m_c_id')->toArray();
$categories = DocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');


        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
       /*  $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        }); */

        $users = $userData->pluck('name', 'id');

        return view('documents.document_shared_user', compact('documents', 'users', 'roles', 'categories'));
    }

    public function sharedUserFile()
    {
        /* /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $userId = Auth::user()->id;


        if (Auth::user()->hasRole('super-admin')) {

            $documents = DB::table('documents_has_users_files')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users_files.document_id')
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('users', 'documents_has_users_files.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_manager.title',
        'documents_has_users_files.created_at as createdAt',
        'documents_categories.name as category_name',
        'documents_has_users_files.start_date',
        'documents_has_users_files.end_date',
        'documents_has_users_files.allow_share',
        'documents_has_users_files.is_download',
        'documents_has_users_files.user_id',
        'documents_has_users_files.assigned_by',
        'documents_manager.document_url as document_url',
        'documents_manager.id as d_m_id',
        'documents_categories.id as d_m_c_id',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users_files.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users_files.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_manager.created_by) AS created_by_name')
    )
    ->latest('documents_has_users_files.created_at')
    //->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->groupBy(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_has_users_files.start_date',
        'documents_has_users_files.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users_files.id',
        'documents_has_users_files.created_at',
        'documents_categories.name',
        'documents_has_users_files.allow_share',
        'documents_has_users_files.is_download',
        'documents_has_users_files.user_id',
        'documents_has_users_files.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
    ->get();

    
    $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        } else if (Auth::user()->level && Auth::user()->level->id == 20) {

            /* $documents = DB::table('documents_has_users_files')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users_files.document_id')
    ->join('users', 'documents_has_users_files.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select('documents_has_users_files.*', 'documents_manager.*', 'users.*', 'documents_has_users_files.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.category_id as d_m_c_id')
    ->latest('documents_has_users_files.created_at')
    ->groupBy('documents_manager.document_url','documents_manager.category_id','documents_has_users_files.id','documents_has_users_files.created_at', 'documents_categories.name', 'documents_manager.category_id')
    ->get(); */
   
    $documents = DB::table('documents_has_users_files')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users_files.document_id')
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('users', 'documents_has_users_files.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_manager.title',
        'documents_has_users_files.created_at as createdAt',
        'documents_categories.name as category_name',
        'documents_has_users_files.start_date',
        'documents_has_users_files.end_date',
        'documents_has_users_files.allow_share',
        'documents_has_users_files.is_download',
        'documents_has_users_files.user_id',
        'documents_has_users_files.assigned_by',
        'documents_manager.document_url as document_url',
        'documents_manager.id as d_m_id',
        'documents_categories.id as d_m_c_id',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users_files.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users_files.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_manager.created_by) AS created_by_name')
    )
    ->latest('documents_has_users_files.created_at')
    ->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->groupBy(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_has_users_files.start_date',
        'documents_has_users_files.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users_files.id',
        'documents_has_users_files.created_at',
        'documents_categories.name',
        'documents_has_users_files.allow_share',
        'documents_has_users_files.is_download',
        'documents_has_users_files.user_id',
        'documents_has_users_files.assigned_by',
        'departments.name',
        'documents_manager.created_by',
    )
    ->get();

    
    $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        } else {
           

    //here
    $documents = DB::table('documents_has_users_files')
    ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_users_files.document_id')
    ->join('departments', 'departments.id', '=', 'documents_manager.department_id')
    ->join('users', 'documents_has_users_files.user_id', '=', 'users.id')
    ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
    ->select(
        'documents_manager.category_id',
        'documents_categories.id',
        'documents_manager.title',
        'documents_has_users_files.created_at as createdAt',
        'documents_categories.name as category_name',
        'documents_has_users_files.start_date',
        'documents_has_users_files.end_date',
        'documents_has_users_files.allow_share',
        'documents_has_users_files.is_download',
        'documents_has_users_files.user_id',
        'documents_has_users_files.assigned_by',
        'documents_manager.document_url as document_url',
        'documents_manager.id as d_m_id',
        'documents_categories.id as d_m_c_id',
        'documents_categories.name as cat_name',
        'departments.name as dep_name',
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users_files.user_id) AS assigned_to_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_has_users_files.assigned_by) AS assigned_by_name'),
        DB::raw('(SELECT CONCAT(first_name, " ", last_name) FROM users WHERE users.id = documents_manager.created_by) AS created_by_name')
    )
    ->latest('documents_has_users_files.created_at')
    ->groupBy(
        'documents_categories.id',
        'documents_has_users_files.start_date',
        'documents_has_users_files.end_date',
        'documents_manager.id',
        'documents_manager.title',
        'documents_manager.document_url',
        'documents_has_users_files.id',
        'documents_has_users_files.created_at',
        'documents_categories.name',
        'documents_has_users_files.allow_share',
        'documents_has_users_files.is_download',
        'documents_has_users_files.user_id',
        'documents_has_users_files.assigned_by',
        'departments.name',
        'documents_manager.created_by',
        'documents_manager.category_id',
    )
    ->where('documents_has_users_files.user_id', '=', $userId)
    ->where('documents_manager.branch_id', auth()->user()->staff->branch_id)
    ->get();
   
    

    
        // Fetch roles
$roles2 = Role::whereIn('id', [2])->get();

// Get the users who have any of these roles
$users1 = User::whereHas('roles', function ($query) use ($roles2) {
    $query->whereIn('id', $roles2->pluck('id'));
})->get(['id', 'first_name', 'last_name']);

$users2 = DB::table('users')
    ->join('staff', 'staff.user_id', '=', 'users.id')
    ->join('departments', 'departments.id', '=', 'staff.department_id')
    ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name')
    ->where('staff.department_id', '=', Auth::user()->staff->department_id)
    ->where('staff.branch_id', '=', Auth::user()->staff->branch_id)
    ->get();

// Combine the data
$mergedUsers = $users2->merge($users1);

// Process the data for display
$userData = $mergedUsers->map(function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->first_name . ' ' . $user->last_name,
    ];
});

        
        }

        // Now that you have the documents, you can load the category relationship
$documentIds = $documents->pluck('d_m_c_id')->toArray();
$categories = DocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');


        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
       /*  $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        }); */

        $users = $userData->pluck('name', 'id');

        return view('documents.document_shared_user_file', compact('documents', 'users', 'roles', 'categories'));
    }


    public function sharedRole()
    {
        /* /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        // Get the currently authenticated user
        $user = Auth::user();
        // Get the role IDs of the user
        $roleIds = $user->getRoleNames()->map(function ($roleName) {
            return Role::where('name', $roleName)->first()->id;
        });

        // If the user has only one role, you can directly access it like this:
        $roleId = $roleIds->first();

        if (Auth::user()->hasRole('super-admin') || Auth::user()->level && Auth::user()->level->id == 20) {
            $documents = DB::table('documents_has_roles')
                ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_roles.document_id')
                ->join('roles', 'roles.id', '=', 'documents_has_roles.role_id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select(
                    'documents_has_roles.start_date as start_date',
                    'documents_has_roles.end_date as end_date',
                    'documents_manager.title',
                    'documents_manager.id as id',
                    'documents_manager.document_url',
                    'roles.name as role_name',
                    'documents_categories.name as category_name',
                    'documents_manager.category_id as category_id',
                )
                ->latest('documents_manager.created_at')
                ->get();
        } else {
            $documents = DB::table('documents_has_roles')
                ->join('documents_manager', 'documents_manager.id', '=', 'documents_has_roles.document_id')
                ->join('roles', 'roles.id', '=', 'documents_has_roles.role_id')
                ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
                ->select(
                    'documents_has_roles.start_date as start_date',
                    'documents_has_roles.end_date as end_date',
                    'documents_manager.title',
                    'documents_manager.id as id',
                    'documents_manager.document_url',
                    'roles.name as role_name',
                    'documents_categories.name as category_name',
                    'documents_manager.category_id as category_id',
                )
                ->latest('documents_manager.created_at')
                ->where('documents_has_roles.role_id', $roleId)
                ->get();
        }

        // Now that you have the documents, you can load the category relationship
$documentIds = $documents->pluck('document_id')->toArray();
$categories = DocumentsCategory::whereIn('id', $documentIds)->get()->keyBy('id');

        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');


        return view('documents.document_shared_role', compact('documents', 'users', 'roles', 'categories'));
    }

    public function shareDocument(Request $request, $id)
    {
        if (Auth::user()->hasRole('super-admin') || Auth::user()->level && Auth::user()->level->id == 18) {
        $share_documents = DB::table('documents_manager')
            //->join('documents_has_roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->join('documents_has_users', 'documents_has_users.document_id', '=', 'documents_manager.id')
            ->join('users', 'documents_has_users.user_id', '=', 'users.id') // Join with the 'users' table
            ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            //->join('roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->select('documents_manager.*', 'documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.document_url as doc_url', 'documents_manager.description as doc_desc', 'documents_has_users.is_download')
            ->latest('documents_manager.created_at')
            ->where('documents_manager.id', $id)
            ->get();
        }else{
            $share_documents = DB::table('documents_manager')
            //->join('documents_has_roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->join('documents_has_users', 'documents_has_users.document_id', '=', 'documents_manager.id')
            ->join('users', 'documents_has_users.user_id', '=', 'users.id') // Join with the 'users' table
            ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            //->join('roles', 'documents_has_roles.role_id', '=', 'roles.id')
            ->select('documents_manager.*', 'documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.document_url as doc_url', 'documents_manager.description as doc_desc', 'documents_has_users.is_download')
            ->latest('documents_manager.created_at')
            ->where('documents_has_users.user_id', Auth()->user()->id)
            ->where('documents_manager.id', $id)
            ->get();
        }

        return response()->json($share_documents);
        /* try {
    $share_documents = DB::table('documents_manager')
        ->join('documents_has_users', 'documents_has_users.document_id', '=', 'documents_manager.id')
        ->join('users', 'documents_has_users.user_id', '=', 'users.id')
        ->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
        ->leftJoin('model_has_roles', function ($join) {
            $join->on('model_has_roles.model_id', '=', 'users.id')
                 ->where('model_has_roles.model_type', '=', 'App\User');
        })
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->join('documents_has_roles', 'documents_has_roles.document_id', '=', 'documents_manager.id')
        ->select('documents_manager.*', 'documents_has_users.*', 'users.email as uemail', 'users.first_name as firstName', 'users.last_name as lastName', 'roles.name as role_name', 'documents_manager.created_at as createdAt', 'documents_categories.name as category_name', 'documents_manager.document_url as doc_url', 'documents_manager.description as doc_desc')
        ->latest('documents_manager.created_at')
        ->where('documents_manager.id', $id)
        ->get();

    return response()->json($share_documents);
} catch (\Exception $e) {
    return response()->json(['error' => $e->getMessage()], 500);
} */
    }

    public function documentsComment(Request $request, $id)
    {
        $documentHistory = DB::table('documents_comments')
            ->join('users', 'documents_comments.created_by', '=', 'users.id')
            ->join('documents_manager', 'documents_comments.document_id', '=', 'documents_manager.id')
            ->select('documents_comments.*', 'documents_comments.created_at as createdAt', 'users.first_name as firstName', 'users.last_name as lastName', 'documents_manager.document_url as doc_url')
            ->where('documents_comments.document_id', $id)
            ->get();

        return response()->json($documentHistory);
    }

    public function sendEmail(Request $request)
    {
        try {
            $subject = $request->input('subject');
            $body = $request->input('body');
            $attachment = $request->input('attachment');

            // Send the email using the SendEmail Mailable
            Mail::to($request->input('to'))->send(new SendEmail($subject, $body, $attachment));

            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send email. Please try again later. ERROR:' . $e);
        }
    }

    // public function getusersbydept($deptid, $branchid)
    // {
    //     if (!is_array($deptid)) {
    //         $deptid = [$deptid];
    //     }
    //     $users = Staff::whereIn('department_id', $deptid)
    //         ->join('users', 'users.id', 'staff.id')
    //         ->where('staff.branch_id', $branchid)
    //         ->get();
    //     return response()->json($users);
    // }
    public function getusersbydept(Request $request)
    {
        $users = collect();
        $deptids = $request->input('deptid');
        $branchids = $request->input('branchid');

        foreach ($deptids as $deptid) {
            foreach ($branchids as $branchid) {
                if ($deptid == '' && $branchid == '') {
                    // Fetch all users
                    $users = $users->merge(
                        Staff::join('users', 'staff.user_id', 'users.id')->get()
                    );
                } elseif ($deptid == '') {
                    // Fetch users based on branch
                    $users = $users->merge(
                        Staff::where('branch_id', $branchid)
                            ->join('users', 'staff.user_id', 'users.id')->get()
                    );
                } elseif ($branchid == '') {
                    // Fetch users based on department
                    $users = $users->merge(
                        Staff::where('department_id', $deptid)
                            ->join('users', 'staff.user_id', 'users.id')->get()
                    );
                } else {
                    // Fetch users based on both department and branch
                    $users = $users->merge(
                        Staff::where('department_id', $deptid)
                            ->where('branch_id', $branchid)
                            ->join('users', 'staff.user_id', 'users.id')->get()
                    );
                }
            }
        }

        return response()->json($users);
    }






    public function documentsByUsers()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = $this->documentRepository->paginate(10);

        return view('documents.document_user', compact('documents'));
    }

    public function documentsByRole(Request $request)
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */



        $documents = $this->documentHasRoleRepository->paginate(10);

        return view('documents.document_role', compact('documents'));
    }

    /**
     * Display a listing of the Document assigned to a specific user.
     */
    public function viewDocumentAssignedToUser()
    {
        $user = Auth::user();
        $memos_has_user = $this->documentHasUserRepository->findByUser($user->id)->paginate(10);

        return view('documentmanager::memos.memos_assigned_to_user')
            ->with(['user' => $user, 'memos_has_user' => $memos_has_user]);
    }

    /**
     * Show the form for creating a new Memo.
     */
    public function create()
    {
        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */

       
        //$categories = $this->documentsCategoryRepository->all()->pluck('name', 'id');
        if (Auth::user()->hasRole('super-admin') || Auth::user()->level && Auth::user()->level->id == 20) {
        $categories1 = DB::table('documents_categories')
            ->join('departments', 'departments.id', '=', 'documents_categories.department_id')
            //->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            ->select('documents_categories.description as subject', 'departments.name as department_name', 'documents_categories.id as documents_category_id', 'documents_categories.name as category_name', 'documents_categories.description as documents_category_description')
            //->latest('documents_categories.created_at')
            ->get();
            $categories = $categories1->map(function ($category) {
                return [
                    'id' => $category->documents_category_id,
                    'name' => $category->department_name . ' / ' .  $category->category_name . ' / ' .  $category->subject,
                ];
            })->pluck('name', 'id')->toArray();
        }else{
            $categories1 = DB::table('documents_categories')
            ->join('departments', 'departments.id', '=', 'documents_categories.department_id')
            //->join('documents_categories', 'documents_manager.category_id', '=', 'documents_categories.id')
            ->select('documents_categories.description as subject', 'departments.name as department_name', 'documents_categories.id as documents_category_id', 'documents_categories.name as category_name', 'documents_categories.description as documents_category_description')
            ->where('departments.id', Auth()->user()->staff->department_id)
            ->get();
            $categories = $categories1->map(function ($category) {
                return [
                    'id' => $category->documents_category_id,
                    'name' => $category->department_name . ' / ' .  $category->category_name . ' / ' .  $category->subject,
                ];
            })->pluck('name', 'id')->toArray();
        }
            
        //$roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');
        //$users->prepend('Select user', '');
        $dept = Department::get();
        // dd($dept);
        $office = Branch::get();


        return view('documents.create', compact(['categories', 'users', 'roles', 'dept', 'office']));
    }

    public function shareUser(Request $request)
    {
        $user = Auth::user();
        $input = $request->all();

        /* $document = DocumentHasUser::where('document_id', $request->shareuser_id)->first();
        if($document){
        $document->start_date = $request->start_date;
        $document->end_date = $request->end_date;
        $document->is_download = $request->is_download;
        $document->save();
        } */

        //$document = DocumentHasUser::where('document_id', $request->shareuser_id)->first();

        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $logged_in_user = Auth::user();
            foreach ($users as $key => $user_id) {
                $input_fields['user_id'] = $user_id;
                $input_fields['document_id'] = $request->shareuser_id;
                $input_fields['assigned_by'] = $logged_in_user->id;
                $input_fields['start_date'] = $request->start_date;
                $input_fields['end_date'] = $request->end_date;
                $input_fields['is_download'] = $request->is_download;
                $input_fields['allow_share'] = $request->allow_share;


                $this->documentHasUserRepository->create($input_fields);

                /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) { 
            } */
            }
            DocumentComment::create([
                'created_by' => $user->id,
                'document_id' => $request->shareuser_id,
                'comment' => $request->comment,
            ]);
            //$this->_assignToUsers($users, $document);
        }
        Flash::success('Documents shared successfully.');

        return redirect()->back();
    }

    public function shareUserFile(Request $request){

        $user = Auth::user();
        $input = $request->all();

        
        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $logged_in_user = Auth::user();
            foreach ($users as $key => $user_id) {
                $input_fields['user_id'] = $user_id;
                $input_fields['document_id'] = $request->shareuser_id;
                $input_fields['assigned_by'] = $logged_in_user->id;
                $input_fields['start_date'] = $request->start_date;
                $input_fields['end_date'] = $request->end_date;
                $input_fields['is_download'] = $request->is_download;
                $input_fields['allow_share'] = $request->allow_share;


                $this->documentHasUserFileRepository->create($input_fields);

                /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) { 
            } */
            }
            DocumentCommentFile::create([
                'created_by' => $user->id,
                'document_id' => $request->shareuser_id,
                'comment' => $request->comment,
            ]);
            //$this->_assignToUsers($users, $document);
        }


        Flash::success('File shared successfully.');

        return redirect()->back();
    }


         
    public function shareRole(Request $request)
    {

        $input = $request->all();

        //$document = DocumentHasRole::where('document_id', $request->sharerole_id)->first();

        $roles = $input['roles'];
        if ($roles != null) {
            $logged_in_user = Auth::user();
            foreach ($roles as $key => $role_id) {
                $role = Role::find($role_id); // Find the role by its ID
                $input_fields['role_id'] = $role_id;
                $input_fields['document_id'] = $request->sharerole_id;
                $input_fields['assigned_by'] = $logged_in_user->id;
                $input_fields['start_date'] = $request->start_date;
                $input_fields['end_date'] = $request->end_date;
                $input_fields['is_download'] = $request->is_download;

                $this->documentHasRoleRepository->create($input_fields);

                // Additional logic if needed

            }
        }

        //$this->documentHasRoleRepository->create($input_fields);
        Flash::success('Role permissions shared successfully.');

        return redirect(route('documents_manager.sharedrole'));
    }

    /**
     * Store a newly created Memo in storage.
     */
    public function store(Request $request)
    {



        $user = Auth::user();
        $input = $request->all();
        $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents";




        // Check if document with title exist in the folder
        $title = $input['title']; // Assuming the title is provided in the input array

        // Check if a document with the given title already exists
        $existingDocument = Documents::where('title', $title)->first();


        // Prepare document input
        $document_input = [];


        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];

        if (isset($input['category_id'])) {

            $document_input['category_id'] = $input['category_id'];
        }
        $document_input['created_by'] = $user->id;



        $path_folder = public_path($path);
        // Save file
        $file = $request->file('file');
        $title = str_replace(' ', '', $input['title']);
        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);
        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
        $document_input['department_id'] = Auth()->user()->staff->department_id;
        $document_input['branch_id'] = Auth()->user()->staff->branch_id;
        $document = $this->documentRepository->create($document_input);

        DocumentHistory::create([
            'created_by' => $user->id,
            'document_id' => $document->id,
            'document_url' => $document_url,
        ]);

        // Save document version

       

        // Retrieve meta tags from the request
        $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
        if($metaTags){
        foreach ($metaTags as $tag) {
            MetaTag::create([
                'name' => $tag,
                'document_id' => $document->id,
                'created_by' => $user->id,
            ]);
        }
    }

        Flash::success('Document saved successfully.');

        return redirect(route('documents_manager.index'));
    }

    public function add(Request $request)
    {


        $user = Auth::user();
        $input = $request->all();
        // $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents";


        // Prepare document input
        $document_input = [];

        $doc = Documents::find($request->upload_id);

        $path_folder = public_path($path);
        // Save file
        $file = $request->file('file');
        $title = str_replace(' ', '', $doc->title);
        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);
        $document_url = $path . "/" . $file_name;
        $document_input['document_url'] = $document_url;
        $document = $this->documentRepository->update($document_input, $request->upload_id);

        DocumentHistory::create([
            'created_by' => $user->id,
            'document_id' => $document->id,
            'document_url' => $document_url,
        ]);


        Flash::success('New document version saved successfully.');

        return redirect(route('documents_manager.index'));
    }

    public function addComment(Request $request)
    {

        /* if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */


        $user = Auth::user();
        $input = $request->all();

        DocumentComment::create([
            'created_by' => $user->id,
            'document_id' => $request->comment_id,
            'comment' => $request->comment,
        ]);


        Flash::success('New comment saved successfully.');

        return redirect(route('documents_manager.index'));
    }
    /**
     * assign memo to userss
     */

    public function assignToUsers(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $users = $input['users'];

        /* if (!checkPermission('assign memo to users')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToUsers($users, $memo);

        Flash::success('Memo assigned successfully to user(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Assign memo to departments
     */

    public function assignToDepartments(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $departments = $input['departments'];

        /* if (!checkPermission('assign memo to department')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToRoles($departments, $memo);

        Flash::success('Memo assigned successfully to roles(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Display a listing of the assigned users to a Memo.
     */
    public function assignedUsers(Request $request, $id)
    {
        /* if (!checkPermission('read user memo  Assigned')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_users = $memo->assignedUsers()->paginate();

        return view('documentmanager::memos.assigned_users')
            ->with(['memo' => $memo, 'assigned_users' => $assigned_users]);
    }

    /**
     * Display a listing of the assigned departments to a Memo.
     */
    public function assignedDepartments(Request $request, $id)
    {
        /*  if (!checkPermission(' read department memo Assigned')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_departments = $memo->assignedDepartments()->paginate();

        return view('documentmanager::memos.assigned_departments')
            ->with(['memo' => $memo, 'assigned_departments' => $assigned_departments]);
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedUser($user_id, $memo_id)
    {
        /* if (!checkPermission('delete user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo_has_user = $this->memoHasUserRepository->findByUserAndMemo($user_id, $memo_id);

        if (empty($memo_has_user)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedUsers', $memo_id));
        }

        $this->memoHasUserRepository->delete($memo_has_user->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedUsers', $memo_id));
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedDepartment($department_id, $memo_id)
    {
        /* if (!checkPermission('delete department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo_has_department = $this->memoHasDepartmentRepository->findByDepartmentAndMemo($department_id, $memo_id);

        if (empty($memo_has_department)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedDepartments', $memo_id));
        }

        $this->memoHasDepartmentRepository->delete($memo_has_department->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedDepartments', $memo_id));
    }

    /**
     * Display a listing of the Memo Versions.
     */
    public function memoVersions(Request $request, $id)
    {
        /* if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $memo_document = $this->documentRepository->find($memo->document_id);

        if (empty($memo_document)) {
            Flash::error("Memo's document not found");

            return redirect(route('memos.index'));
        }

        $memoVersions = $memo_document->documentVersions()->paginate(10);

        return view('documentmanager::memos.memo_versions.index')
            ->with(['memo' => $memo, 'memo_document' => $memo_document, 'documentVersions' => $memoVersions]);
    }


    /**
     * Display the specified Memo.
     */
    public function show($id)
    {
        /* if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $memo = $this->documentRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.show')->with('memo', $memo);
    }

    /**
     * Show the form for editing the specified Document.
     */
    public function edit($id)
    {
        /* if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents_manager.index'));
        }
        $categories = $this->documentsCategoryRepository->all()->pluck('name', 'id');
        //$roles = Role::pluck('name', 'id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        // $roles->prepend('Select role', '');
        // $departments->prepend('Select department', '');
        $users1 = $this->userRepository->all();

        $userData = $users1->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->first_name . ' ' . $user->last_name,
            ];
        });

        $users = $userData->pluck('name', 'id');
        $single_user = User::find($id);
        $single_doc = DocumentHasUser::where('document_id', $id)->get();
        $single_role = DocumentHasRole::where('document_id', $id)->get();
        $single_metas = MetaTag::where('document_id', $id)->get();

        return view('documents.edit', compact('document', 'categories', 'users', 'roles', 'single_role', 'single_doc', 'single_metas'));
    }

    /**
     * Update the specified Document in storage.
     */
    public function update($id, Request $request)
    {
        /* if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $input = $request->all();
        $document = $this->documentRepository->find($id);
        $document_id = $document->id;

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents_manager.index'));
        }


        if ($request->hasFile('file')) {
            $path = "documents";
            // Save file
            $path_folder = public_path($path);
            $file = $request->file('file');

            $title = str_replace(' ', '', $document->title);

            $file_name = $title . '_' . 'v' . '_' . rand() . '.' . $file->getClientOriginalExtension();
            $file->move($path_folder, $file_name);

            $document_url = $path . "/" . $file_name;
            $document_input['document_url'] = $document_url;
        }

        // Save document

        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['category_id'] = $input['category_id'];

        $user = Auth::user();


        $document = $this->documentRepository->update($document_input, $document_id);

        $document_history = DocumentHistory::where('document_id', $document_id)->first();
        if ($document_history) {
            $document_history->created_by = $user->id;
            if ($request->hasFile('file')) {
                $document_history->document_url =  $document_url;
            }
            $document_history->save();
        }


        MetaTag::where('document_id', $document_id)->delete();
        DocumentHasRole::where('document_id', $document_id)->delete();
        DocumentHasUser::where('document_id', $document_id)->delete();

        // Assign to roles(s)
        $roleId = $user->roles->pluck('id')->all();
        $userId = $user->id;

        $roles = $roleId;//$input['roles'];
        if ($roles != null) {
            $this->_assignToRoles($roles, $document);
        }
        // Assign to user(s)
        $users = [$userId]; // Convert $userId to an array
        if ($users != null) {
            $this->_assignToUsers($users, $document);
        }

        // Retrieve meta tags from the request
        $metaTags = $request->input('meta_tags');
        // Iterate over each meta tag and save it to the database
        foreach ($metaTags as $tag) {
            MetaTag::create([
                'name' => $tag,
                'document_id' => $document->id,
                'created_by' => $user->id,
            ]);
            /*  $meta_tag = MetaTag::where('document_id', $document_id)->first();
       if ($meta_tag) {
       $meta_tag->created_by = $user->id;
       $meta_tag->name =  $tag;
       $meta_tag->save();
       } */
        }



        Flash::success('Document updated successfully.');

        return redirect(route('documents_manager.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /* if (!checkPermission('delete document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        } */
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents_manager.index'));
        }

        $this->documentRepository->delete($id);
        $document_history = DocumentHistory::where('document_id', $id)->delete();
        MetaTag::where('document_id', $id)->delete();
        DocumentHasRole::where('document_id', $id)->delete();
        DocumentHasUser::where('document_id', $id)->delete();


        Flash::success('Document deleted successfully.');

        return redirect(route('documents_manager.index'));
    }





    public function _assignToRoles($roles, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($roles as $key => $role_id) {
            $input_fields['role_id'] = $role_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;


            $this->documentHasRoleRepository->create($input_fields);


            /* try {
                Notification::send($department->users, new MemoAssignedToDepartment($department, $memo));
            } catch (\Throwable $th) {
            } */
        }
    }

    public function _assignToUsers($users, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;



            $this->documentHasUserRepository->create($input_fields);

            /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            } */
        }
    }

    public function _assignedToRoles($roles, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($roles as $key => $role_id) {
            $input_fields['role_id'] = $role_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            $document_has_role = DocumentHasRole::where('document_id', $document->id)->first();
            if ($document_has_role) {
                $document_has_role->assigned_by = $logged_in_user->id;
                $document_has_role->role_id =  $role_id;
                $document_has_role->save();
            }
            //$this->documentHasRoleRepository->create($input_fields);


            /* try {
                Notification::send($department->users, new MemoAssignedToDepartment($department, $memo));
            } catch (\Throwable $th) {
            } */
        }
    }

    public function _assignedToUsers($users, $document)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['document_id'] = $document->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            $document_has_user = DocumentHasUser::where('document_id', $document->id)->first();
            if ($document_has_user) {
                $document_has_user->assigned_by = $logged_in_user->id;
                $document_has_user->user_id =  $user_id;
                $document_has_user->save();
            }
            //$this->documentHasUserRepository->create($input_fields);

            /* try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            } */
        }
    }
}
