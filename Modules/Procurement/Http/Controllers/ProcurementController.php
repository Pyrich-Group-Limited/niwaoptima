<?php

namespace Modules\Procurement\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Procurement\Models\Procurement;
use Modules\Procurement\Models\Requisition;
use Illuminate\Contracts\Support\Renderable;

class ProcurementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $type = [

            'Contract Request' => 'Contract Request',
            'Internal Requisition' => 'Internal Requistion',
        ];
        $select = [

            'Choose From DMS' => 'Choose From DMS',
            'Choose From MEMO' => 'Choose From MEMO',

        ];

        $procurement = Procurement::with(['requisition', 'user'])->orderBy('id', 'desc')->get();
        $vendor= Vendor::all()->pluck('name','id');
        $vendor->prepend('select the vendor','');
        return view('procurement::index', compact('type', 'select','vendor', 'procurement'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {


        return view('procurement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {



        $procurement = new Procurement;

        $procurement->type = $request->type;
        $procurement->user_id = $request->user_id;
        $procurement->issue_date = $request->issue_date;
        $procurement->title = $request->title;
        $procurement->status = $request->status;
        $procurement->vendor_id = $request->vendor_id;


        if ($request->hasFile('document')){
            $file=$request->file('document');
            $path = $file->store('public');
            $filename=$file->hashName();
            $procurement->document=$filename;

        } else if( $request->document) {

            $file = $request->document;
            // $filename=$file->hashName();
            // $path = $file->store('public');
            $procurement->document=  $file;
        }


        $referenceNumber = 'NIWA-' . date('Ymd') . '-' . str_pad(Procurement::count() + 1, 3, '0', STR_PAD_LEFT);

        $procurement->reference_number = $referenceNumber;

        //do the image later

        $procurement->save();
        //
        // dd($request->all());
        $item = $request->input('item');
        $quantity = $request->input('quantity');
        $rate = $request->input('rate');
        $amount = $request->input('amount');

        foreach ($item as $key => $value) {
            Requisition::create([

                'procurement_id' => $procurement->id,
                'item' => json_encode($item[$key]),
                'rate' => json_encode($rate[$key]),
                'quantity' => json_encode($quantity[$key]),
                'amount' => json_encode($amount[$key]),

            ]);
        }


        Flash::success('successful');
        return redirect()->route('procurement.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('procurement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $procurement = Procurement::with(['user', 'requisition'])->findOrFail($id);

        return view('procurement::edit', compact('procurement'));
    }


    public function supervisor()
    {
        //where the unit_head_id =auth_user_id

        $procurement = Procurement::with(['requisition', 'user'])

            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('procurement::supervisor', compact('procurement'));
    }



    public function hodprocurement()
    {
        $procurement = Procurement::with(['requisition', 'user'])
            ->where('status', 2)
            ->orderBy('id', 'desc')
            ->get();
        return view('procurement::hodproc', compact('procurement'));
    }

    public function hodedit($id)
    {
        $data = Procurement::findOrFail($id);

        $req = Requisition::where('procurement_id', $data->id)->get();

        return view('procurement::hodedit', compact('data', 'req'));
    }

    public function audit()
    {
        $procurement = Procurement::with(['requisition', 'user'])
            ->where('status', '>', 2)
            ->orderBy('id', 'desc')
            ->get();
        return view('procurement::audit', compact('procurement'));
    }


    public function auditedit($id)
    {

        $data = Procurement::findOrFail($id);

        $req = Requisition::where('procurement_id', $data->id)->get();

        return view('procurement::auditedit', compact('data', 'req'));
    }
    public function legal()
    {
        $procurement = Procurement::with(['requisition', 'user'])
        ->where('status','>=', 4)
        ->where('type', 'Contract Request')
        ->orderBy('id', 'desc')
        ->get();

        return view('procurement::legal', compact('procurement'));
    }



    public function legaledit($id)
    {
        $data = Procurement::findOrFail($id);

        $req = Requisition::where('procurement_id', $data->id)->get();

        return view('procurement::legaledit', compact('data', 'req'));
    }



    public function md()
    {
        $procurement = Procurement::with(['requisition', 'user'])
            ->where('status','>=', 4)
            ->orderBy('id', 'desc')
            ->get();
        return view('procurement::md', compact('procurement'));
    }
    public function mdedit($id)
    {
        $data = Procurement::findOrFail($id);

        $req = Requisition::where('procurement_id', $data->id)->get();

        return view('procurement::mdedit', compact('data', 'req'));
    }

    public function fin()
    {
        $procurement = Procurement::with(['requisition', 'user'])
            ->where('status','>=', 6)
            ->orderBy('id', 'desc')
            ->get();
        return view('procurement::finance', compact('procurement'));
    }
    public function fined($id)
    {
        $data = Procurement::findOrFail($id);

        $req = Requisition::where('procurement_id', $data->id)->get();

        return view('procurement::financeedit', compact('data', 'req'));
    }

    public function unitedit($id)
    {
        $data = Procurement::findOrFail($id);

        $req = Requisition::where('procurement_id', $data->id)->get();

        return view('procurement::unitedit', compact('data', 'req'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function supervisorupdate(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        Flash::success('success');
        return redirect()->route('unit.proc');
    }
    public function deptupdate(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        Flash::success('success');
        return redirect()->route('hod.proc');
    }
    public function legalupdate(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        Flash::success('success');
        return redirect()->route('legal.proc');
    }
    public function auditupdate(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        Flash::success('success');
        return redirect()->route('audit.proc');
    }
    public function mdupdate(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        Flash::success('success');
        return redirect()->route('md.proc');
    }
    public function finupdate(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        Flash::success('success');
        return redirect()->route('fin.proc');
    }


    public function update(Request $request, $id)
    {


        $data = Procurement::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
