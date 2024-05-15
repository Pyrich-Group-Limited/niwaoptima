<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\Asset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssetController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage assets'))
        {
            if(Auth::user()->hasRole('super-admin')){
                $assets = Asset::get();

                return view('hrmsystem::assets.index', compact('assets'));
            }else if(Auth::user()->hasRole('user')){
                $assets = Asset::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('hrmsystem::assets.index', compact('assets'));
            }else{

                $assets = Asset::where('branch_id', '=', Auth()->user()->staff->branch_id)->get();

            return view('hrmsystem::assets.index', compact('assets'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create assets'))
        {
            $employee = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');

            return view('hrmsystem::assets.create',compact('employee'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
//        dd($request->all());
        if(Auth::user()->can('create assets'))
        {
            $validator = Validator::make(
                $request->all(), [
                    'name' => 'required',
                    'purchase_date' => 'required',
                    'supported_date' => 'required',
                    'amount' => 'required',
                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $assets                 = new Asset();
            $assets->employee_id         = !empty($request->employee_id) ? implode(',', $request->employee_id) : '';
            $assets->name           = $request->name;
            $assets->purchase_date  = $request->purchase_date;
            $assets->supported_date = $request->supported_date;
            $assets->amount         = $request->amount;
            $assets->description    = $request->description;
            $assets->created_by     = Auth::user()->creatorId();
            $assets->branch_id     = Auth::user()->staff->branch_id;
            $assets->save();

            return redirect()->route('account-assets.index')->with('success', __('Assets successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Asset $asset)
    {
        //
    }


    public function edit($id)
    {

        if(Auth::user()->can('edit assets'))
        {
            $asset = Asset::find($id);
            $employee = User::get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'full_name' => $user->first_name . ' ' . $user->last_name,
                ];
            })->pluck('full_name', 'id');
            $asset->employee_id      = explode(',', $asset->employee_id);



            return view('hrmsystem::assets.edit', compact('asset','employee'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, $id)
    {
        if(Auth::user()->can('edit assets'))
        {
            $asset = Asset::find($id);
            if($asset->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [
                        'name' => 'required',
                        'purchase_date' => 'required',
                        'supported_date' => 'required',
                        'amount' => 'required',
                    ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $asset->name           = $request->name;
                $asset->employee_id         = !empty($request->employee_id) ? implode(',', $request->employee_id) : '';

                $asset->purchase_date  = $request->purchase_date;
                $asset->supported_date = $request->supported_date;
                $asset->amount         = $request->amount;
                $asset->description    = $request->description;
                $asset->save();

                return redirect()->route('account-assets.index')->with('success', __('Assets successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($id)
    {
        if(Auth::user()->can('delete assets'))
        {
            $asset = Asset::find($id);
            if($asset->created_by == Auth::user()->creatorId())
            {
                $asset->delete();

                return redirect()->route('account-assets.index')->with('success', __('Assets successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
