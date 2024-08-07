<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonitoringFeeRequest;
use App\Http\Requests\UpdateMonitoringFeeRequest;
use App\Models\MonitoringFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;

class MonitoringFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = MonitoringFee::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('amount', 'like', "%$search%")
                  ->orWhereHas('service', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                });
            });
        }
    
    
        $monitoring_fees = $query->orderBy('id', 'asc')->paginate(10);

        return view('monitoring_fee.index', compact('monitoring_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $services = Service::where('status', 1)->where('branch_id', 1)->get();
        return view('monitoring_fee.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMonitoringFeeRequest $request)
    {
        $validated = $request->validated();
        $check = MonitoringFee::where('name', $request->input('name'))->where('processing_type_id', $request->input('processing_type_id'))->first();
        if($check){
            return redirect()->route('monitoring_fee.create')->with('error', 'Monitoring fee already exist in this processing type!');
        }
        MonitoringFee::create($validated);
        return redirect()->route('monitoring_fee.index')->with('success', 'Monitoring fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(MonitoringFee $monitoring_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonitoringFee $monitoring_fee)
    {
        $branches = Branch::all();
        $services = Service::where('status', 1)->where('branch_id', 1)->get();
        return view('monitoring_fee.edit', compact(['monitoring_fee', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMonitoringFeeRequest $request, MonitoringFee $monitoring_fee)
    {
        $validated = $request->validated();
        $monitoring_fee->update($validated);
        return redirect()->route('monitoring_fee.index')->with('success', 'Application form fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonitoringFee $monitoring_fee)
    {
        if ($monitoring_fee->delete())
            return redirect()->back()->with('success', 'Monitoring fee deleted successfully!');
        return redirect()->back()->with('error', 'Monitoring fee could not be deleted!');
    }

    public function deleteSelectedItems(Request $request)
    {
        // Handle deletion of selected items here
        $selectedIds = $request->input('selectedIds');
        
        // Perform deletion logic using the selected IDs
        try {
            DB::beginTransaction();
            foreach ($selectedIds as $id) {
                $application_form_fee = MonitoringFee::find($id);
                if ($application_form_fee) {
                    $application_form_fee->delete();
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Monitoring fees deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting monitoring fees.', 'error' => $e->getMessage()]);
        }
    }

    
}
