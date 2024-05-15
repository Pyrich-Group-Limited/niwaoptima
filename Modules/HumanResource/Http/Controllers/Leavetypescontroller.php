<?php

namespace Modules\HumanResource\Http\Controllers;

use LeaveType;
//use leavetype;
use Laracasts\Flash\Flash;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


// use Modules\HumanResource\Models\LeaveType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StaffRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Support\Renderable;
use Modules\Shared\Repositories\BranchRepository;

use Modules\HumanResource\Http\Requests\CreateLeavetype;

// use Modules\HumanResource\Http\Requests\Updateleavetypes;
use Modules\HumanResource\Http\Requests\UpdateLeavetype;
use Modules\HumanResource\Repositories\LeavetypeRepository;
//use Modules\Leaves\Http\Requests\UpdateleavesRequest;

// use Modules\HumanResource\Http\Requests\leavetype;


class Leavetypescontroller extends  AppBaseController
{

    /** @var LeavetypesController $leavetype*/
    private $leavetypesRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;


   
    

/** @var StaffRepository $staffRepository*/
private $staffRepository;

public function __construct(LeavetypeRepository $leavetypeRepo, BranchRepository $branchRepo, StaffRepository $staffRepo)
    {
        $this->leavetypesRepository = $leavetypeRepo;
        $this->branchRepository = $branchRepo;
        $this->staffRepository = $staffRepo;
    }
public function getDuration(){

    // $duration = LeaveType::select('id','name','duration')->get();
    // $duration= $this->leavetypesRepository->all()->pluck('name','id');
    $duration= DB::table('LeaveType') 
                  ->select('id','name','duration')->get();
                //   return $duration;
                return response()->json($duration);

    
    

    // return response()->json(['duration'=>$duration]);
}

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()

    {
        $leavetype =$this->leavetypesRepository->paginate(10);
        return view('humanresource::LeaveTypes.index',compact('leavetype'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //$duration= $this->leavetypesRepository->all()->pluck('id','name');
        // return view('humanresource::LeaveTypes.create')->with('duration');
        return view('humanresource::LeaveTypes.create');
       
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateleaveType $request)
    {
//dd($request->all());
        $input=$request->all();
       // $uid=Auth::id();

      

         $this->leavetypesRepository->create($input);
        

        Flash::success('Leave TYPE ADDED successfully.');

        return redirect(route('leave_type.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)

    {
        $leavetype = $this->leavetypesRepository->find($id);
        
        if (empty($leavetype)) {
            Flash::error('Leave Types not found');

            return redirect(route('leave_type.index'));
        }




        return view('humanresource::LeaveTypes.show')->with('leavetype',$leavetype);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $leavetype= $this->leavetypesRepository->find($id);
        if (empty($leavetype)) {
            Flash::error('Leave Type not found');

            return redirect(route('leave_type.index'));
        }
        
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');



        return view('humanresource::LeaveTypes.edit')->with(['LeaveType' => $leavetype, 'branches' => $branches]);;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateLeavetype $request)
    {
        $leavetype = $this->leavetypesRepository->find($id);

        if (empty($leavetype)) {
            Flash::error('leave request not found');

            return redirect(route('leave_request.index'));
        }

        $input = $request->all();

        // $input['staff_id'] = Auth::id();
        



        $leavetype = $this->leavetypesRepository->update($input, $id);

        
        Flash::success('LEAVE Type Updated successfully .');

        return redirect(route('leave_type.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $leavetype = $this->leavetypesRepository->find($id);

        if (empty($leavetype)) {
            Flash::error('LEAVE type not found');

            return redirect(route('leave_type.index'));
        }

        $this->leavetypesRepository->delete($id);

        Flash::success('LEAVE REQUEST DISCARDED SUCCESSFULLY.');

        return redirect(route('leave_type.index'));
    }
}







