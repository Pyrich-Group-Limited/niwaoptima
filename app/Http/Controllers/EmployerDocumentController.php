<?php

namespace App\Http\Controllers;

use App\Mail\PaymentStatusMail;
use App\Models\Employee;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Models\Payment;
use App\Models\EmployerDocuments;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendInspectionNoticeEmail;
use Illuminate\Support\Facades\DB;

class EmployerDocumentController extends Controller
{

    public function index()
    {
        $employer_documents = EmployerDocuments::orderBy('id','desc')->paginate(10);
        return view('documents1.index', compact(['employer_documents']));
    }

    public function approveDocument($id)
    {
        // Find the payment by ID
        $document_status = EmployerDocuments::findOrFail($id);

        // Update the payment status or perform any other necessary actions
        $document_status->update(['payment_status' => 1]); // Assuming '1' represents the approved status

        $documents = EmployerDocuments::whereYear('created_at', date('Y'))->where('employer_id', $document_status->employer_id)->where('payment_status', 1)->count();
        if($documents == 6){
        $employer = Employer::findOrFail($document_status->employer_id);
        $employer->update(['inspection_status' => 1]);

        return redirect('/inspection-notice/'.$document_status->employer_id)->with('success', 'Document approved successfully');
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Document approved successfully');
    }
    public function inspectionNotice($id)
    {
        $employer = Employer::findOrFail($id);
        return view('documents1.inspection_notice', compact(['id','employer']));
    }
    public function sendInspectionNotice(Request $request)
    {
        $request->validate([
            'employer_id' => 'required',
            'inspection_datetime' => 'required',
        ]);
        
        $employer_id = $request->employer_id;
        $inspection_datetime = $request->inspection_datetime;
        $message = $request->message;
        
        try {
            Notification::create([
                'user_id' => $employer_id,
                'type' => $inspection_datetime,
                'data' => $message,
                'is_read' => 1,
            ]);

            $employer = Employer::findOrFail($employer_id);

            $email = $employer->company_email;
        
            // Send thank you email to each filtered email address
                Mail::to($email)->send(new SendInspectionNoticeEmail($inspection_datetime));
        
        
            return redirect('/document/index')->with('success', 'Inspection notice sent successfully.');
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->route('document.index')->with('error', 'Failed to notify the client: ' . $e->getMessage());
        }       
        
    }
    public function create()
    {
        //return view('documents1.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_document' => 'required|string|max:255',
            'title_document_file' => 'required|file|mimes:pdf|max:2048',
            'survey_document' => 'required|string|max:255',
            'survey_document_file' => 'required|file|mimes:pdf|max:2048',
            'sand_search_report' => 'required|string|max:255',
            'sand_search_report_file' => 'required|file|mimes:pdf|max:2048',
            'cac_certificate' => 'required|string|max:255',
            'cac_certificate_file' => 'required|file|mimes:pdf|max:2048',
            'pre_post_dredge_survey_drawings' => 'required|string|max:255',
            'pre_post_dredge_survey_drawings_file' => 'required|file|mimes:pdf|max:2048',
            'eia_report' => 'required|string|max:255',
            'eia_report_file' => 'required|file|mimes:pdf|max:2048',
        ]);
        
        $documents = [
            'title_document' => 'title_document_file',
            'survey_document' => 'survey_document_file',
            'sand_search_report' => 'sand_search_report_file',
            'cac_certificate' => 'cac_certificate_file',
            'pre_post_dredge_survey_drawings' => 'pre_post_dredge_survey_drawings_file',
            'eia_report' => 'eia_report_file',
        ];
        
        $path = 'documents/';
        $userID = \Auth::user()->id;
        
        foreach ($documents as $titleInput => $fileInput) {
            $title = $request->input($titleInput);
            $file = $request->file($fileInput);
        
            if ($file) {
                $name = $userID . '_documents.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/' . $path), $name);
                $filePath = $path . $name;
        
              $employer_documents =  EmployerDocuments::create([
                    'employer_id' => auth()->user()->id,
                    'title' => $title,
                    'file_path' => $filePath,
                ]);
            }
        }
        
        $payment = Payment::where('employer_id', auth()->user()->id)->where('document_uploads', 1)->latest()->first();

           $payment->document_uploads = 0;
            $payment->save();     
        
        
    }
}