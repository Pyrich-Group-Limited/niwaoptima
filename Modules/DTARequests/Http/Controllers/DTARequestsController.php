<?php

namespace Modules\DTARequests\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StaffRepository;
use Modules\UnitManager\Models\UnitHead;
use Modules\Shared\Models\DepartmentHead;
use App\Http\Controllers\AppBaseController;
use Modules\DTARequests\Models\DTARequests;
use Illuminate\Contracts\Support\Renderable;
use Modules\Shared\Repositories\BranchRepository;
use Modules\DTARequests\Http\Requests\CreateDTARequests;
use Modules\DTARequests\Http\Requests\UpdateDTARequests;
use Modules\UnitManager\Repositories\UnitHeadRepository;
use Modules\DTARequests\Repositories\DTAReviewRepository;
use Modules\DTARequests\Repositories\DTARequestsRepository;
use Illuminate\Support\Facades\Notification;
use Modules\DTARequests\Notifications\UnitHeadNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Approval\Models\Request as ModelsRequest;
use Modules\WorkflowEngine\Models\Staff;



class DTARequestsController extends AppBaseController
{

    /** @var DTARequestsRepository $dtaRequestsRepository*/
    private $dtaRequestsRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var DTAReviewRepository $dtaReviewRepository*/
    private $dtaReviewRepository;

    /** @var StaffRepository $staffRepository*/
    private $staffRepository;

