<?php

namespace Modules\DocumentManager\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Modules\Shared\Repositories\BranchRepository;
use Modules\Shared\Repositories\DepartmentRepository;
use Modules\DocumentManager\Repositories\FolderRepository;
use Modules\DocumentManager\Http\Requests\CreateFolderRequest;
use Modules\DocumentManager\Http\Requests\UpdateFolderRequest;

class FolderController extends AppBaseController
{
    /** @var FolderRepository $folderRepository*/
    private $folderRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    public function __construct(FolderRepository $folderRepo, BranchRepository $branchRepo, DepartmentRepository $departmentRepo)
    {
        $this->folderRepository = $folderRepo;
        $this->departmentRepository = $departmentRepo;
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the Folder.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!checkPermission('read folder')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        // Return all folders
        if (checkPermission(' read any filesr')) {
            $folders = $this->folderRepository->rootFolders()->paginate(10);
        }

        // Return folders in user's branch
        else if (checkPermission('read branch files')) {
            $folders = $this->folderRepository->rootFolders()->where('branch_id', $user->staff->branch_id)->paginate(10);
        }

        // Return folders in user's department
        else if (checkPermission('read department files')) {
            $folders = $this->folderRepository->rootFolders()->where('department_id', $user->staff->department_id)->paginate(10);
        }

        // Return folders created by user
        else {
            $folders = $this->folderRepository->rootFolders()->where('created_by', Auth::user()->id)->paginate(10);
        }



        return view('documentmanager::folders.index')
            ->with(['folders' => $folders]);
    }

