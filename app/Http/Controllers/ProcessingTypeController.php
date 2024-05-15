<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcessingTypeRequest;
use App\Http\Requests\UpdateProcessingTypeRequest;
use App\Models\ProcessingType;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;

class ProcessingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ProcessingType::query()->with('service', 'branch'); // Load related models

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhereHas('service', function ($q) use ($search) {
                      $q->where('name', 'like', "%$search%");
                  });
            });
        }
    
    
        $processing_types = $query->orderBy('id', 'asc')->paginate(10);

        return view('processing_type.index', compact('processing_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $services = Service::where('branch_id', 1)->get();
        return view('processing_type.create', compact(['services', 'branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProcessingTypeRequest $request)
    {
        $validated = $request->validated();
        $check = ProcessingType::where('name', $request->input('name'))->where('service_id', $request->input('service_id'))->first();
        if($check){
            return redirect()->route('processing_type.create')->with('error', 'Processing type already exist in this area office!');
        }
        ProcessingType::create($validated);
        return redirect()->route('processing_type.index')->with('success', 'Processing type added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(ProcessingType $processing_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcessingType $processing_type)
    {
        $branches = Branch::all();
        $services = Service::where('branch_id', 1)->get();
        return view('processing_type.edit', compact(['processing_type', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcessingTypeRequest $request, ProcessingType $processing_type)
    {
        $validated = $request->validated();
        $processing_type->update($validated);
        return redirect()->route('processing_type.index')->with('success', 'Processing type udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcessingType $processing_type)
    {
        if ($processing_type->delete())
            return redirect()->back()->with('success', 'Processing type deleted successfully!');
        return redirect()->back()->with('error', 'Processing type could not be deleted!');
    }

    public function deleteSelectedItems(Request $request)
    {
        // Handle deletion of selected items here
        $selectedIds = $request->input('selectedIds');
        
        // Perform deletion logic using the selected IDs
        try {
            DB::beginTransaction();
            foreach ($selectedIds as $id) {
                $application_form_fee = ProcessingType::find($id);
                if ($application_form_fee) {
                    $application_form_fee->delete();
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Processing types deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting processing types.', 'error' => $e->getMessage()]);
        }
    }
    
}
