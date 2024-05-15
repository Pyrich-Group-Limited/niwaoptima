<?php

namespace Modules\DocumentManager\Http\Controllers;

use Flash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Notification;
use Modules\Shared\Repositories\DepartmentRepository;
use Modules\DocumentManager\Repositories\FolderRepository;
use Modules\DocumentManager\Repositories\DocumentRepository;
use Modules\DocumentManager\Notifications\CorrespondenceCreated;
use Modules\DocumentManager\Repositories\CorrespondenceRepository;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Modules\DocumentManager\Http\Requests\CreateCorrespondenceRequest;
use Modules\DocumentManager\Http\Requests\UpdateCorrespondenceRequest;
use Modules\DocumentManager\Notifications\CorrespondenceAssignedToUser;
use Modules\DocumentManager\Repositories\CorrespondenceHasUserRepository;
use Modules\DocumentManager\Notifications\CorrespondenceAssignedToDepartment;
use Modules\DocumentManager\Repositories\CorrespondenceHasDepartmentRepository;

class CorrespondenceController extends AppBaseController
{
    /** @var CorrespondenceRepository $correspondenceRepository*/
    private $correspondenceRepository;

    /** @var CorrespondenceHasDepartmentRepository $correspondenceHasDepartmentRepository*/
    private $correspondenceHasDepartmentRepository;

    /** @var CorrespondenceHasUserRepository $correspondenceHasUserRepository*/
    private $correspondenceHasUserRepository;

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

