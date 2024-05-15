<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserEmailTemplate;
use Modules\Accounting\Models\EmailTemplate;

class UserEmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $usr = \Auth::user();
        $EmailTemplates = EmailTemplate::all();
        return view('settings.company', compact('EmailTemplates'));
        // if($usr->type == 'company')
        // {
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
//        if(\Auth::user()->can('Create Email Template'))
//        {
    return view('email_templates.create');
    //        }
    //        else
    //        {
    //            return redirect()->back()->with('error', __('Permission denied.'));
    //        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $usr = \Auth::user();

        $validator = \Validator::make(
            $request->all(), [
                               'name' => 'required',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        
        $EmailTemplate             = new EmailTemplate();
        $EmailTemplate->name       = $request->name;
        $EmailTemplate->created_by = $usr->id;
        $EmailTemplate->save();
        return redirect()->route('email_template.index')->with('success', __('Email Template successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserEmailTemplate  $userEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(UserEmailTemplate $userEmailTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserEmailTemplate  $userEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(UserEmailTemplate $userEmailTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserEmailTemplate  $userEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserEmailTemplate $userEmailTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserEmailTemplate  $userEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserEmailTemplate $userEmailTemplate)
    {
        //
    }
    public function manageEmailLang($id, $lang = 'en')
    {

        if(\Auth::user()->type == 'company')
        {
            $languages         = Utility::languages();
            $LangName = Language::where('code',$lang)->first();

            $emailTemplate     = EmailTemplate::first();
//             $currEmailTempLang = EmailTemplateLang::where('lang', $lang)->first();
            $currEmailTempLang = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', $lang)->first();
            if(empty($currEmailTempLang))
            {
                return redirect()->back()->with('error', 'Data not found.');
            }

            if(!isset($currEmailTempLang) || empty($currEmailTempLang))
            {
//                $currEmailTempLang       = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', 'en')->first();
                $currEmailTempLang = EmailTemplateLang::where('lang', $lang)->first();

                $currEmailTempLang->lang = $lang;
            }

            if(\Auth::user()->type == 'company')
            {
                $emailTemplate     = EmailTemplate::where('id', '=', $id)->first();
            }
            else {

                $settings         = Utility::settings();
                $emailTemplate     = $settings['company_name'];
            }
            $EmailTemplates = EmailTemplate::all();


            return view('email_templates.show', compact('emailTemplate', 'languages', 'currEmailTempLang','EmailTemplates','LangName'));
        }
        else
        {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    // Used For Store Email Template Language Wise
    public function storeEmailLang(Request $request, $id)
    {

//        if(\Auth::user()->can('Edit Email Template Lang'))
//        {
            $validator = \Validator::make(
                $request->all(), [
                                   'subject' => 'required',
                                   'content' => 'required',
                               ]
            );

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $emailLangTemplate = EmailTemplateLang::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->first();

            // if record not found then create new record else update it.
            if(empty($emailLangTemplate))
            {
                $emailLangTemplate            = new EmailTemplateLang();
                $emailLangTemplate->parent_id = $id;
                $emailLangTemplate->lang      = $request['lang'];
                $emailLangTemplate->subject   = $request['subject'];
                $emailLangTemplate->content   = $request['content'];
                $emailLangTemplate->save();
            }
            else
            {
                $emailLangTemplate->subject = $request['subject'];
                $emailLangTemplate->content = $request['content'];
                $emailLangTemplate->save();
            }

            return redirect()->route(
                'manage.email.language', [
                                           $id,
                                           $request->lang,
                                       ]
            )->with('success', __('Email Template Detail successfully updated.'));
//        }
//        else
//        {
//            return redirect()->back()->with('error', 'Permission denied.');
//        }
    }

    // Used For Update Status Company Wise.
    public function updateStatus(Request $request)
    {
        $post = $request->all();
        unset($post['_token']);
        $usr = \Auth::user();
        // if($usr->type == 'super admin' || $usr->type == 'company')
        // {
            UserEmailTemplate::where('user_id', $usr->id)->update([ 'is_active' => 0]);
            foreach ($post as $key => $value) {
                $UserEmailTemplate  = UserEmailTemplate::where('user_id', $usr->id)->where('template_id', $key)->first();
                $UserEmailTemplate->is_active = $value;
                $UserEmailTemplate->save();
            }
            return redirect()->back()->with('success', __('Status successfully updated!'));
        // }
        // else
        // {
        //     return redirect()->back()->with('error', __('Permission Denied.'));
        // }
    }
}
