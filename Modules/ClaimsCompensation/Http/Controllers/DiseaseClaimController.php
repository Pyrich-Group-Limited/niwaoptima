<?php

namespace Modules\ClaimsCompensation\Http\Controllers;

use Modules\ClaimsCompensation\Http\Requests\StoreDiseaseClaimRequest;
use Modules\ClaimsCompensation\Http\Requests\UpdateDiseaseClaimRequest;
use Modules\ClaimsCompensation\Models\DiseaseClaim;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Modules\EmployerManager\Models\Employee;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DiseaseClaimController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deathClaims = DiseaseClaim::where('branch_id', auth()->user()->staff->branch_id)->get();

         if (
            Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('MD') || Auth::user()->hasRole('HOD') ||
            Auth::user()->hasRole('Regional Manager') || Auth::user()->hasRole('CERTIFICATE/COMPLIANCE') ||
            Auth::user()->hasRole('MER') || Auth::user()->hasRole('ED FINANCE & ACCOUNT') ||
            Auth::user()->hasRole('AUDIT') || Auth::user()->hasRole('GM')
        ) {
            
            $claims = DiseaseClaim::with('employee')->get();
        } else if ($deathClaims->count() > 0 || Auth::user()->hasRole('Branch Manager')) {

            $claims = DiseaseClaim::with('employee')->where('branch_id', auth()->user()->staff->branch_id)->get();
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        return view('claimscompensation::disease_claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /*  public function create()
    {
        $employees = auth()->user()->employees;
        return view('claimscompensation::disease_claims.create', compact('employees'));
    } */

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(StoreDiseaseClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        auth()->user()->disease_claims()->create($validated);

        return redirect()->route('death.index')->with('success', 'Disease claim created successfully!');
    } */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $incident = DiseaseClaim::findOrFail($id);

        return view('claimscompensation::disease_claims.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiseaseClaim $diseaseClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DiseaseClaim $diseaseClaim)
    {
        $deathClaim = DiseaseClaim::find($request->id);

        //INITIATE APPROVAL FLOW || ALSO FOR UPDATING create|update
        $approval_request = $deathClaim->request()->create([
            'staff_id' => auth()->user()->staff->id,
            'type_id' => 8, //for disease claim flow
            'order' => 1, //order/step of the flow
            'action_id' => 1, //action taken id 1= create
        ]);

        Flash::success('Disease Claim request initiated successfully.');

        return redirect(route('request.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiseaseClaim $diseaseClaim)
    {
        //
    }
}
