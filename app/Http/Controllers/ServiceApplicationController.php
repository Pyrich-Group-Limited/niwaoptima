<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\EquipmentAndFee;
use App\Models\ServiceApplication;
use App\Models\MonitoringFee;
use App\Models\Payment as Payments;
use App\Imports\Servicesapplication;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Models\ServiceApplicationDocument;
use App\Http\Controllers\AppBaseController;
use Modules\EmployerManager\Models\Payment;
use App\Http\Controllers\ESSPPaymentController;
use App\Repositories\ServiceApplicationRepository;
use App\Http\Requests\CreateServiceApplicationRequest;
use App\Http\Requests\UpdateServiceApplicationRequest;
use App\Models\Service;
use Modules\EmployerManager\Models\Employer;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\DeclinedDocument;

class ServiceApplicationController extends AppBaseController
{
    /** @var ServiceApplicationRepository $serviceApplicationRepository*/
    private $serviceApplicationRepository;

    public function __construct(ServiceApplicationRepository $serviceApplicationRepo)
    {
        $this->serviceApplicationRepository = $serviceApplicationRepo;
    }

    /**
     * Display a listing of the ServiceApplication.
     */
    public function index(Request $request)
{
    $query = ServiceApplication::query();

    // Apply search filter if search query is present
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('user_id', 'like', "%$search%")
              ->orWhereHas('employer', function ($query) use ($search) {
                    $query->where('company_name', 'like', "%$search%");
              })
              ->orWhereHas('theservice', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
          })
              ->orWhere('date_of_inspection', 'like', "%$search%")
              ->orWhere('status_summary', 'like', "%$search%");
        });
    }

    // Filter by role axis_id
    if (Auth()->user()->hasRole('super-admin') || Auth()->user()->level_id == 20) {
        $query->where('current_step', '>', 3);
    } else if(Auth()->user()->level_id == 3) {
        $query->where('branch_id', Auth()->user()->staff->branch_id)
              ->where('current_step', '>', 3);
    } else {
        $query->where('assigned_user_id', Auth()->user()->id)
              ->where('current_step', '>', 3);
    } 

    $serviceApplications = $query->orderBy('id', 'desc')->paginate(10);

    $displayedIds = [164,140,145,146,147,148,142,143,146,181,147];
        $permissions = DB::table('permissions')->whereIn('id', $displayedIds)->get();
        //$permissions = $this->permissionRepository->all();

        $permissions->each(function ($permission) {
            $permission->assigned = false;
        });
        

        $groupedPermissions = $permissions->groupBy(function ($permission) {
            $words = explode(' ', strtolower($permission->name));
            // dd($words );
            $commonWords = array_intersect($words, ['user', 'role', 'client', 'project', 'milestone', 'bug', 'grant chart', 'project task', 'timesheet', 'areamanager', 'area office', 'hod', 'md', 'account', 'regional', 'medical']);

            return count($commonWords) > 0 ? implode('_', $commonWords) : $permission->name;
        });
     $roles = Role::where('id','!=', 1)->where('id','!=', 2)->where('id','!=', 15)->get()->pluck('name', 'id');
        $users = DB::table('users')
    ->join('staff', 'users.id', '=', 'staff.user_id')
    ->where('staff.branch_id', auth()->user()->staff->branch_id)
    ->select('users.id', DB::raw('CONCAT(users.first_name, " ", users.last_name) AS name'))
    ->pluck('name', 'id');

    return view('service_applications.index', compact( 'serviceApplications', 'groupedPermissions', 'roles', 'users'));
}

