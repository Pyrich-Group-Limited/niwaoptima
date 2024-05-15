<?php

namespace Modules\HumanResource\Http\Controllers;

use Ranking;

use Laracasts\Flash\Flash;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StaffRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Support\Renderable;
use Modules\Shared\Repositories\BranchRepository;

use Modules\HumanResource\Http\Requests\CreateRanking;


use Modules\HumanResource\Http\Requests\UpdateRanking;
use Modules\HumanResource\Repositories\RankingRepository;



class RankingController extends  AppBaseController
{

    /** @var RankingController $ranking*/
    private $rankingRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;


   
    

/** @var StaffRepository $staffRepository*/
private $staffRepository;

public function __construct(RankingRepository $rankingRepo, BranchRepository $branchRepo, StaffRepository $staffRepo)
    {
        $this->rankingRepository = $rankingRepo;
        $this->branchRepository = $branchRepo;
        $this->staffRepository = $staffRepo;
    }



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()

    {
        $rank =$this->rankingRepository->paginate(10);
        return view('humanresource::ranking.index',compact('rank'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
       
        return view('humanresource::ranking.create');
       
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Createranking $request)
    {

        $input=$request->all();
      

      

         $this->rankingRepository->create($input);
        

        Flash::success('Rank added to the Ranking Structure.');

        return redirect(route('ranking.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)

    {
        $rank = $this->rankingRepository->find($id);
        
        if (empty($rank)) {
            Flash::error('The Rank is not Found Among the Structure');

            return redirect(route('ranking.index'));
        }




        return view('humanresource::ranking.show')->with('rank',$rank);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $rank= $this->rankingRepository->find($id);
        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('ranking.index'));
        }
        
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');



        return view('humanresource::ranking.edit')->with(['rank' => $rank, 'branches' => $branches]);;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateRanking $request)
    {
        $rank = $this->rankingRepository->find($id);

        if (empty($rank)) {
            Flash::error('rank can not be updated');

            return redirect(route('ranking.index'));
        }

        $input = $request->all();

        
        



        $rank = $this->rankingRepository->update($input, $id);

        
        Flash::success('Rank Updated successfully .');

        return redirect(route('ranking.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $rank = $this->rankingRepository->find($id);

        if (empty($rank)) {
            Flash::error('rank can not be updated');

            return redirect(route('ranking.index'));
        }

        $this->rankingRepository->delete($id);

        Flash::success('Rank Type DISCARDED SUCCESSFULLY.');

        return redirect(route('ranking.index'));
    }
}







