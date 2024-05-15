<?php

namespace Modules\DocumentManager\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use Modules\Shared\Repositories\DepartmentRepository;
use Modules\DocumentManager\Repositories\MemoRepository;
use Modules\DocumentManager\Repositories\FolderRepository;
use Modules\DocumentManager\Http\Requests\CreateMemoRequest;
use Modules\DocumentManager\Http\Requests\UpdateMemoRequest;
use Modules\DocumentManager\Repositories\DocumentRepository;
use Modules\DocumentManager\Notifications\MemoAssignedToUser;
use Modules\DocumentManager\Repositories\MemoHasUserRepository;
use Modules\DocumentManager\Notifications\MemoAssignedToDepartment;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Modules\DocumentManager\Repositories\MemoHasDepartmentRepository;
use Illuminate\Support\Facades\Storage;
use Modules\DocumentManager\Models\Memo;

class MemoController extends AppBaseController
{
    /** @var MemoRepository $memoRepository*/
    private $memoRepository;

    /** @var MemoHasDepartmentRepository $memoHasDepartmentRepository*/
    private $memoHasDepartmentRepository;

    /** @var MemoHasUserRepository $memoHasUserRepository*/
    private $memoHasUserRepository;

    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var DocumentVersionRepository $documentVersionRepository*/
    private $documentVersionRepository;

    /** @var FolderRepository $folderRepository*/
    private $folderRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;


