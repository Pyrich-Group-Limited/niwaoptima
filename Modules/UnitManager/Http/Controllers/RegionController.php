<?php

namespace Modules\UnitManager\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\UnitManager\Http\Requests\CreateUnitHeadRequest;
use Modules\UnitManager\Http\Requests\UpdateUnitHeadRequest;
use Modules\UnitManager\Http\Requests\CreateRegionRequest;
use Modules\UnitManager\Http\Requests\UpdateRegionRequest;
use App\Http\Controllers\AppBaseController;
use Modules\UnitManager\Repositories\UnitRepository;
use Modules\UnitManager\Repositories\UnitHeadRepository;
use Modules\UnitManager\Repositories\RegionRepository;
use Flash;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Modules\Shared\Repositories\DepartmentRepository;


class RegionController extends AppBaseController
{

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    /** @var UnitHeadRepository $unitheadRepository*/
    private $unitheadRepository;

    /** @var RegionRepository $regionRepository*/
    private $regionRepository;


    public function __construct(RegionRepository $regionRepo,DepartmentRepository $departmentRepo, UnitHeadRepository $unitHeadRepo, UnitRepository $unitRepo)
    {
        $this->departmentRepository = $departmentRepo;
        $this->unitheadRepository = $unitHeadRepo;
        $this->unitRepository = $unitRepo;
        $this->regionRepository = $regionRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $regions = $this->regionRepository->paginate(10);

        return view('unitmanager::region.index')->with('regions', $regions);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        return view('unitmanager::region.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateRegionRequest $request)
    {
        $input = $request->all();
        //$input['user_id'] = Auth::id();

        

        $unit = $this->regionRepository->create($input);

        Flash::success('Region saved successfully.');

        return redirect(route('region.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $region = $this->regionRepository->find($id);
        
        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('region.index'));
        }

        return view('unitmanager::region.show')->with('region', $region);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $region = $this->regionRepository->find($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('region.index'));
        }
        
        
        return view('unitmanager::region.edit')->with(['region' => $region]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateRegionRequest $request)
    {
        $region = $this->regionRepository->find($id);

        if (empty($region)) {
            Flash::error('region not found');

            return redirect(route('region.index'));
        }

        $input = $request->all();

        //$input['user_id'] = Auth::id();

        $this->regionRepository->update($input, $id);

        Flash::success('Region updated successfully.');

        return redirect(route('region.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $region = $this->regionRepository->find($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('region.index'));
        }

        $this->regionRepository->delete($id);

        Flash::success('Region deleted successfully.');

        return redirect(route('region.index'));
    }
}