public function assignPermissions(Request $request)
{
    // Find the role
    $role = Role::find($request->role_id);

    // Delete existing permissions assigned to the role
    $role->revokePermissionTo($role->permissions);

    // Sync new permissions
    $role->syncPermissions($request->input('permissions', []));

    // Find the service application and update assigned user
    $serviceApplication = ServiceApplication::find($request->shareuser_id);
    if ($serviceApplication) {
        $serviceApplication->assigned_user_id = $request->user_id;
        $serviceApplication->save();
    }
    
    // Find the user and assign the role
    $user = User::find($request->user_id);
    if ($user) {
        $user->assignRole($request->role_id);
    }

    // Assuming you're using Laravel's built-in flash messaging
    session()->flash('success', 'Permissions assigned successfully.');

    return redirect()->back();
}



    /**
     * Show the form for creating a new ServiceApplication.
     */
    public function create()
    {
        return view('service_applications.create');
    }

    /**
     * Store a newly created ServiceApplication in storage.
     */
    public function store(CreateServiceApplicationRequest $request)
    {
        $input = $request->all();

        $serviceApplication = $this->serviceApplicationRepository->create($input);

        Flash::success('Service Application saved successfully.');

        return redirect(route('serviceApplications.index'));
    }

    /**
     * Display the specified ServiceApplication.
     */

    public function uploadpage()
    {
        return view('service_applications.upload');
    }

    public function showserviceupload()
    {
        $serviceApplications = ServiceApplication::orderBy('id', 'desc')->paginate();
        return view('service_applications.showmassupload', compact('serviceApplications'));
    }

    public function serviceupload(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv,xlsx'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        if ($request->hasFile('file')) {

            try {
                $file = $request->file('file');
                $import = new Servicesapplication();

                //   Excel::import($import,$file);
                Excel::import(new Servicesapplication(), $file);


                Flash::success('SUCCESSFULLY DONE');

                return redirect()->route('serviceappdata')->with('message', 'SUCCESSFULLY UPLOADED');
            } catch (\Throwable $th) {
                Flash::error($th->getMessage());
                return back()->with('message', $th->getMessage());
            }
        }
    }

    public function modifymassuploadpage($id)
    {

        $serviceApplication = $this->serviceApplicationRepository->find($id);


        // $yesno = [0 => 'No', 1 => 'Yes'];
        $yesno = [
            [
                'id' => 0,
                'value' => 'No'
            ],
            [
                'id' => 1,
                'value' => 'Yes'
            ]
        ];
        // dd($yesno);
        $servicetype = ['mechanical' => 'Mechanical', 'manual' => 'Manual'];
        $theservices = Service::all();
        // dd($theservices);
        $applicant = Employer::get();
        // dd($applicant);
        $approved = [
            [
                'id' => 0,
                'value' => 'Not Approved'
            ],
            [
                'id' => 0,
                'value' => 'Approved'
            ]
        ];



        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceappdata'));
        }

        return view('service_applications.editmass', compact(
            'serviceApplication',
            'servicetype',
            'yesno',
            'theservices',
            'applicant',
            'approved'

        ));
    }

    public function updatemassservices($id, Request $request)
    {
        // dd($request->all());
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceappdata'));
        }
        $serviceApplication->update($request->all());
        // $serviceApplication = $this->serviceApplicationRepository->update($request->all(), $id);

        Flash::success('Service Application updated successfully.');

        return redirect(route('serviceappdata'));
    }



    public function show($id)
    {
        $user = Auth::user();

        //$serviceApplication = $this->serviceApplicationRepository->find($id);
        $serviceApplication = ServiceApplication::find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');
            return redirect(route('serviceApplications.index'));
        }

        $payments = Payment::where('service_application_id', $serviceApplication->id)->paginate(10);
        $documents = $serviceApplication->documents()->orderBy('id', 'desc')->paginate(10);

        $equipment_and_fees = EquipmentAndFee::where('service_id', $serviceApplication->service_id)->where('processing_type_id', $serviceApplication->service_type_id)->pluck('name', 'price');

        
         $monitoring_fees = MonitoringFee::where('service_id', $serviceApplication->service_id)->where('processing_type_id', $serviceApplication->service_type_id)->get();
        return view('service_applications.show', compact('payments', 'documents', 'equipment_and_fees', 'monitoring_fees'))->with('serviceApplication', $serviceApplication);
    }




    /**
     * Show the form for editing the specified ServiceApplication.
     */
    public function edit($id)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        return view('service_applications.edit')->with('serviceApplication', $serviceApplication);
    }

    /**
     * Update the specified ServiceApplication in storage.
     */
    public function update($id, UpdateServiceApplicationRequest $request)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        $serviceApplication = $this->serviceApplicationRepository->update($request->all(), $id);

        Flash::success('Service Application updated successfully.');

        return redirect(route('serviceApplications.index'));
    }

    public function approveOrDeclineDocument(Request $request, $id)
    {
        $document_id = $request->input('document_id');

        $document = ServiceApplicationDocument::find($document_id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect()->back();
        }

        $selected_button = $request->input('selected_button');


        if ($selected_button == 'decline') {
            $document->approval_status = 2;
            $serviceApplication = ServiceApplication::find($document->service_application_id);
$documents = [
   "service_id" => $document->service_application_id,
   "name" => $document->name,
   "user_id" => $serviceApplication->user_id,
];
DeclinedDocument::create($documents);
            Flash::error('Document has been declined');
        } else if ($selected_button == 'approve') {
            $document->approval_status = 1;
            Flash::success('Document has been approved');
        }


        $document->save();


        return redirect()->back();
    }

    public function approveDocuments(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect()->back();
        }

        $selected_status = $request->input('selected_status');


        if ($selected_status == 'decline') {
            $serviceApplication->mse_are_documents_verified = 0;
            $serviceApplication->current_step = 42;
            $serviceApplication->mse_document_verification_comment = $request->mse_document_verification_comment;
            Flash::success('Documents have been declined. Wait for client to update documents before approval will show');
        } else if ($selected_status == 'approve') {
            $serviceApplication->mse_are_documents_verified = 1;
            $unapproved_documents_count = ServiceApplicationDocument::where('service_application_id', $serviceApplication->id)->where('approval_status', '!=', 1)->count();

           /*  if ($unapproved_documents_count > 0) {
                Flash::error('Please approve each document first');

                return redirect()->back();
            } */
            $serviceApplication->current_step = 6;
            $serviceApplication->status_summary = 'Your documents have been approved';
            $serviceApplication->mse_document_verification_comment = $request->mse_document_verification_comment;
            Flash::success('Documents have been approved');
        }

        $serviceApplication->mse_document_verification_comment = $request->mse_document_verification_comment;
        $serviceApplication->save();


        return redirect()->back();
    }

    public function approveApplicationFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);
        $pay = Payments::where('payment_status', 1)->where('payment_type', 1)->where("employer_id", $serviceApplication->user_id)->latest()->first();
        if ($pay) {
            $pay->approval_status = 1;
            $pay->save();
        }
        $serviceApplication->current_step = 41;
        $serviceApplication->status_summary = 'Application form fee approved';
        $serviceApplication->save();
        // dd($serviceApplication->current_step);
        Flash::success('Payment has been approved');


        return redirect()->back();
    }

    public function approveProcessingFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->finance_is_processing_fee_verified = 0;
            $serviceApplication->status_summary = 'Processing fee has been declined';
            Flash::success('Payment has been declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->finance_is_processing_fee_verified = 1;
            $serviceApplication->current_step = 7;
            $serviceApplication->status_summary = 'Processing fee have been approved';
            // $serviceApplication->date_of_inspection = $request->date_of_inspection;
            $pay = Payments::where('payment_status', 1)->where('payment_type', 2)->where("employer_id", $serviceApplication->user_id)->latest()->first();
            $pay->approval_status = 1;
            $pay->save();
            Flash::success('Payment has been approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }

    public function approveInspectionFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->finance_is_inspection_fee_verified = 0;
            $serviceApplication->status_summary = 'Inspection fee has been declined';
            Flash::success('Payment has been declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->finance_is_inspection_fee_verified = 1;
            $serviceApplication->current_step = 9;
            $serviceApplication->status_summary = 'An inspection notice has been sent to your mail';
            $serviceApplication->date_of_inspection = $request->date_of_inspection;
            $serviceApplication->comments_on_inspection = $request->comments_on_inspection;

            $pay = Payments::where('payment_status', 1)->where('payment_type', 3)->where("employer_id", $serviceApplication->user_id)->latest()->first();
            $pay->approval_status = 1;
            $pay->save();

            Flash::success('Payment has been approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }


    public function setInspectionStatus(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->inspection_status = 0;
            $serviceApplication->status_summary = 'Inspection status: Declined';
            Flash::success('Inspection status: Declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->inspection_status = 1;
            $serviceApplication->current_step = 10;
            $serviceApplication->status_summary = 'Inspection status: Approved';
            Flash::success('Inspection status: Approved');
        }

        //$serviceApplication->comments_on_inspection = $request->comments_on_inspection;
        $file = $request->file('inspection_report');
if ($file && $file->isValid()) {
    $path = "documents"; // Define the path where you want to store the file
    $path_folder = public_path($path);

    // Save file
    $file_name = rand() . '.' . $file->getClientOriginalExtension();
    $file->move($path_folder, $file_name);

    $document_url = $path . "/" . $file_name;
    $inspection_report = $document_url;
}

        $serviceApplication->inspection_report = $inspection_report;
        $serviceApplication->save();

        return redirect()->back();
    }

    public function generateEquipmentInvoice(Request $request, $id)
    {

        $sum_total = 0;
        $equipment = $request->input('equipment');

        $prices = $request->input('price');
        $quantities = $request->input('qty');
        $expiry_date = $request->input('expiry_date');

        $serviceApplication = ServiceApplication::find($id);
        $monitoring_fee = MonitoringFee::where('branch_id', auth()->user()->staff->branch_id)->where('service_id', $serviceApplication->service_id)->where('processing_type_id', $serviceApplication->service_type_id)->first();


        // Ensure both price and quantity arrays are of the same length
if (count($prices) === count($quantities)) {
    // Iterate through each index
    for ($i = 0; $i < count($prices); $i++) {
        // Get the price and quantity at the current index
        $price = (int)$prices[$i] ?? 0;
        $quantity = (int)$quantities[$i] ?? 0;

        // Add the monitoring fee amount to the price
        //$price += $monitoring_fee->amount;

        // Calculate the total for the current item
        $total = $price * $quantity;

        //$total += $monitoring_fee->amount;

        // Add the total to the sum
        //$sum_total += $total;
    }
}


if(isset($equipment)){
    // Assuming $service_application->equipment_fees_list is the JSON string
    $equipment_fees_list = json_decode($equipment, true); // Convert JSON to PHP array

    $sum = 0;
    foreach ($equipment_fees_list as $item) {
        $sum += $item['price'];
    }
}   
$sum_total = $sum ? $sum : $total;

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        $input = $request->all();
        $demand_total = $request->total_price;

        $essp_payment = (new ESSPPaymentController)->generateRemita($request, $demand_total, $serviceApplication);

        if ($essp_payment == true) {
            if ($input['payment_type'] == "5") {
                /* $serviceApplication->current_step = 11;
                $serviceApplication->status_summary = "Payment of equipment fees required, Invoice has been sent to you";
                $serviceApplication->equipment_fees_list = $equipment;
                $serviceApplication->save(); */
                $serviceApplication->current_step = 110;
                $serviceApplication->expiry_date = $expiry_date;
                $serviceApplication->status_summary = "Please review and approve this demand notice.";
                $serviceApplication->equipment_fees_list = $equipment;
                $serviceApplication->demand_total = $demand_total;
                $serviceApplication->save();
            }
        }

        return redirect()->back();
    }

    public function approveDemandNotice(Request $request, $id)
    {


        $serviceApplication = ServiceApplication::find($id);
        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }
        $pay = Payments::where("employer_id", $serviceApplication->user_id)->latest()->first();
            $pay->approval_status = 1;
            $pay->save();

        $serviceApplication->current_step = 13;//11;
        $serviceApplication->status_summary = "Payment of equipment fees required, Invoice has been sent to you";
        //$serviceApplication->equipment_fees_list = $equipment;
        $serviceApplication->save();
        Flash::success('Demand notice approved');

        return redirect()->back();
    }


    public function approveEquipmentFee(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->are_equipment_and_monitoring_fees_verified = 0;
            $serviceApplication->status_summary = 'Equipment fee has been declined';
            Flash::success('Payment has been declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->are_equipment_and_monitoring_fees_verified = 1;
            $serviceApplication->current_step = 141;
            $serviceApplication->status_summary = 'Equipment fee has been approved';

            $pay = Payments::where('payment_status', 1)->where('payment_type', 5)->where("employer_id", $serviceApplication->user_id)->latest()->first();
            $pay->approval_status = 1;
            $pay->save();
            Flash::success('Payment has been approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }

    public function areaOfficerApproval(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->area_officer_approval = 0;
            $serviceApplication->current_step = 10;
            $serviceApplication->status_summary = 'Declined by Area officer';
            Flash::success('Declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->area_officer_approval = 1;
            $serviceApplication->current_step = 142;
            $serviceApplication->status_summary = 'Approved by Area officer';
            Flash::success('Approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }

    public function hodMarineApproval(Request $request, $id)
    {
        $serviceApplication = ServiceApplication::find($id);

        $selected_status = $request->input('selected_status');

        if (empty($serviceApplication)) {
            Flash::error('Application not found');

            return redirect()->back();
        }

        if ($selected_status == 'decline') {
            $serviceApplication->hod_marine_approval = 0;
            $serviceApplication->current_step = 12;
            $serviceApplication->status_summary = 'Declined by HOD Marine';
            Flash::success('Declined.');
        } else if ($selected_status == 'approve') {
            $serviceApplication->hod_marine_approval = 1;
            $serviceApplication->current_step = 15;
            $serviceApplication->issued_on = now();
            $serviceApplication->status_summary = 'Approved by HOD Marine';
            Flash::success('Approved');
        }

        $serviceApplication->save();


        return redirect()->back();
    }


    /**
     * Remove the specified ServiceApplication from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $serviceApplication = $this->serviceApplicationRepository->find($id);

        if (empty($serviceApplication)) {
            Flash::error('Service Application not found');

            return redirect(route('serviceApplications.index'));
        }

        $this->serviceApplicationRepository->delete($id);

        Flash::success('Service Application deleted successfully.');

        return redirect(route('serviceApplications.index'));
    }

    public function showMap($id)
    {
        $serviceApplication = ServiceApplication::find($id);
        if (!$serviceApplication) {
            return abort(404); // or handle the case where the service application is not found
        }

        return view('service_applications.map', compact('serviceApplication'));
    }
}
