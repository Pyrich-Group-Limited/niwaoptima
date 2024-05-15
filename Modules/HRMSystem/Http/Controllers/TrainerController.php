<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Shared\Models\Branch;
use Modules\HRMSystem\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TrainerController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage trainer'))
        {
            $trainers = Trainer::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('hrmsystem::trainer.index', compact('trainers'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create trainer'))
        {
            $branches = Branch::get()->pluck('branch_name', 'id');

            return view('hrmsystem::trainer.create', compact('branches'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function store(Request $request)
    {
        if(Auth::user()->can('create trainer'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'firstname' => 'required',
                                   'lastname' => 'required',
                                   'contact' => 'required',
                                   'email' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $trainer             = new Trainer();
            $trainer->branch     = $request->branch;
            $trainer->firstname  = $request->firstname;
            $trainer->lastname   = $request->lastname;
            $trainer->contact    = $request->contact;
            $trainer->email      = $request->email;
            $trainer->address    = $request->address;
            $trainer->expertise  = $request->expertise;
            $trainer->created_by = Auth::user()->creatorId();
            $trainer->save();

            return redirect()->route('trainer.index')->with('success', __('Trainer  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(Trainer $trainer)
    {
        return view('hrmsystem::trainer.show', compact('trainer'));
    }


    public function edit(Trainer $trainer)
    {
        if(Auth::user()->can('edit trainer'))
        {
            $branches = Branch::get()->pluck('branch_name', 'id');

            return view('hrmsystem::trainer.edit', compact('branches', 'trainer'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function update(Request $request, Trainer $trainer)
    {
        if(Auth::user()->can('edit trainer'))
        {

            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'firstname' => 'required',
                                   'lastname' => 'required',
                                   'contact' => 'required',
                                   'email' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $trainer->branch    = $request->branch;
            $trainer->firstname = $request->firstname;
            $trainer->lastname  = $request->lastname;
            $trainer->contact   = $request->contact;
            $trainer->email     = $request->email;
            $trainer->address   = $request->address;
            $trainer->expertise = $request->expertise;
            $trainer->save();

            return redirect()->route('trainer.index')->with('success', __('Trainer  successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Trainer $trainer)
    {
        if(Auth::user()->can('delete trainer'))
        {
            if($trainer->created_by == Auth::user()->creatorId())
            {
                $trainer->delete();

                return redirect()->route('trainer.index')->with('success', __('Trainer successfully deleted.'));
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
