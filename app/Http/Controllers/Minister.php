<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\EmployerManager\Models\Certificate;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Models\Payment;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use Modules\UnitManager\Models\Region;
use Modules\WorkflowEngine\Models\Staff;

class Minister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchtotal= Branch::count();
        
      
        $departmenttotal = Department::count();
        $regiontotal= Region::count();
        $revenuefromecs=Payment::where('payment_type',1)->count();
        $revenuefromcertificate=Payment::where('payment_type',2)->count();
        $revenuefromregistration=Payment::where('payment_type',3)->count();
        $totalstaff=Staff::count();
        $totalemployers=Employer::count();
        $totalemployees=Employee::count();
        $totalcertificate=Certificate::count();
        return view('minister',compact('branchtotal','departmenttotal',
        'regiontotal','revenuefromecs',
        'revenuefromcertificate','revenuefromregistration','totalemployers',
        'totalemployees','totalcertificate',
        'totalstaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
