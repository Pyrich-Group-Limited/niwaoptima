<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\AwardType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AwardTypeController extends AppBaseController
{
    public function index()
    {
        if(Auth::user()->can('manage award type'))
        {
            $awardtypes = AwardType::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('hrmsystem::awardtype.index', compact('awardtypes'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(Auth::user()->can('create award type'))
        {
            return view('hrmsystem::awardtype.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create award type'))
        {

            $validator = Validator::make(
                $request->all(), [

                                   'name' => 'required|max:20',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $awardtype             = new AwardType();
            $awardtype->name       = $request->name;
            $awardtype->created_by = Auth::user()->creatorId();
            $awardtype->save();

            return redirect()->route('awardtype.index')->with('success', __('AwardType  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(AwardType $awardtype)
    {
        return redirect()->route('awardtype.index');
    }

    public function edit(AwardType $awardtype)
    {
        if(Auth::user()->can('edit award type'))
        {
            if($awardtype->created_by == Auth::user()->creatorId())
            {

                return view('hrmsystem::awardtype.edit', compact('awardtype'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, AwardType $awardtype)
    {
        if(Auth::user()->can('edit award type'))
        {
            if($awardtype->created_by == Auth::user()->creatorId())
            {
                $validator = Validator::make(
                    $request->all(), [

                                       'name' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $awardtype->name = $request->name;
                $awardtype->save();

                return redirect()->route('awardtype.index')->with('success', __('AwardType successfully updated.'));
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

    public function destroy(AwardType $awardtype)
    {
        if(Auth::user()->can('delete award type'))
        {
            if($awardtype->created_by == Auth::user()->creatorId())
            {
                $awardtype->delete();

                return redirect()->route('awardtype.index')->with('success', __('AwardType successfully deleted.'));
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
