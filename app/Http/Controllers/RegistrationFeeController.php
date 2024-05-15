<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistrationFeeRequest;
use App\Http\Requests\UpdateRegistrationFeeRequest;
use App\Models\RegistrationFee;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;

class RegistrationFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth()->user()->hasRole('super-admin')){
        $registration_fees = RegistrationFee::all();
        }else{
        $registration_fees = RegistrationFee::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }

        return view('registration_fee.index', compact('registration_fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('registration_fee.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationFeeRequest $request)
    {
        $validated = $request->validated();
        $check = RegistrationFee::where('amount', $request->input('amount'))->where('branch_id', $request->input('branch_id'))->first();
        if($check){
            return redirect()->route('registration_fee.create')->with('error', 'Registration fee already exist in this area office!');
        }
        RegistrationFee::create($validated);
        return redirect()->route('registration_fee.index')->with('success', 'Registration fee added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(RegistrationFee $registration_fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistrationFee $registration_fee)
    {
        if(Auth()->user()->hasRole('super-admin')){
            $branches = Branch::all();
            $services = Service::all();
        }else{
            $branches = Branch::where('id', Auth()->user()->staff->branch->id)->get();
            $services = Service::where('branch_id', Auth()->user()->staff->branch->id)->get();
        }
        return view('registration_fee.edit', compact(['registration_fee', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationFeeRequest $request, RegistrationFee $registration_fee)
    {
        $validated = $request->validated();
        $registration_fee->update($validated);
        return redirect()->route('registration_fee.index')->with('success', 'Registration fee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistrationFee $registration_fee)
    {
        if ($registration_fee->delete())
            return redirect()->back()->with('success', 'Registration fee deleted successfully!');
        return redirect()->back()->with('error', 'Registration fee could not be deleted!');
    }

    
}
