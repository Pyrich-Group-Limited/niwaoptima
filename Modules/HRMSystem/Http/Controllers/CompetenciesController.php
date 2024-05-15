<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\Competencies;
use Modules\HRMSystem\Models\PerformanceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompetenciesController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('Manage Competencies'))
        {
            $competencies = Competencies::where('created_by', Auth::user()->creatorId())->get();

            return view('hrmsystem::competencies.index', compact('competencies'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        $performance     = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('name', 'id');
            return view('hrmsystem::competencies.create', compact('performance'));

    }


    public function store(Request $request)
    {
        if(Auth::user()->can('Create Competencies'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'type' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $competencies             = new Competencies();
            $competencies->name       = $request->name;
            $competencies->type       = $request->type;
            $competencies->created_by = Auth::user()->creatorId();
            $competencies->save();

            return redirect()->route('competencies.index')->with('success', __('Competencies  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(Competencies $competencies)
    {
        //
    }


    public function edit($id)
    {
        $competencies = Competencies::find($id);
        $performance     = PerformanceType::where('created_by', '=', Auth::user()->creatorId())->get()->pluck('name', 'id');
        return view('hrmsystem::competencies.edit', compact('performance', 'competencies'));

    }


    public function update(Request $request, $id)
    {
        if(Auth::user()->can('Edit Competencies'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                   'type' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $competencies       = Competencies::find($id);
            $competencies->name = $request->name;
            $competencies->type = $request->type;
            $competencies->save();

            return redirect()->route('competencies.index')->with('success', __('Competencies  successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($id)
    {
        if(Auth::user()->can('Delete Competencies'))
        {
            $competencies = Competencies::find($id);
            $competencies->delete();

            return redirect()->route('competencies.index')->with('success', __('Competencies  successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
