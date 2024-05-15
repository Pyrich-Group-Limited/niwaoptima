<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\HRMSystem\Models\CustomQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CustomQuestionController extends AppBaseController
{

    public function index()
    {
        if(Auth::user()->can('manage custom question'))
        {
            $questions = CustomQuestion::where('created_by', Auth::user()->creatorId())->get();

            return view('hrmsystem::customQuestion.index', compact('questions'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        $is_required = CustomQuestion::$is_required;

        return view('hrmsystem::customQuestion.create', compact('is_required'));
    }

    public function store(Request $request)
    {
        if(Auth::user()->can('create custom question'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'question' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $question              = new CustomQuestion();
            $question->question    = $request->question;
            $question->is_required = $request->is_required;
            $question->created_by  = Auth::user()->creatorId();
            $question->save();

            return redirect()->back()->with('success', __('Question successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(CustomQuestion $customQuestion)
    {
        //
    }

    public function edit(CustomQuestion $customQuestion)
    {
        $is_required = CustomQuestion::$is_required;
        return view('hrmsystem::customQuestion.edit', compact('customQuestion','is_required'));
    }

    public function update(Request $request, CustomQuestion $customQuestion)
    {
        if(Auth::user()->can('edit custom question'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'question' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $customQuestion->question    = $request->question;
            $customQuestion->is_required = $request->is_required;
            $customQuestion->save();

            return redirect()->back()->with('success', __('Question successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(CustomQuestion $customQuestion)
    {
        if(Auth::user()->can('delete custom question'))
        {
            $customQuestion->delete();

            return redirect()->back()->with('success', __('Question successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
