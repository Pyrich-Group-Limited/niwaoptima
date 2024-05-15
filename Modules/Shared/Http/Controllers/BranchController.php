<?php

namespace Modules\Shared\Http\Controllers;

use Modules\Shared\Http\Requests\CreateBranchRequest;
use Modules\Shared\Http\Requests\UpdateBranchRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\UserRepository;
use Modules\Shared\Repositories\BranchRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Modules\Shared\Models\Branch;
use Modules\Shared\Repositories\DepartmentRepository;
use Modules\UnitManager\Repositories\RegionRepository;


class BranchController extends AppBaseController
{
    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    /** @var UserRepository $userRepository*/
    private $userRepository;

     /** @var RegionRepository $regionRepository*/
     private $regionRepository;

    public function __construct(RegionRepository $regionRepo, BranchRepository $branchRepo, DepartmentRepository $departmentRepo, UserRepository $userRepo)
    {
        $this->branchRepository = $branchRepo;
        $this->departmentRepository = $departmentRepo;
        $this->userRepository = $userRepo;
        $this->regionRepository = $regionRepo;
    }

    /**
     * Display a listing of the Branch.
     */
    public function index(Request $request)
    {
      
        $branches = Branch::with("region")->orderBy('branch_name', 'DESC');
        // $branches = $this->branchRepository->paginate(10);
        if ($request->filled('search')) {
            $branches->where('branch_name', 'like', '%' . $request->search . '%')
                ->orWhere('branch_region', 'like', '%' . $request->search . '%')
                ->orWhere('branch_code', 'like', '%' . $request->search . '%')
                ->orWhere('last_ecsnumber', 'like', '%' . $request->search . '%')
                ->orWhere('highest_rank', 'like', '%' . $request->search . '%')
                ->orWhere('staff_strength', 'like', '%' . $request->search . '%')
                ->orWhere('managing_id', 'like', '%' . $request->search . '%')
                ->orWhere('branch_email', 'like', '%' . $request->search . '%')
                ->orWhere('branch_phone', 'like', '%' . $request->search . '%')
                ->orWhere('branch_address', 'like', '%' . $request->search . '%');
        }

        $branches = $branches->paginate(10);
        return view('shared::branches.index')
            ->with('branches', $branches);
    }

    /**
     * Show the form for creating a new Branch.
     */
    public function create()
    {
        $users = $this->userRepository->all()->pluck('email', 'id');
        $users->prepend('Select user', '');
        $regions = $this->regionRepository->all()->pluck('name', 'id');
        $regions->prepend('Select region', '');
        return view('shared::branches.create')->with(['users'=> $users,'regions'=>$regions]);
    }

    /**
     * Store a newly created Branch in storage.
     */
    public function store(CreateBranchRequest $request)
    {
        $input = $request->all();

        $branch = $this->branchRepository->create($input);

        Flash::success('Branch saved successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Display the specified Branch.
     */
    public function show($id)
    {
        $branch = Branch::with("region")->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        return view('shared::branches.show')->with('branch', $branch);
    }

    /**
     * Show the form for editing the specified Branch.
     */
    public function edit($id)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $users = $this->userRepository->all()->pluck('email', 'id');
        $users->prepend('Select user', '');
        $regions = $this->regionRepository->all()->pluck('name', 'id');
        $regions->prepend('Select region', '');
        return view('shared::branches.edit')->with(['branch' => $branch, 'users' => $users, 'regions' => $regions]);
    }

    /**
     * Update the specified Branch in storage.
     */
    public function update($id, UpdateBranchRequest $request)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $branch = $this->branchRepository->update($request->all(), $id);

        Flash::success('Branch updated successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Remove the specified Branch from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $branch = $this->branchRepository->find($id);

        if (empty($branch)) {
            Flash::error('Branch not found');

            return redirect(route('branches.index'));
        }

        $this->branchRepository->delete($id);

        Flash::success('Branch deleted successfully.');

        return redirect(route('branches.index'));
    }

    /**
     * Get departments relating to a branch.
     */

    public function departments($branch_id)
    {
        $branch = $this->branchRepository->find($branch_id);

        if (empty($branch)) {
            return [];
        }

        $deparments = $this->departmentRepository->findByBranch($branch_id);

        return $deparments;

    }
}
