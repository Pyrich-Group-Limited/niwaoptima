<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Imports\EmployeesImport;
use App\Models\Service;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Shared\Models\Branch;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service as WebService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Service::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
                  
            });
        }
    
        
    
        $services = $query->orderBy('id', 'asc')->where('branch_id', 1)->paginate(10);

        return view('services.index', compact('services'));
    }

    public function servicesDataTable(Request $request)
    {
        // Fetch data from the database based on DataTables parameters
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');
        $searchValue = $request->input('search.value');

        // Your database query logic with pagination and search
        if (Auth()->user()->hasRole('super-admin')) {
            $query = Service::query();
        } else {
            $query = Service::where('branch_id', Auth()->user()->staff->branch_id)->query();
        }
        //$query = Service::query();

        if (!empty($searchValue)) {
            $query->where('column_name', 'like', '%' . $searchValue . '%');
            // Add more conditions for searching other columns as needed
        }

        // Get total records count before applying pagination
        $totalRecords = $query->count();

        // Apply pagination
        $data = $query->skip($start)->take($length)->get();

        // Prepare response data
        $responseData = [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords, // For simplicity, same as total records in this example
            'data' => $data
        ];

        return response()->json($responseData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        $branches = Branch::all();
        $services = Service::where('status', 1)->where('branch_id', 1)->get();
        return view('services.create', compact(['states', 'branches']));
    }


    public function getServices(Request $request)
    {
        $branchId = $request->get('branch_id');

        // Fetch services based on the branch ID
        $services = Service::where('branch_id', $branchId)->get();

        return response()->json(['data' => ['services' => $services]]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(StoreServiceRequest $request)
     {
         $validated = $request->validated();
         $validated['status'] = 1;
     
         // Check if any of the selected branches already have the same service type
         foreach ($validated['branch_id'] as $branchId) {
             $check = Service::where('name', $validated['name'])->where('branch_id', $branchId)->first();
             if ($check) {
                 return redirect()->route('services.create')->with('error', 'Service type already exists in one of the selected area offices!');
             }
         }
     
         // Create service for each branch
         foreach ($validated['branch_id'] as $branchId) {
             $service = new Service;
             $service->name = $validated['name'];
             $service->branch_id = $branchId;
             $service->status = $validated['status'];
             $service->save();
         }
     
         return redirect()->route('services.index')->with('success', 'Service added successfully!');
     }
     

    public function storebulk(Request $request)
    {

        return redirect()->route('services.index')->with('success', 'Bulk Service added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $states = State::all();
        $branches = Branch::all();
        $services = Service::where('status', 1)->where('branch_id', 1)->get();
        return view('services.edit', compact(['service', 'states', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $validated = $request->validated();
        $service->update($validated);
        return redirect()->route('services.index')->with('success', 'Service udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->delete())
            return redirect()->back()->with('success', 'Service deleted successfully!');
        return redirect()->back()->with('error', 'Service could not be deleted!');
    }
}