    public function __construct(MemoRepository $memoRepo, MemoHasDepartmentRepository $memoHasDepartmentRepo, MemoHasUserRepository $memoHasUserRepo,  DocumentRepository $documentRepo, FolderRepository $folderRepo, DocumentVersionRepository $documentVersionRepo, UserRepository $userRepo, DepartmentRepository $departmentRepo)
    {
        $this->memoRepository = $memoRepo;
        $this->memoHasDepartmentRepository = $memoHasDepartmentRepo;
        $this->memoHasUserRepository = $memoHasUserRepo;
        $this->documentRepository = $documentRepo;
        $this->documentVersionRepository = $documentVersionRepo;
        $this->folderRepository = $folderRepo;
        $this->userRepository = $userRepo;
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Memo.
     */
    public function index(Request $request)
    {
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        /* $memos = $this->memoRepository->paginate(10); */
        $memos = $this->memoRepository->paginate(10);

        return view('documentmanager::memos.index')
            ->with('memos', $memos);
    }

    /**
     * Display a listing of the Memos assigned to a specific user.
     */
    public function viewMemosAssignedToUser()
    {
        $user = Auth::user();
        $memos_has_user = $this->memoHasUserRepository->findByUser($user->id)->paginate(10);

        return view('documentmanager::memos.memos_assigned_to_user')
            ->with(['user' => $user, 'memos_has_user' => $memos_has_user]);
    }

    /**
     * Show the form for creating a new Memo.
     */
    public function create()
    {
        if (!checkPermission('create memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
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
        return view('documentmanager::memos.create', compact(['departments','users']));
    }

    /**
     * Store a newly created Memo in storage.
     */
    public function store(CreateMemoRequest $request)
    {
       
        if (!checkPermission('create memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $user = Auth::user();
        $input = $request->all();
        $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents/";


        // Check if memo folder exists. Create if it does not exist
        $memo_folder = $this->folderRepository->findByName('Memo')->first();
        if (empty($memo_folder)) {
            $folder_input['name'] = 'Memo';
            $folder_input['description'] = "MD's Memos";
            $folder_input['branch_id'] = $user->staff ? $user->staff->branch_id : 2;
            $folder_input['department_id'] = $user->staff ? $user->staff->department_id : 1;
            $folder_input['created_by'] = $user->id;

            $memo_folder = $this->folderRepository->create($folder_input);
        }

        // Check if document with title exist in the folder
        $document_count_by_title_and_folder_id = $this->documentRepository->findByTitleAndFolderId($input['title'], $memo_folder->id)->count();
        if ($document_count_by_title_and_folder_id > 0) {
            Flash::error('Title has been taken already');
            return redirect()->back();
        }

        // Prepare document input
        $document_input = [];

        $document_input['folder_id'] = $memo_folder->id;
        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['created_by'] = $user->id;

        $path .= $memo_folder->name;


        //$file = $request->file('file');

    // Define the destination folder inside the S3 bucket
    
    // Generate a unique file name
    //$document_url = $path . "/" . $file;
    
    //$title = str_replace(' ', '', $input['title']);
    //$fileName = $title . 'v1' . rand() . '.' . $file->getClientOriginalExtension();

    // Upload the file to the S3 bucket
    //$documentUrl = Storage::disk('s3')->putFileAs($path, $file, $fileName);
        $path_folder = public_path($path);

        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $input['title']);

        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $document_url = $path . "/" . $file_name;

        $document_input['document_url'] = $document_url;

        $document = $this->documentRepository->create($document_input);

        // Save document version

        // Save document version

        $version_input['document_id'] = $document->id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = 1;
        $version_input['document_url'] = $document_url;
        // $version_input['document_url'] = $documentUrl;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        //End save document version

        // End file save

        $input['document_id'] = $document->id;

        $memo = $this->memoRepository->create($input);

        // Assign to department(s)
        $departments = $input['departments'];
        if ($departments != null) {
            $this->_assignToDepartments($departments, $memo);
        }
        // Assign to user(s)
        $users = $input['users'];
        if ($users != null) {
            $this->_assignToUsers($users, $memo);
        }

        Flash::success('Memo saved successfully.');

        return redirect(route('memos.index'));
    }

    /**
     * assign memo to userss
     */

    public function assignToUsers(Request $request)
    {
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $users = $input['users'];

        if (!checkPermission('assign memo to users')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($memo_id);

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

        if (!checkPermission('assign memo to department')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->_assignToDepartments($departments, $memo);

        Flash::success('Memo assigned successfully to department(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Display a listing of the assigned users to a Memo.
     */
    public function assignedUsers(Request $request, $id)
    {
        if (!checkPermission('read user memo  Assigned')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

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
        if (!checkPermission(' read department memo Assigned')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

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
        if (!checkPermission('delete user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
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
        if (!checkPermission('delete department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
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
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

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
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.show')->with('memo', $memo);
    }

    /**
     * Show the form for editing the specified Memo.
     */
    public function edit($id)
    {
        if (!checkPermission('update memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.edit')->with('memo', $memo);
    }

    /**
     * Update the specified Memo in storage.
     */
    public function update($id, UpdateMemoRequest $request)
    {
        if (!checkPermission('update memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $input = $request->all();
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        // Get folder and its parents. Create if path does not exist
        $memo_folder = $this->folderRepository->findByName('Memo')->first();

        // Check if document with title exist in the folder
        if ($memo->title != $input['title']) {
            $document_count_by_title_and_folder_id = $this->documentRepository->findByTitleAndFolderId($input['title'], $memo_folder->id)->count();
            if ($document_count_by_title_and_folder_id > 0) {
                Flash::error('Title has been taken already');
                return redirect()->back();
            }
        }

        $path = "documents/";

        $path .= $memo_folder->name;

        $path_folder = public_path($path);

        // Get document
        $document_id = $memo->document_id;
        $document = $this->documentRepository->find($document_id);

        if (empty($document)) {
            Flash::error("Memo's Document not found");

            return redirect(route('memos.index'));
        }

        // Get new version count
        $document_versions_count = $document->documentVersions()->withTrashed()->count();
        $new_count = $document_versions_count + 1;
        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $document->title);

        $file_name = $title . '_' . 'v' . $new_count . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $document_url = $path . "/" . $file_name;

        // Save document

        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];

        $document = $this->documentRepository->update($document_input, $document_id);

        // Save document version

        $version_input['document_id'] = $document->id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = $new_count;
        $version_input['document_url'] = $document_url;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        $memo = $this->memoRepository->update($input, $id);

        Flash::success('Memo updated successfully.');

        return redirect(route('memos.index'));
    }

    /**
     * Remove the specified Memo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!checkPermission('delete memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->memoRepository->delete($id);

        Flash::success('Memo deleted successfully.');

        return redirect(route('memos.index'));
    }


    public function _assignToDepartments($departments, $memo)
    {
        $logged_in_user = Auth::user();
        foreach ($departments as $key => $department_id) {
            $input_fields['department_id'] = $department_id;
            $input_fields['memo_id'] = $memo->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            // Check if department exists
            $department = $this->departmentRepository->find($department_id);
            if (empty($department)) {
                continue;
            }

            // Check if entry with user_id and memo_id exists
            $memo_has_department = $this->memoHasDepartmentRepository->findByDepartmentAndMemo($department_id, $memo->id);
            if (!empty($memo_has_department)) {
                continue;
            }

            $this->memoHasDepartmentRepository->create($input_fields);


            try {
                Notification::send($department->users, new MemoAssignedToDepartment($department, $memo));
            } catch (\Throwable $th) {
            }
        }
    }

    public function _assignToUsers($users, $memo)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['memo_id'] = $memo->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            // Check if user exists
            $user = $this->userRepository->find($user_id);
            if (empty($user)) {
                continue;
            }

            // Check if entry with user_id and memo_id exists
            $memo_has_user = $this->memoHasUserRepository->findByUserAndMemo($user_id, $memo->id);
            if (!empty($memo_has_user)) {
                continue;
            }

            $this->memoHasUserRepository->create($input_fields);

            try {
                $user->notify(new MemoAssignedToUser($memo));
            } catch (\Throwable $th) {
            }
        }
    }
}