    public function __construct(CorrespondenceRepository $correspondenceRepo, CorrespondenceHasDepartmentRepository $correspondenceHasDepartmentRepo, CorrespondenceHasUserRepository $correspondenceHasUserRepo,  DocumentRepository $documentRepo, FolderRepository $folderRepo, DocumentVersionRepository $documentVersionRepo, UserRepository $userRepo, DepartmentRepository $departmentRepo)
    {
        $this->correspondenceRepository = $correspondenceRepo;
        $this->correspondenceRepository = $correspondenceRepo;
        $this->correspondenceHasDepartmentRepository = $correspondenceHasDepartmentRepo;
        $this->correspondenceHasUserRepository = $correspondenceHasUserRepo;
        $this->documentRepository = $documentRepo;
        $this->documentVersionRepository = $documentVersionRepo;
        $this->folderRepository = $folderRepo;
        $this->userRepository = $userRepo;
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Correspondence.
     */
    public function index(Request $request)
    {

        if (!checkPermission('read correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $correspondences = $this->correspondenceRepository->paginate(10);

        return view('documentmanager::correspondences.index')
            ->with('correspondences', $correspondences);
    }

    /**
     * Display a listing of the Memos assigned to a specific user.
     */
    public function viewCorrespondencesAssignedToUser()
    {
        $user = Auth::user();
        $correspondences_has_user = $this->correspondenceHasUserRepository->findByUser($user->id)->paginate(10);

        return view('documentmanager::correspondences.correspondences_assigned_to_user')
            ->with(['user' => $user, 'correspondences_has_user' => $correspondences_has_user]);
    }

    /**
     * Show the form for creating a new Correspondence.
     */
    public function create()
    {
        if (!checkPermission('create correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        return view('documentmanager::correspondences.create');
    }

    /**
     * Store a newly created Correspondence in storage.
     */
    public function store(CreateCorrespondenceRequest $request)
    {
        if (!checkPermission('create correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $user = Auth::user();
        $input = $request->all();

        $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents/";


        // Check if correspondence folder exists. Create if it does not exist
        $correspondence_folder = $this->folderRepository->findByName('Correspondence')->first();
        if (empty($correspondence_folder)) {
            $folder_input['name'] = 'Correspondence';
            $folder_input['description'] = "Correspondences";
            $folder_input['branch_id'] = $user->staff ? $user->staff->branch_id : 2;
            $folder_input['department_id'] = $user->staff ? $user->staff->department_id : 1;
            $folder_input['created_by'] = $user->id;

            $correspondence_folder = $this->folderRepository->create($folder_input);
        }

        // Check if document with title exist in the folder
        $document_count_by_title_and_folder_id = $this->documentRepository->findByTitleAndFolderId($input['subject'], $correspondence_folder->id)->count();
        if ($document_count_by_title_and_folder_id > 0) {
            Flash::error('Subject has been taken already');
            return redirect()->back();
        }

        // Prepare document input
        $document_input['folder_id'] = $correspondence_folder->id;
        $document_input['title'] = $input['subject'];
        $document_input['description'] = $input['description'];
        $document_input['created_by'] = $user->id;

        $path .= $correspondence_folder->name;


        $path_folder = public_path($path);

        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $input['subject']);

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

        $documentVersion = $this->documentVersionRepository->create($version_input);

        //End save document version

        // End file save

        $input['document_id'] = $document->id;

        $correspondence = $this->correspondenceRepository->create($input);

        try {
            // Get MD user
            $user = User::whereHas('role', function ($q) {
                $q->where('name', 'MD');
            })->first();
            // Send notification to MD user
            if (!empty($user)) {
                $user->notify(new CorrespondenceCreated($correspondence));
            }
        } catch (\Throwable $th) {
        }

        Flash::success('Correspondence saved successfully.');

        return redirect(route('correspondences.index'));
    }


    /**
     * assign correspondence to userss
     */

    public function assignToUsers(Request $request)
    {
        $logged_in_user = Auth::user();
        $input = $request->all();
        $correspondence_id = $input['correspondence_id'];
        $users = $input['users'];

        if (!checkPermission('assign correspondence to users')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($correspondence_id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        // assign to users
        $this->_assignToUsers($users, $correspondence);

        Flash::success('Correspondence assigned successfully to user(s).');

        return redirect(route('correspondences.index'));
    }

    /**
     * Assign correspondence to departments
     */

    public function assignToDepartments(Request $request)
    {
        $logged_in_user = Auth::user();
        $input = $request->all();
        $correspondence_id = $input['correspondence_id'];
        $departments = $input['departments'];

        if (!checkPermission('assign correspondence to department')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($correspondence_id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        // assign to departments
        $this->_assignToDepartments($departments, $correspondence);

        Flash::success('Correspondence assigned successfully to department(s).');

        return redirect(route('correspondences.index'));
    }

    /**
     * assign correspondence to userss
     */

    public function addComments(Request $request)
    {
        $logged_in_user = Auth::user();
        $input = $request->all();
        $correspondence_id = $input['correspondence_id'];
        $comments = $input['comments'];

        if (!checkPermission('add comment to correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($correspondence_id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        $correspondence = $this->correspondenceRepository->update($input, $correspondence_id);

        Flash::success('Comment added successfully.');

        return redirect(route('correspondences.index'));
    }

    /**
     * Display a listing of the assigned users to a Correspondence.
     */
    public function assignedUsers(Request $request, $id)
    {
        if (!checkPermission('read user-correspondence  memo Assigned')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        $assigned_users = $correspondence->assignedUsers()->paginate();

        return view('documentmanager::correspondences.assigned_users')
            ->with(['correspondence' => $correspondence, 'assigned_users' => $assigned_users]);
    }

    /**
     * Display a listing of the assigned departments to a Correspondence.
     */
    public function assignedDepartments(Request $request, $id)
    {
        if (!checkPermission('read department-correspondence memo Assigned')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        $assigned_departments = $correspondence->assignedDepartments()->paginate();

        return view('documentmanager::correspondences.assigned_departments')
            ->with(['correspondence' => $correspondence, 'assigned_departments' => $assigned_departments]);
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedUser($user_id, $correspondence_id)
    {
        if (!checkPermission('delete user-correspondence assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence_has_user = $this->correspondenceHasUserRepository->findByUserAndCorrespondence($user_id, $correspondence_id);

        if (empty($correspondence_has_user)) {
            Flash::error('Assignment not found');

            return redirect(route('correspondences.assignedUsers', $correspondence_id));
        }

        $this->correspondenceHasUserRepository->delete($correspondence_has_user->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('correspondences.assignedUsers', $correspondence_id));
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedDepartment($department_id, $correspondence_id)
    {
        if (!checkPermission('delete department-correspondence assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence_has_department = $this->correspondenceHasDepartmentRepository->findByDepartmentAndCorrespondence($department_id, $correspondence_id);

        if (empty($correspondence_has_department)) {
            Flash::error('Assignment not found');

            return redirect(route('correspondences.assignedDepartments', $correspondence_id));
        }

        $this->correspondenceHasDepartmentRepository->delete($correspondence_has_department->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('correspondences.assignedDepartments', $correspondence_id));
    }


    /**
     * Display a listing of the Correspondence Versions.
     */
    public function correspondenceVersions(Request $request, $id)
    {
        if (!checkPermission('read correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        $correspondence_document = $this->documentRepository->find($correspondence->document_id);

        if (empty($correspondence_document)) {
            Flash::error("Correspondence's document not found");

            return redirect(route('correspondences.index'));
        }

        $correspondenceVersions = $correspondence_document->documentVersions()->paginate(10);

        return view('documentmanager::correspondences.correspondence_versions.index')
            ->with(['correspondence' => $correspondence, 'correspondence_document' => $correspondence_document, 'documentVersions' => $correspondenceVersions]);
    }



    /**
     * Display the specified Correspondence.
     */
    public function show($id)
    {
        if (!checkPermission('read correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        return view('documentmanager::correspondences.show')->with('correspondence', $correspondence);
    }

    /**
     * Show the form for editing the specified Correspondence.
     */
    public function edit($id)
    {
        if (!checkPermission('update correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        return view('documentmanager::correspondences.edit')->with('correspondence', $correspondence);
    }

    /**
     * Update the specified Correspondence in storage.
     */
    public function update($id, UpdateCorrespondenceRequest $request)
    {
        if (!checkPermission('update correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $input = $request->all();
        $input['updated_by'] = Auth::user()->id;
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        // Get folder and its parents. Create if path does not exist
        $correspondence_folder = $this->folderRepository->findByName('Correspondence')->first();

        // Check if document with title exist in the folder
        if ($correspondence->subject != $input['subject']) {
            $document_count_by_title_and_folder_id = $this->documentRepository->findByTitleAndFolderId($input['subject'], $correspondence_folder->id)->count();
            if ($document_count_by_title_and_folder_id > 0) {
                Flash::error('Title has been taken already');
                return redirect()->back();
            }
        }

        $path = "documents/";

        $path .= $correspondence_folder->name;

        $path_folder = public_path($path);

        // Get document
        $document_id = $correspondence->document_id;
        $document = $this->documentRepository->find($document_id);

        if (empty($document)) {
            Flash::error("Correspondence's Document not found");

            return redirect(route('correspondences.index'));
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

        $document_input['title'] = $input['subject'];
        $document_input['description'] = $input['description'];

        $document = $this->documentRepository->update($document_input, $document_id);

        // Save document version

        $version_input['document_id'] = $document->id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = $new_count;
        $version_input['document_url'] = $document_url;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        $correspondence = $this->correspondenceRepository->update($input, $id);

        Flash::success('Correspondence updated successfully.');

        return redirect(route('correspondences.index'));
    }

    /**
     * Remove the specified Correspondence from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!checkPermission('delete correspondence')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            Flash::error('Correspondence not found');

            return redirect(route('correspondences.index'));
        }

        $this->correspondenceRepository->delete($id);

        Flash::success('Correspondence deleted successfully.');

        return redirect(route('correspondences.index'));
    }

    public function _assignToUsers($users, $correspondence)
    {
        $logged_in_user = Auth::user();
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['correspondence_id'] = $correspondence->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            // Check if user exists
            $user = $this->userRepository->find($user_id);
            if (empty($user)) {
                continue;
            }

            // Check if entry with user_id and correspondence_id exists
            $correspondence_has_user = $this->correspondenceHasUserRepository->findByUserAndCorrespondence($user_id, $correspondence->id);
            if (!empty($correspondence_has_user)) {
                continue;
            }

            $this->correspondenceHasUserRepository->create($input_fields);

            try {
                $user->notify(new CorrespondenceAssignedToUser($correspondence));
            } catch (\Throwable $th) {
            }
        }
    }

    public function _assignToDepartments($departments, $correspondence)
    {
        $logged_in_user = Auth::user();
        foreach ($departments as $key => $department_id) {
            $input_fields['department_id'] = $department_id;
            $input_fields['correspondence_id'] = $correspondence->id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            // Check if department exists
            $department = $this->departmentRepository->find($department_id);
            if (empty($department)) {
                continue;
            }

            // Check if entry with user_id and correspondence_id exists
            $correspondence_has_department = $this->correspondenceHasDepartmentRepository->findByDepartmentAndCorrespondence($department_id, $correspondence->id);
            if (!empty($correspondence_has_department)) {
                continue;
            }

            $this->correspondenceHasDepartmentRepository->create($input_fields);

            try {
                Notification::send($department->users, new CorrespondenceAssignedToDepartment($department, $correspondence));
            } catch (\Throwable $th) {
            }
        }
    }
}
