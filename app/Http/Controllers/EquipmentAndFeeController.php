<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EquipmentAndFeeRepository;
use App\Http\Requests\CreateEquipmentAndFeeRequest;
use App\Http\Requests\UpdateEquipmentAndFeeRequest;
use App\Models\SubService;
use Modules\Shared\Models\Branch;
use App\Models\EquipmentAndFee;

class EquipmentAndFeeController extends AppBaseController
{
    /** @var EquipmentAndFeeRepository $equipmentAndFeeRepository*/
    private $equipmentAndFeeRepository;

    public function __construct(EquipmentAndFeeRepository $equipmentAndFeeRepo)
    {
        $this->equipmentAndFeeRepository = $equipmentAndFeeRepo;
    }

    /**
     * Display a listing of the EquipmentAndFee.
     */
    public function index(Request $request)
    {
        $equipmentAndFees = EquipmentAndFee::orderBy('id', 'desc')->get();

        return view('equipment_and_fees.index')
            ->with('equipmentAndFees', $equipmentAndFees);
    }

    /**
     * Show the form for creating a new EquipmentAndFee.
     */
    public function create()
    {

        $branches = Branch::all();
            $services = Service::all();
           $sub_services = SubService::pluck('name', 'id');
        return view('equipment_and_fees.create', compact('services', 'sub_services', 'branches'));
    }

    public function getSubServiceTypes(SubService $subService, $id)
    {
        $subServices = $subService->where('service_id', $id)->get();
        return response()->json($subServices);
    }

    /**
     * Store a newly created EquipmentAndFee in storage.
     */
    public function store(CreateEquipmentAndFeeRequest $request)
    {
        $input = $request->all();

        $check = EquipmentAndFee::where('name', $request->input('name'))->where('processing_type_id', $request->input('processing_type_id'))->first();
        if($check){
            return redirect()->route('equipmentAndFees.create')->with('error', 'Equipment And Fee name already exist in this processing type!');
        }

        $equipmentAndFee = $this->equipmentAndFeeRepository->create($input);

        Flash::success('Equipment And Fee saved successfully.');

        return redirect(route('equipmentAndFees.index'));
    }

    /**
     * Display the specified EquipmentAndFee.
     */
    public function show($id)
    {
        $equipmentAndFee = $this->equipmentAndFeeRepository->find($id);

        if (empty($equipmentAndFee)) {
            Flash::error('Equipment And Fee not found');

            return redirect(route('equipmentAndFees.index'));
        }

        return view('equipment_and_fees.show')->with('equipmentAndFee', $equipmentAndFee);
    }

    /**
     * Show the form for editing the specified EquipmentAndFee.
     */
    public function edit($id)
    {
        $equipmentAndFee = $this->equipmentAndFeeRepository->find($id);

        if (empty($equipmentAndFee)) {
            Flash::error('Equipment And Fee not found');

            return redirect(route('equipmentAndFees.index'));
        }

        $branches = Branch::all();
            $services = Service::all();
            //$services->prepend('Select Service','');
            $sub_services = SubService::pluck('name', 'id');

        return view('equipment_and_fees.edit', compact('services', 'sub_services', 'branches'))->with('equipmentAndFee', $equipmentAndFee);
    }

    /**
     * Update the specified EquipmentAndFee in storage.
     */
    public function update($id, UpdateEquipmentAndFeeRequest $request)
    {
        $equipmentAndFee = $this->equipmentAndFeeRepository->find($id);

        if (empty($equipmentAndFee)) {
            Flash::error('Equipment And Fee not found');

            return redirect(route('equipmentAndFees.index'));
        }

        $equipmentAndFee = $this->equipmentAndFeeRepository->update($request->all(), $id);

        Flash::success('Equipment And Fee updated successfully.');

        return redirect(route('equipmentAndFees.index'));
    }

    /**
     * Remove the specified EquipmentAndFee from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipmentAndFee = $this->equipmentAndFeeRepository->find($id);

        if (empty($equipmentAndFee)) {
            Flash::error('Equipment And Fee not found');

            return redirect(route('equipmentAndFees.index'));
        }

        $this->equipmentAndFeeRepository->delete($id);

        Flash::success('Equipment And Fee deleted successfully.');

        return redirect(route('equipmentAndFees.index'));
    }
}
