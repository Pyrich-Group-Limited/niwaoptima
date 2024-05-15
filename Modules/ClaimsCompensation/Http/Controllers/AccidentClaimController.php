<?php

namespace Modules\ClaimsCompensation\Http\Controllers;

use Modules\ClaimsCompensation\Http\Requests\StoreAccidentClaimRequest;
use Modules\ClaimsCompensation\Http\Requests\UpdateAccidentClaimRequest;
use Modules\ClaimsCompensation\Models\AccidentClaim;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AccidentClaimController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deathClaims = AccidentClaim::where('branch_id', auth()->user()->staff->branch_id)->get();

         if (
            Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('MD') || Auth::user()->hasRole('HOD') ||
            Auth::user()->hasRole('Regional Manager') || Auth::user()->hasRole('CERTIFICATE/COMPLIANCE') ||
            Auth::user()->hasRole('MER') || Auth::user()->hasRole('ED FINANCE & ACCOUNT') ||
            Auth::user()->hasRole('AUDIT') || Auth::user()->hasRole('GM')
        ) {
            $claims = AccidentClaim::with('employee')->get();
        } else if ($deathClaims->count() > 0 || Auth::user()->hasRole('Branch Manager')) {

            $claims = AccidentClaim::with('employee')->where('branch_id', auth()->user()->staff->branch_id)->get();
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

        return view('claimscompensation::accident_claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /* public function create()
    {
        $employees = auth()->user()->employees;
        return view('claimscompensation::accident_claims.create', compact('employees'));
    } */

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(StoreAccidentClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        auth()->user()->accident_claims()->create($validated);

        return redirect()->route('accident.index')->with('success', 'Accident claim created successfully!');
    } */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $incident = AccidentClaim::findOrFail($id);

        return view('claimscompensation::accident_claims.show', compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccidentClaim $accidentClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccidentClaim $accidentClaim)
    {
        $deathClaim = AccidentClaim::find($request->id);

        //INITIATE APPROVAL FLOW || ALSO FOR UPDATING create|update
        $approval_request = $deathClaim->request()->create([
            'staff_id' => auth()->user()->staff->id,
            'type_id' => 7, //for accident claim flow
            'order' => 1, //order/step of the flow
            'action_id' => 1, //action taken id 1= create
        ]);

        Flash::success('Accident Claim request initiated successfully.');

        return redirect(route('request.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccidentClaim $accidentClaim)
    {
        //
    }
}
