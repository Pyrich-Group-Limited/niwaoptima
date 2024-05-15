<?php

namespace Modules\DocumentManager\Http\Controllers;

use Modules\DocumentManager\Http\Requests\CreateDocumentVersionRequest;
use Modules\DocumentManager\Http\Requests\UpdateDocumentVersionRequest;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Illuminate\Http\Request;
use Flash;

class DocumentVersionController extends AppBaseController
{
    /** @var DocumentVersionRepository $documentVersionRepository*/
    private $documentVersionRepository;

    public function __construct(DocumentVersionRepository $documentVersionRepo)
    {
        $this->documentVersionRepository = $documentVersionRepo;
    }

    /**
     * Display a listing of the DocumentVersion.
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new DocumentVersion.
     */
    public function create()
    {

    }

    /**
     * Store a newly created DocumentVersion in storage.
     */
    public function store(CreateDocumentVersionRequest $request)
    {

    }

    /**
     * Display the specified DocumentVersion.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified DocumentVersion.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified DocumentVersion in storage.
     */
    public function update($id, UpdateDocumentVersionRequest $request)
    {

    }

    /**
     * Remove the specified DocumentVersion from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {

    }
}