    /**
     * Show the form for creating a new Folder.
     */
    public function create()
    {
        if (!checkPermission('create files')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $folders = $this->folderRepository->all()->pluck('name', 'id');
        $folders->prepend('Select parent folder', '');

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
        $departments->prepend('Select department', '');

        return view('documentmanager::folders.create')->with(['folders' => $folders, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Store a newly created Folder in storage.
     */
    public function store(CreateFolderRequest $request)
    {
        if (!checkPermission('create files')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $input = $request->all();
        $input['created_by'] = Auth::user()->id;


        if (empty($input['parent_folder_id'])) {

            $folder_count_by_name = $this->folderRepository->findByName($input['name'])->count();
            if ($folder_count_by_name > 0) {
                Flash::error('Name has been taken already');
                return redirect()->back();
            }

            if (empty($input['branch_id']) || empty($input['department_id'])) {
                Flash::error('Branch and department fields cannot be empty');
                return redirect()->back();
            }
        }

        if (!empty($input['parent_folder_id'])) {

            $parent_folder = $this->folderRepository->find($input['parent_folder_id']);
            if (empty($parent_folder)) {
                Flash::error('Parent Folder not found');

                return redirect()->back();
            }

            $folder_count_by_name_and_parent_id = $this->folderRepository->findByNameAndParentId($input['name'], $input['parent_folder_id'])->count();
            if ($folder_count_by_name_and_parent_id > 0) {
                Flash::error('Name has been taken already');
                return redirect()->back();
            }


            if (empty($input['branch_id']) || empty($input['department_id'])) {
                $input['branch_id'] = $parent_folder->branch->id;
                $input['department_id'] = $parent_folder->department->id;
            }
        }

        $folder = $this->folderRepository->create($input);

        Flash::success('Folder saved successfully.');

        if (isset($parent_folder)) {
            return redirect(route('folders.show', $parent_folder->id));
        }
        return redirect(route('folders.index'));
    }

    /**
     * Display the specified Folder.
     */
    public function show($id)
    {
        $user = Auth::user();
        if (!checkPermission('read folder')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $folder = $this->folderRepository->find($id);

        if ($folder->name == 'Memo' || $folder->name == 'Correspondence') {
            Flash::error('Not allowed from here');
            return redirect()->back();
        }

        $this->checkFolderPermissions($folder, 'read');


        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }
        $sub_folders = $folder->subFolders()->paginate(10);
        $documents = $folder->documents()->paginate(10);

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
        $departments->prepend('Select department', '');


        return view('documentmanager::folders.show')->with(['folder' => $folder, 'sub_folders' => $sub_folders, 'documents' => $documents, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Show the form for editing the specified Folder.
     */
    public function edit($id)
    {
        $user = Auth::user();
        if (!checkPermission('update files')) {
            Flash::error('Permission denied');

            return redirect(route('folders.index'));
        }

        $folder = $this->folderRepository->find($id);

        $this->checkFolderPermissions($folder, 'update');

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        $folders = $this->folderRepository->all()->pluck('name', 'id');
        $folders->prepend('Select parent folder', '');

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
        $departments->prepend('Select department', '');

        return view('documentmanager::folders.edit')->with(['folder' => $folder, 'folders' => $folders, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Show the form for editing the specified Sub Folder.
     */
    public function editSubFolder($id, $parent_folder_id)
    {
        $user = Auth::user();
        if (!checkPermission('update files')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $sub_folder = $this->folderRepository->find($id);
        $parent_folder = $this->folderRepository->find($parent_folder_id);

        $this->checkFolderPermissions($sub_folder, 'update');


        if (empty($parent_folder)) {
            Flash::error('Parent Folder not found');

            return redirect(route('folders.index'));
        }

        if (empty($sub_folder)) {
            Flash::error('Sub Folder not found');

            return redirect(route('folders.show', $parent_folder->id));
        }

        return view('documentmanager::folders.sub_folders.edit')->with(['sub_folder' => $sub_folder, 'parent_folder' => $parent_folder])->render();
    }

    /**
     * Update the specified Folder in storage.
     */
    public function update($id, UpdateFolderRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();
        if (!checkPermission('update files')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $folder = $this->folderRepository->find($id);

        if ($folder->name == 'Memo' || $folder->name == 'Correspondence') {
            Flash::error('Cannot edit memo or correspondence folders');
            return redirect()->back();
        }

        if ($folder->name != $input['name']) {

            if (empty($input['parent_folder_id'])) {

                $folder_count_by_name = $this->folderRepository->findByName($input['name'])->count();
                if ($folder_count_by_name > 0) {
                    Flash::error('Name has been taken already');
                    return redirect()->back();
                }

                if (empty($input['branch_id']) || empty($input['department_id'])) {
                    Flash::error('Branch and department fields cannot be empty');
                    return redirect()->back();
                }
            }

            if (!empty($input['parent_folder_id'])) {

                $parent_folder = $this->folderRepository->find($input['parent_folder_id']);
                if (empty($parent_folder)) {
                    Flash::error('Parent Folder not found');

                    return redirect()->back();
                }

                $folder_count_by_name_and_parent_id = $this->folderRepository->findByNameAndParentId($input['name'], $input['parent_folder_id'])->count();
                if ($folder_count_by_name_and_parent_id > 0) {
                    Flash::error('Name has been taken already');
                    return redirect()->back();
                }


                if (empty($input['branch_id']) || empty($input['department_id'])) {
                    $input['branch_id'] = $parent_folder->branch->id;
                    $input['department_id'] = $parent_folder->department->id;
                }
            }
        }

        $this->checkFolderPermissions($folder, 'update');

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        if (empty($input['branch_id']) && empty($input['branch_id']) && empty($input['parent_folder_id'])) {
            Flash::error('Parent folder and (branch and department) fields cannot be empty');
            return redirect()->back();
        }

        if (empty($input['branch_id']) && empty($input['branch_id']) && !empty($input['parent_folder_id'])) {
            $parent_folder = $this->folderRepository->find($input['parent_folder_id']);
            if (empty($parent_folder)) {
                Flash::error('Parent Folder not found');

                return redirect()->back();
            }

            $input['branch_id'] = $parent_folder->branch->id;
            $input['department_id'] = $parent_folder->department->id;
        }

        $folder = $this->folderRepository->update($input, $id);

        Flash::success('Folder updated successfully.');

        if (isset($parent_folder)) {
            return redirect(route('folders.show', $parent_folder->id));
        }
        return redirect(route('folders.index'));
    }

    /**
     * Remove the specified Folder from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if (!checkPermission('delete files')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $folder = $this->folderRepository->find($id);

        if ($folder->name == 'Memo' || $folder->name == 'Correspondence') {
            Flash::error('Cannot delete memo or correspondence folders');
            return redirect()->back();
        }

        $this->checkFolderPermissions($folder, 'delete');

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect()->back();
        }

        $this->folderRepository->delete($id);

        Flash::success('Folder deleted successfully.');

        return redirect()->back();
    }

    public function checkFolderPermissions($folder, $permission_type)
    {
        $user = Auth::user();
        // Check if user is the creator
        if ($folder->created_by == $user->id) {
            // Do nothing
        }

        // Check if user can view any folder
        else if (checkPermission("$permission_type any folder")) {
            // Do nothing
        }

        // Check if user can view any folder in branch it belongs to
        else if (checkPermission("$permission_type branch folder")) {
            // Check if folder belongs to branch
            if ($folder->branch_id != $user->staff->branch_id) {
                // Check if user can view any folder in department it belongs to
                if (checkPermission("$permission_type department folder")) {
                    // Check if folder belongs to department
                    if ($folder->department_id !=  $user->staff->department_id) {
                        Flash::error('Permission denied');

                        return redirect()->back();
                    }
                }
            }
        }
    }
}
