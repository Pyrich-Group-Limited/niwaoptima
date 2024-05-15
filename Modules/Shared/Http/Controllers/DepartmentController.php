<?php

namespace Modules\Shared\Http\Controllers;

use Modules\Shared\Http\Requests\CreateDepartmentRequest;
use Modules\Shared\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\AppBaseController;
use Modules\Shared\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Shared\Repositories\BranchRepository;
use App\Repositories\UserRepository;
use Modules\Shared\Repositories\DepartmentHeadRepository;
use Modules\Shared\Models\Department;


class DepartmentController extends AppBaseController
{
    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var UserRepository $userRepository*/
    private $userRepository;

    /** @var DepartmentHeadRepository $departmentHeadRepository*/
    private $departmentHeadRepository;

    public function __construct(DepartmentHeadRepository $departmentHeadRepo, UserRepository $userRepo, DepartmentRepository $departmentRepo, BranchRepository $branchRepo)
    {
        $this->departmentRepository = $departmentRepo;
        $this->branchRepository = $branchRepo;
        $this->userRepository = $userRepo;
        $this->departmentHeadRepository = $departmentHeadRepo;
    }

    /**
     * Display a listing of the Department.
     */
    public function index(Request $request)
    {
        $departments = $this->departmentRepository->paginate(10);

        return view('shared::departments.index')
            ->with('departments', $departments);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('term');

        $departments = Department::where('name', 'like', '%' . $searchTerm . '%')
            ->get(['id', 'name']);

        return response()->json($departments);
    }

    /**
     * Show the form for creating a new Department.
     */
    public function create()
    {
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        $users = $this->userRepository->all()->pluck("first_name","id");
        $users->prepend('Select Users', '');
        return view('shared::departments.create')->with(['users'=> $users,'branches'=> $branches]);
    }

    /**
     * Store a newly created Department in storage.
     */
    public function store(CreateDepartmentRequest $request)
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        $department_head_id = $request->input("user_id");
        if (empty($department_head_id)) {
            $errorMessage ="Please select a department head";
            return redirect(route('departments.create'))->withErrors([$errorMessage]);
        }

        if (!empty($department_head_id)) {
        $input['department_id'] = $department->id;
        $input['user_id'] = $department_head_id;

        $this->departmentHeadRepository->create($input);
        }

        Flash::success('Department saved successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Display the specified Department.
     */
    public function show($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        return view('shared::departments.show')->with('department', $department);
    }

    /**
     * Show the form for editing the specified Department.
     */
    public function edit($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $users = $this->userRepository->all()->pluck("first_name","id");
        $users->prepend('Select Users', '');
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('shared::departments.edit')->with(['users' => $users,'department' => $department, 'branches' => $branches]);
    }

    /**
     * Update the specified Department in storage.
     */
    public function update($id, UpdateDepartmentRequest $request)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $department = $this->departmentRepository->update($request->all(), $id);

        $department_head_id = $request->input("user_id");

        $input['department_id'] = $id;
        $input['user_id'] = $department_head_id;

        $department_id = $this->departmentHeadRepository->findByDepartmentId($id);
        
        if (!empty($department_id)) {
            $this->departmentHeadRepository->update($input, $department_id->department_id);
        }
        if (empty($department_id)) {
            $this->departmentHeadRepository->create($input);
        }

        


        Flash::success('Department updated successfully.');

        return redirect(route('departments.index'));
    }

    /**
     * Remove the specified Department from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            Flash::error('Department not found');

            return redirect(route('departments.index'));
        }

        $this->departmentRepository->delete($id);

        Flash::success('Department deleted successfully.');

        return redirect(route('departments.index'));
    }
}