    /** @var UnitHeadRepository $unitHeadRepository*/
    private $unitHeadRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo, UnitHeadRepository $unitHeadRepo, DTARequestsRepository $dtaRequestsRepo, BranchRepository $branchRepo, DTAReviewRepository $dtaReviewRepo, StaffRepository $staffRepo)
    {
        $this->dtaRequestsRepository = $dtaRequestsRepo;
        $this->branchRepository = $branchRepo;
        $this->dtaReviewRepository = $dtaReviewRepo;
        $this->staffRepository = $staffRepo;
        $this->unitHeadRepository = $unitHeadRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $department = $this->staffRepository->getByUserId($user_id);
        $department_id = isset($department->department_id) ? $department->department_id : "";
        $unit_head_id = $this->dtaRequestsRepository->isUnitHeadInSameDepartment($user_id, $department_id);


        $s_branchId = Auth()->user()->staff->branch_id;
        $unit_head_data = UnitHead::with('user')->where('user_id', $user_id)->first();
        $department_head_data = DepartmentHead::with('user')->where('user_id', $user_id)->first();
        $department_head_data1 = !empty($department_head_data->user_id) ? $department_head_data->user_id : 0;
        $dtarequests1 = $this->dtaRequestsRepository->getByUserId($user_id);

        if (!empty($dtarequests1)) {
            # code...
            $dtarequests = $this->dtaRequestsRepository->getByUserId($user_id);
            //$dtarequests = $this->dtaRequestsRepository->paginate(10);
            $id ="1";
        } else {
            # code...

            $id ="2";
            //$dtarequests = $this->dtaRequestsRepository->getByUnitHeadId($unit_head_id);
            $dtarequests = $this->dtaRequestsRepository->getByBranchId($s_branchId);
            //$dtarequests = $this->dtaRequestsRepository->paginate(10);
        }
        //$dtarequests = $this->dtaRequestsRepository->paginate(10);
        // echo  "exh-0n ".$id." //";
        return view('dtarequests::dtarequests.index')->with(['department_head_data' => $department_head_data, 'dtarequests' => $dtarequests, 'unit_head_data' => $unit_head_data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user_id = Auth::id();

        $department = $this->staffRepository->getByUserId($user_id);
        if (!$department) {
            Flash::error('Admin can not add new DTA Request. DTA request should be added by a staff only');
            return redirect(route('dtarequests.index'));
        } else {

            $department_id = $department->department_id;

            $unit_head_id = $this->dtaRequestsRepository->isUnitHeadInSameDepartment($user_id, $department_id);
            if (!$unit_head_id) {
                Flash::error("You can not add new dta request because you don'\t have a unit head in your department. Contact administrator for assistance.");
                return redirect(route('dtarequests.index'));
            }

            $unit_head_department = $this->staffRepository->getByUserId($unit_head_id);
            $unit_head_department_id = $unit_head_department->department_id;


            if ($unit_head_department_id == $department_id) {
                # code...
                $unit_head_data = UnitHead::with('user')->where('user_id', $user_id)->first();
                $department_head_data = DepartmentHead::with('user')->where('user_id', $user_id)->first();

                $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
                $branches->prepend('Select branch', '');
                return view('dtarequests::dtarequests.create')->with(['department_head_data' => $department_head_data, 'branches' => $branches, 'unit_head_data' => $unit_head_data]);
            } else {
                # code...
                Flash::error('You can not create a DTA request because there is no unit head in your department.');
                return redirect(route('dtarequests.index'));
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */

    public function store(CreateDTARequests $request)
    {
        $input = $request->all();
        $uid = Auth::id();
        $staff = Staff::where('user_id', $uid)->first();
        $staff_id = $this->staffRepository->getByUserId($uid);
        if (!$staff_id) {
            Flash::error('Admin can not add new DTA Request. DTA request should be added by a staff only');
            return redirect(route('dtarequests.index'));
        } else {
            try {
            $department = $this->staffRepository->getByUserId($uid);
            $department_id = $department->department_id;
            $unit_head_id = $this->dtaRequestsRepository->isUnitHeadInSameDepartment($uid, $department_id);

            $input['staff_id'] = isset($staff_id) ? $staff_id->id : 0;
            $input['user_id'] = $uid;
            $input['unit_head_id'] = $unit_head_id;
            $input['hod_status'] = 0;
            $input['supervisor_status'] = 0;
            $input['md_status'] = 0;
            $input['approval_status'] = 0;
            $s_branchId = intval(session('branch_id'));
            $input['branch_id'] = $staff->branch_id;
            $s_depId = $staff->department_id;
            $input['department_id'] = $s_depId;

            if ($request->hasFile('uploaded_doc')) {
                $file = $request->file('uploaded_doc');
                $fileName = $file->hashName();
                $path = $file->store('public');
                $input['uploaded_doc'] = $fileName;
            }

            $dtarequests = $this->dtaRequestsRepository->create($input);

            $unitHeadUser = $this->dtaRequestsRepository->getUnitHeadInfo($uid, $department_id);


            if ($unitHeadUser) {
                $user = $unitHeadUser->user;

                // Assuming User model has a method to send email notifications
                //$user->sendUnitHeadNotification();
              // $user->notify(new UnitHeadNotification($user));
            }


            Flash::success('DTA Requests saved successfully.');

            //INITIATE APPROVAL FLOW || ALSO FOR UPDATING create|update
            $approval_request = $dtarequests->request()->create([
                'staff_id' => $staff_id->id,
                'type_id' => 3,//for dta requests
                'order' => 1,//order/step of the flow
                'next_step' => 1,
                'action_id' => 1,//action taken id 1= create
            ]);
            ModelsRequest::where('id', $approval_request->id)->update([
                'next_step' => 1,
                // Add other columns and their values as needed
            ]);

            return redirect(route('dtarequests.index'));
        } catch (ModelNotFoundException $e) {
            Flash::error('Request not successful. ' .$e);

            return redirect(route('dtarequests.index'));
        }
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // Explicitly cast $id to an integer
    //$id = (int)$id;
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }

        return view('dtarequests::dtarequests.show')->with('dtarequests', $dtarequests);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }

        $user_id = Auth::id();
        $unit_head_data = UnitHead::with('user')->where('user_id', $user_id)->first();
        $department_head_data = DepartmentHead::with('user')->where('user_id', $user_id)->first();

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');
        return view('dtarequests::dtarequests.edit')->with(['department_head_data' => $department_head_data, 'unit_head_data' => $unit_head_data, 'dtarequests' => $dtarequests, 'branches' => $branches]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateDTARequests $request)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }

        $input = $request->all();

        //$staff_id = $this->dtaRequestsRepository->find($id);
        $user_id = Auth::id();
        $staff = Staff::where('user_id', $user_id)->first();
        $input['staff_id'] = $user_id;

        if ($request->hasFile('uploaded_doc')) {
            $file = $request->file('uploaded_doc');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['uploaded_doc'] = $fileName;
        } else {
            // prevent images from updating db since there is no upload
            unset($input['uploaded_doc']);
        }

        $dtarequests1 = $this->dtaRequestsRepository->update($input, $id);

        $staff = $this->staffRepository->getByUserId($user_id);

        $input_r = null;
        $input_r['staff_id'] = isset($staff->id) ? $staff->id : 0;
        $input_r['user_id'] = $user_id;
        $input_r['dtarequest_id'] = $id;
        $input_r['dta_id'] = $id;
        $input_r['comments'] = $request->input('comments');
        $input_r['review_status'] = $request->input('approval_status');
        $input_r['created_at'] = now();
        $input_r['updated_at'] = now();
        $s_branchId = intval(session('branch_id'));
            $input_r['branch_id'] = $staff->branch_id;
            $s_depId = intval(session('department_id'));
            $input_r['department_id'] = $staff->department_id;
        $this->dtaReviewRepository->create($input_r);

        Flash::success('DTA Requests updated successfully.');

        return redirect(route('dtarequests.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $dtarequests = $this->dtaRequestsRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('DTA Requests not found');

            return redirect(route('dtarequests.index'));
        }

        $this->dtaRequestsRepository->delete($id);

        Flash::success('DTA Requests deleted successfully.');

        return redirect(route('dtarequests.index'));
    }
}
