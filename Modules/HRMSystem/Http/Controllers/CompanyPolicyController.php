<?php

namespace Modules\HRMSystem\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use Modules\Shared\Models\Branch;
use Modules\HRMSystem\Models\CompanyPolicy;
use Modules\Accounting\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CompanyPolicyController extends AppBaseController
{

    public function index()
    {
        
        if(Auth::user()->can('manage company policy'))
        {
            $companyPolicy = CompanyPolicy::where('created_by', '=', Auth::user()->creatorId())->get();

            return view('hrmsystem::companyPolicy.index', compact('companyPolicy'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function create()
    {
        if(Auth::user()->can('create company policy'))
        {
            $branch = Branch::get()->pluck('branch_name', 'id');
            $branch->prepend('Select Branch','');

            return view('hrmsystem::companyPolicy.create', compact('branch'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function store(Request $request)
    {

        if(Auth::user()->can('create company policy'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'title' => 'required',
//                                   'attachment' => 'mimes:jpeg,png,jpg,gif,pdf,doc,zip|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if(!empty($request->attachment))
            {
                $filenameWithExt = $request->file('attachment')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                $dir = 'uploads/companyPolicy/';
                $image_path = $dir . $fileNameToStore;
                if (\File::exists($image_path)) {
                    \File::delete($image_path);
                }
                $url = '';
                $path = Utility::upload_file($request,'attachment',$fileNameToStore,$dir,[]);
                if($path['flag'] == 1){
                    $url = $path['url'];
                }else{
                    return redirect()->back()->with('error', __($path['msg']));
                }
            }

            $policy              = new CompanyPolicy();
            $policy->branch      = $request->branch;
            $policy->title       = $request->title;
            $policy->description = $request->description;
            $policy->attachment  = !empty($request->attachment) ? $fileNameToStore : '';
            $policy->created_by  = Auth::user()->creatorId();
            $policy->save();


            //For Notification
            $setting  = Utility::settings(Auth::user()->creatorId());
            $branch = Branch::find($request->branch);
            $policyNotificationArr = [
                'company_policy_name' => $request->title,
                'branch_name' => $branch->name,
            ];
            //Slack Notification
            /* if(isset($setting['policy_notification']) && $setting['policy_notification'] ==1)
            {
                Utility::send_slack_msg('new_company_policy', $policyNotificationArr);
            }
            //Telegram Notification
            if(isset($setting['telegram_policy_notification']) && $setting['telegram_policy_notification'] ==1)
            {
                Utility::send_telegram_msg('new_company_policy', $policyNotificationArr);

            } */

            //webhook
            $module ='New Company Policy';
            $webhook =  Utility::webhookSetting($module);
            if($webhook)
            {
                $parameter = json_encode($policy);
                $status = Utility::WebhookCall($webhook['url'],$parameter,$webhook['method']);
                if($status == true)
                {
                    return redirect()->route('company-policy.index')->with('success', __('Company policy successfully created.'));
                }
                else
                {
                    return redirect()->back()->with('error', __('Webhook call failed.'));
                }
            }

            return redirect()->route('company-policy.index')->with('success', __('Company policy successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function show(CompanyPolicy $companyPolicy)
    {
        //
    }


    public function edit(CompanyPolicy $companyPolicy)
    {

        if(Auth::user()->can('edit company policy'))
        {
            $branch = Branch::get()->pluck('branch_name', 'id');
            $branch->prepend('Select Branch','');

            return view('hrmsystem::companyPolicy.edit', compact('branch', 'companyPolicy'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }


    public function update(Request $request, CompanyPolicy $companyPolicy)
    {
        if(Auth::user()->can('create company policy'))
        {
            $validator = Validator::make(
                $request->all(), [
                                   'branch' => 'required',
                                   'title' => 'required',
//                                   'attachment' => 'mimes:jpeg,png,jpg,gif,pdf,doc,zip|max:20480',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            if(isset($request->attachment))
            {
                $filenameWithExt = $request->file('attachment')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('attachment')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir = 'uploads/companyPolicy/';
                $image_path = $dir . $fileNameToStore;
                if (\File::exists($image_path)) {
                    \File::delete($image_path);
                }
                $url = '';
                $path = Utility::upload_file($request,'attachment',$fileNameToStore,$dir,[]);
                if($path['flag'] == 1){
                    $url = $path['url'];
                }else{
                    return redirect()->back()->with('error', __($path['msg']));
                }
            }
            $companyPolicy->branch      = $request->branch;
            $companyPolicy->title       = $request->title;
            $companyPolicy->description = $request->description;
            if(isset($request->attachment))
            {
                $companyPolicy->attachment = $fileNameToStore;
            }
            $companyPolicy->created_by = Auth::user()->creatorId();
            $companyPolicy->save();

            return redirect()->route('company-policy.index')->with('success', __('Company policy successfully updated.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(CompanyPolicy $companyPolicy)
    {

        if(Auth::user()->can('delete document'))
        {
            if($companyPolicy->created_by == Auth::user()->creatorId())
            {
                $companyPolicy->delete();

                $dir = storage_path('uploads/companyPolicy/');
                if(!empty($companyPolicy->attachment))
                {
                    unlink($dir . $companyPolicy->attachment);
                }

                return redirect()->route('company-policy.index')->with('success', __('Company policy successfully deleted.'));
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
