<?php

namespace Modules\EmployerManager\Http\Controllers;

use App\Models\User;
use App\Models\State;
use App\Models\LocalGovt;
use App\Models\Signature;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Imports\EmployerImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use Modules\EmployerManager\Models\Payment;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Models\Certificate;
use Modules\Shared\Repositories\BranchRepository;
use Modules\EmployerManager\Imports\EmployersImport;
use App\Imports\UsersImport; // Create this import class
use Modules\EmployerManager\Repositories\EmployerRepository;
use Modules\EmployerManager\Http\Requests\CreateEmployerRequest;
use Modules\EmployerManager\Http\Requests\UpdateEmployerRequest;

class EmployerController extends AppBaseController
{
    /** @var EmployerRepository $employerRepository*/
    private $employerRepository;

    /** @var $branchRepository BranchRepository */
    private $branchRepository;

    public function __construct(EmployerRepository $employerRepo, BranchRepository $branchRepo)
    {
        $this->employerRepository = $employerRepo;
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the Employer.
     */
    public function index(Request $request)
    {

        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        $s_branchId = intval(session('branch_id'));
        $employers = Employer::where('branch_id', $s_branchId)->orderBy('created_at', 'DESC');

        $pendingstaff1 = Employer::where('branch_id', $s_branchId)->where('status', 0);
        $activestaff1 = Employer::where('branch_id', $s_branchId)->where('status', 1);

        if ($request->filled('search')) {
            $employers->where('ecs_number', 'like', '%' . $request->search . '%')
                ->orWhere('company_name', 'like', '%' . $request->search . '%')
                ->orWhere('company_email', 'like', '%' . $request->search . '%')
                ->orWhere('company_address', 'like', '%' . $request->search . '%')
                ->orWhere('company_rcnumber', 'like', '%' . $request->search . '%')
                ->orWhere('company_phone', 'like', '%' . $request->search . '%')
                ->orWhere('company_localgovt', 'like', '%' . $request->search . '%')
                ->orWhere('company_state', 'like', '%' . $request->search . '%')
                ->orWhere('business_area', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%');

            $pendingstaff1->where('ecs_number', 'like', '%' . $request->search . '%')
                ->orWhere('company_name', 'like', '%' . $request->search . '%')
                ->orWhere('company_email', 'like', '%' . $request->search . '%')
                ->orWhere('company_address', 'like', '%' . $request->search . '%')
                ->orWhere('company_rcnumber', 'like', '%' . $request->search . '%')
                ->orWhere('company_phone', 'like', '%' . $request->search . '%')
                ->orWhere('company_localgovt', 'like', '%' . $request->search . '%')
                ->orWhere('company_state', 'like', '%' . $request->search . '%')
                ->orWhere('business_area', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%');

            $activestaff1->where('ecs_number', 'like', '%' . $request->search . '%')
                ->orWhere('company_name', 'like', '%' . $request->search . '%')
                ->orWhere('company_email', 'like', '%' . $request->search . '%')
                ->orWhere('company_address', 'like', '%' . $request->search . '%')
                ->orWhere('company_rcnumber', 'like', '%' . $request->search . '%')
                ->orWhere('company_phone', 'like', '%' . $request->search . '%')
                ->orWhere('company_localgovt', 'like', '%' . $request->search . '%')
                ->orWhere('company_state', 'like', '%' . $request->search . '%')
                ->orWhere('business_area', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%');
        }

        $pendingstaff = $pendingstaff1->paginate(10);
        $activestaff =  $activestaff1->paginate(10);
        // shehu comment down
        // $employers = $this->employerRepository->paginate(10);
        $employers = $employers->paginate(10);
        return view('employermanager::employers.index', compact('employers', 'state', 'local_govt', 'pendingstaff', 'activestaff'));
    }

    public function certificates()
    {
        /* $id = Auth::user()->staff->branch_id; */
        $certificates = Certificate::where('payment_status', 1)->where('processing_status', 1)->paginate(10);
        $pending = Certificate::where('processing_status', 0)->paginate(10);


        return view('employermanager::certificates.index', compact('certificates', 'pending'));
    }

    public function approveCertificate($certificateId)
    {
        $certificate = Certificate::find($certificateId);

        if (!$certificate) {
            // Certificate not found, handle accordingly
            // For example, show an error message or redirect
            return redirect()->route('certificates', ['certificateId' => $certificateId])->with('error', 'Certificate not found.');
        }

        // Update the payment_status and processing_status columns
        $certificate->payment_status = 1;
        $certificate->processing_status = 1;
        $certificate->save();

        return redirect()->route('certificates')->with('success', 'Certificate approved successfully.');
    }

    public function displayCertificateDetails($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        // Get the last recent 3 years
        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year) // Update the whereYear condition
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year) // Update the whereYear condition
                ->sum('amount');
        }

        $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NIWA'
        $qrCode = QrCode::generate('http://ebs.NIWA.com.ng/');

        $signature = Signature::with('user')->find(1);


        return view('employermanager::certificates.details', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode', 'signature'));
    }

    public function uploadEmployer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:csv',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        /*  if ($request->hasFile('file')) {
            try {
                $file = $request->file('file');

                $import = new EmployersImport();
               Excel::import($import, $file);


                // Flash success message
                flash('Bulk employer uploaded and data saved successfully.')->success();
            } catch (\Exception $e) {
                // Flash error message on exception
                flash('An error occurred during file processing: ' . $e->getMessage())->error();
                return redirect()->back();
            }
        } else {
            // Flash error message for no file uploaded
            flash('No file uploaded.')->error();
        }

        return redirect(route('employers.index')); */
        Excel::import(new EmployersImport(), request()->file('file'));
        return redirect(route('employers.index'));
    }

