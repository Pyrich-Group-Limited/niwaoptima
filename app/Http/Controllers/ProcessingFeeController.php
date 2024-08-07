<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcessingFeeRequest;
use App\Http\Requests\UpdateProcessingFeeRequest;
use App\Models\ProcessingType;
use App\Models\ProcessingFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;

class ProcessingFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProcessingFee::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('amount', 'like', "%$search%")
                  ->orWhereHas('service', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                });
            });
        }
    
        
    
        $processing_fees = $query->orderBy('id', 'asc')->paginate(10);

        return view('processing_fee.index', compact('processing_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $branches = Branch::all();
        $services = Service::where('status', 1)->where('branch_id', 1)->get();
        $processing_types = ProcessingType::where('branch_id', 1)->get();
        return view('processing_fee.create', compact(['services', 'processing_types', 'branches']));
    }

    public function getProcessingTypes(Request $request, ProcessingType $processingType, $id)
{
    $processingTypes = $processingType->where('service_id', $request->input('service_id'))->get();
    //$processingTypes = $service->processingTypes()->get();
    return response()->json($processingTypes);
}

public function getServices(Request $request, Service $service, $id)
{
    $services = $service->where('branch_id', $id)->get();
    return response()->json($services);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProcessingFeeRequest $request)
    {
        $validated = $request->validated();
        $check = ProcessingFee::where('processing_type_id', $request->input('processing_type_id'))->where('amount', $request->input('amount'))->first();
        if($check){
            return redirect()->route('processing_fee.create')->with('error', 'Processing fee already exist in this area office and processing type!');
        }
        ProcessingFee::create($validated);
        return redirect()->route('processing_fee.index')->with('success', 'Processing fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(ProcessingFee $processing_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessingFee $processing_fee)
    {
        $branches = Branch::all();
        $services = Service::where('status', 1)->where('branch_id', 1)->get();
        $processing_types = ProcessingType::where('branch_id', 1)->get();
        return view('processing_fee.edit', compact(['processing_fee', 'services', 'processing_types', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcessingFeeRequest $request, ProcessingFee $processing_fee)
    {
        $validated = $request->validated();
        $processing_fee->update($validated);
        return redirect()->route('processing_fee.index')->with('success', 'Processing fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessingFee $processing_fee)
    {
        if ($processing_fee->delete())
            return redirect()->back()->with('success', 'Processing fee deleted successfully!');
        return redirect()->back()->with('error', 'Processing fee could not be deleted!');
    }

    public function deleteSelectedItems(Request $request)
    {
        // Handle deletion of selected items here
        $selectedIds = $request->input('selectedIds');
        
        // Perform deletion logic using the selected IDs
        try {
            DB::beginTransaction();
            foreach ($selectedIds as $id) {
                $application_form_fee = ProcessingFee::find($id);
                if ($application_form_fee) {
                    $application_form_fee->delete();
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Processing fees deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting processing fees.', 'error' => $e->getMessage()]);
        }
    }

    
}
