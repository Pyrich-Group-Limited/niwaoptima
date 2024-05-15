<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentUploadRequest;
use App\Http\Requests\UpdateDocumentUploadRequest;
use App\Models\DocumentUpload;
use App\Models\Service;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;

class DocumentUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DocumentUpload::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
            ->orWhereHas('service', function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
          });
        }
    
    
        $document_uploads = $query->orderBy('id', 'asc')->paginate(10);


        return view('document_upload.index', compact('document_uploads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $services = Service::where('branch_id', 1)->get();
        return view('document_upload.create', compact(['services','branches']));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentUploadRequest $request)
    {
        $validated = $request->validated();
        $check = DocumentUpload::where('name', $request->input('name'))->where('service_id', $request->input('service_id'))->first();
        if($check){
            return redirect()->route('document_upload.create')->with('error', 'Document upload already exist in this area office!');
        }
        DocumentUpload::create($validated);
        return redirect()->route('document_upload.index')->with('success', 'Document upload added successfully!');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(DocumentUpload $document_upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentUpload $document_upload)
    {
        $branches = Branch::all();
        $services = Service::where('branch_id', 1)->get();
        return view('document_upload.edit', compact(['document_upload', 'services', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentUploadRequest $request, DocumentUpload $document_upload)
    {
        $validated = $request->validated();
        $document_upload->update($validated);
        return redirect()->route('document_upload.index')->with('success', 'Document upload udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DocumentUpload $document_upload)
    {
        if ($document_upload->delete())
            return redirect()->back()->with('success', 'Document upload deleted successfully!');
        return redirect()->back()->with('error', 'Document upload could not be deleted!');
    }

    public function deleteSelectedItems(Request $request)
    {
        // Handle deletion of selected items here
        $selectedIds = $request->input('selectedIds');
        
        // Perform deletion logic using the selected IDs
        try {
            DB::beginTransaction();
            foreach ($selectedIds as $id) {
                $application_form_fee = DocumentUpload::find($id);
                if ($application_form_fee) {
                    $application_form_fee->delete();
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Document upload names deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'An error occurred while deleting document upload names.', 'error' => $e->getMessage()]);
        }
    }

    
}