    public function bulkEmployerUpload()
    {

        return view('employermanager::employers.bulk-employer');
    }
    /**
     * Show the form for creating a new Employer.
     */
    public function create()
    {
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        $employers = User::whereHas('staff', function ($query) {
            $query->where('branch_id', auth()->user()->staff->branch_id);
        })->get();

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        return view('employermanager::employers.create', compact('employers', 'state', 'local_govt', 'branches'));
    }


    public function showmassemployers()
    {

        $datas = Employer::orderBy('id', 'desc')->get();

        return view('upload.employersrecord', compact('datas'));
    }
    public function editmassemployersrecord($id)
    {

        $record = Employer::findOrFail($id);
        // dd($record);
        return view('upload.editapplicantrecord', compact('record'));
    }

    public function updatemassaplicantrecord(Request $request, $id)
    {
        // dd($request->all());
        $record = Employer::findOrFail($id);
        $record->update($request->all());

        return redirect()->route('showemplist')->with('success', 'SUCCESSFULLY UPDATED APPLICANT RECORD');
    }

    public function storemass(Request $request)
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
                $import = new EmployerImport();

                try {
                    //code...
                    Excel::import(new EmployersImport(), request()->file('file'));
                } catch (\Throwable $th) {
                    return redirect()->with('error', $th->getMessage());
                }


                return redirect()->route('showemplist')->with('success', 'SUCCESSFULLY UPLOADED');
            } catch (\Throwable $th) {
                Flash::error($th->getMessage());
                return back()->with('message', $th->getMessage());
            }
        }
    }

    public function downloademployersample()
    {

        $file = public_path('excelfile/applicantsrecord.xlsx');


        return Response::download($file, 'applicantdatasample.xlsx');
    }
    public function downloadpaymentsample()
    {

        $file = public_path('excelfile/paymentrecord.xlsx');


        return Response::download($file, 'paymenthistorysample.xlsx');
    }
    public function downloadservicesamples()
    {
        $file = public_path('excelfile/serviceapplication.xlsx');


        return Response::download($file, 'serviceapplicationsample.xlsx');
    }
    public function displayform()
    {
        return view('upload.employersmass');
    }
    /**
     * Store a newly created Employer in storage.
     */
    public function store(CreateEmployerRequest $request)
    {
        $input = $request->all();
        $input['created_by'] =  Auth::user()->id;

        // $document_url = $path . "/" . $file;
        $file = $request->file('certificate_of_incorporation');
        $path = "employer/";
        $title = str_replace(' ', '', $input['company_name']);
        $fileName = $title . 'v1' . rand() . '.' . $file->getClientOriginalExtension();

        // Upload the file to the S3 bucket
        // $documentUrl = Storage::disk('s3')->putFileAs($path, $file, $fileName);

        $input['certificate_of_incorporation'] =  "0"; //$documentUrl;
        $last_ecs = Employer::get()->last();

        if ($last_ecs) {
            //if selected ecs belongs to another employer
            do {
                $ecs = $last_ecs['ecs_number'] + 1;
                $employer_exists = Employer::where('ecs_number', $ecs)->get()->last();
            } while ($employer_exists);
        } else {
            $ecs = '1000000001';
        }

        $input['ecs_number'] = $ecs;

        $employer = $this->employerRepository->create($input);

        Flash::success('Employer saved successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Display the specified Employer.
     */
    public function show($id)
    {
        $employer = $this->employerRepository->find($id);
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();


        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        return view('employermanager::employers.show', compact('employer', 'state', 'local_govt'));
    }

    /**
     * Show the form for editing the specified Employer.
     */
    public function edit($id)
    {
        $state = State::where('status', 1)->get();
        $local_govt = LocalGovt::where('status', 1)->get();

        $employer = $this->employerRepository->find($id);
        $employers = User::get();

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        return view('employermanager::employers.edit', compact('branches', 'employer', 'employers', 'state', 'local_govt'));
    }

    /**
     * Update the specified Employer in storage.
     */
    public function update($id, UpdateEmployerRequest $request)
    {
        $employer = $this->employerRepository->find($id);
        $employer['updated_by'] =  Auth::user()->id;
        $employer->save();

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $employer = $this->employerRepository->update($request->all(), $id);

        Flash::success('Employer updated successfully.');

        return redirect(route('employers.index'));
    }

    /**
     * Remove the specified Employer from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employer = $this->employerRepository->find($id);
        $employer['deleted_by'] = Auth::user()->id;
        $employer->save();

        if (empty($employer)) {
            Flash::error('Employer not found');

            return redirect(route('employers.index'));
        }

        $this->employerRepository->delete($id);

        Flash::success('Employer deleted successfully.');

        return redirect(route('employers.index'));
    }

    public function employees(Request $request, $id)
    {

        $employer = $this->employerRepository->find($id);
        $employees = Employee::where('employer_id', '=', $employer->id);

        if ($request->filled('search')) {
            $employees->where('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('middle_name', 'like', '%' . $request->search . '%')
                ->orWhere('date_of_birth', 'like', '%' . $request->search . '%')
                ->orWhere('gender', 'like', '%' . $request->search . '%')
                ->orWhere('marital_status', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('employment_date', 'like', '%' . $request->search . '%')
                ->orWhere('monthly_renumeration', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%');
        }

        $employees = $employees->paginate(10);

        return view('employermanager::employers.employee', compact('employer', 'employees'));
    }
}
