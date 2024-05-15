<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationFormFeeRequest;
use App\Http\Requests\UpdateApplicationFormFeeRequest;
use App\Models\ApplicationFormFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;

class ApplicationFormFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ApplicationFormFee::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('amount', 'like', "%$search%")
                  ->orWhereHas('service', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                });
            });
        }
    
    
        $application_form_fees = $query->orderBy('id', 'asc')->paginate(10);

        return view('application_form_fee.index', compact('application_form_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $branches = Branch::all();
        $services = Service::where('branch_id', 1)->get();
        return view('application_form_fee.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationFormFeeRequest $request)
    {
        $validated = $request->validated();
        $check = ApplicationFormFee::where('processing_type_id', $request->input('processing_type_id'))->where('amount', $request->input('amount'))->first();
        if($check){
            return redirect()->route('application_form_fee.create')->with('error', 'Application form fee already exist in this area office!');
        }
        ApplicationFormFee::create($validated);
        return redirect()->route('application_form_fee.index')->with('success', 'Application form fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(ApplicationFormFee $application_form_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplicationFormFee $application_form_fee)
    {
        $branches = Branch::all();
        $services = Service::where('branch_id', 1)->get();
        return view('application_form_fee.edit', compact(['application_form_fee', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationFormFeeRequest $request, ApplicationFormFee $application_form_fee)
    {
        $validated = $request->validated();
        $application_form_fee->update($validated);
        return redirect()->route('application_form_fee.index')->with('success', 'Application form fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApplicationFormFee $application_form_fee)
    {
        if ($application_form_fee->delete())
            return redirect()->back()->with('success', 'Application form fee deleted successfully!');
        return redirect()->back()->with('error', 'Application form fee could not be deleted!');
    }

    public function deleteSelectedItems(Request $request)
    {
        // Handle deletion of selected items here
        $selectedIds = $request->input('selectedIds');
        
        // Perform deletion logic using the selected IDs
        try {
            DB::beginTransaction();
            foreach ($selectedIds as $id) {
                $application_form_fee = ApplicationFormFee::find($id);
                if ($application_form_fee) {
                    $application_form_fee->delete();
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Application form fees deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting application form fees.', 'error' => $e->getMessage()]);
        }
    }

}
