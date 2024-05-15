<?php

namespace Modules\UnitManager\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\UnitManager\Http\Requests\CreateUnitHeadRequest;
use Modules\UnitManager\Http\Requests\UpdateUnitHeadRequest;
use App\Http\Controllers\AppBaseController;
use Modules\UnitManager\Repositories\UnitRepository;
use Modules\UnitManager\Repositories\UnitHeadRepository;
use Flash;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Modules\Shared\Repositories\DepartmentRepository;


class UnitHeadController extends AppBaseController
{

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    /** @var UnitHeadRepository $unitheadRepository*/
    private $unitheadRepository;

    /** @var UnitRepository $unitRepository*/
    private $unitRepository;


    public function __construct(DepartmentRepository $departmentRepo, UnitHeadRepository $unitHeadRepo, UnitRepository $unitRepo)
    {
        $this->departmentRepository = $departmentRepo;
        $this->unitheadRepository = $unitHeadRepo;
        $this->unitRepository = $unitRepo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $unitheads = $this->unitheadRepository->paginate(10);

        return view('unitmanager::unithead.index')->with('unitheads', $unitheads);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        
        return view('unitmanager::unithead.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateUnitHeadRequest $request)
    {
        $input = $request->all();
        //$input['user_id'] = Auth::id();

        

        $unit = $this->unitheadRepository->create($input);

        Flash::success('Unit Head saved successfully.');

        return redirect(route('unithead.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $unithead = $this->unitheadRepository->find($id);
        
        if (empty($unit)) {
            Flash::error('Unit Head not found');

            return redirect(route('unithead.index'));
        }

        return view('unitmanager::unithead.show')->with('unithead', $unithead);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $unithead = $this->unitheadRepository->find($id);

        if (empty($unithead)) {
            Flash::error('Unit Head not found');

            return redirect(route('unithead.index'));
        }
        
        
        return view('unitmanager::unithead.edit')->with(['unithead' => $unithead]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateUnitHeadRequest $request)
    {
        $unithead = $this->unitheadRepository->find($id);

        if (empty($unithead)) {
            Flash::error('Unit Head not found');

            return redirect(route('unithead.index'));
        }

        $input = $request->all();

        //$input['user_id'] = Auth::id();

        $this->unitheadRepository->update($input, $id);

        Flash::success('Unit Head updated successfully.');

        return redirect(route('unithead.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $unithead = $this->unitheadRepository->find($id);

        if (empty($unithead)) {
            Flash::error('Unit Head not found');

            return redirect(route('unithead.index'));
        }

        $this->unitheadRepository->delete($id);

        Flash::success('unit head deleted successfully.');

        return redirect(route('unithead.index'));
    }
}
