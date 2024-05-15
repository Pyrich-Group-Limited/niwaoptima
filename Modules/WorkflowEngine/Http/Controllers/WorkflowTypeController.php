<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateWorkflowTypeRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateWorkflowTypeRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\WorkflowTypeRepository;
use Illuminate\Http\Request;
use Flash;

class WorkflowTypeController extends AppBaseController
{
    /** @var WorkflowTypeRepository $workflowTypeRepository*/
    private $workflowTypeRepository;

    public function __construct(WorkflowTypeRepository $workflowTypeRepo)
    {
        $this->workflowTypeRepository = $workflowTypeRepo;
    }

    /**
     * Display a listing of the WorkflowType.
     */
    public function index(Request $request)
    {
        $workflowTypes = $this->workflowTypeRepository->paginate(10);

        return view('workflowengine::workflow_types.index')
            ->with('workflowTypes', $workflowTypes);
    }

    /**
     * Show the form for creating a new WorkflowType.
     */
    public function create()
    {
        return view('workflowengine::workflow_types.create');
    }

    /**
     * Store a newly created WorkflowType in storage.
     */
    public function store(CreateWorkflowTypeRequest $request)
    {
        $input = $request->all();

        $workflowType = $this->workflowTypeRepository->create($input);

        Flash::success('Workflow Type saved successfully.');

        return redirect(route('workflowTypes.index'));
    }

    /**
     * Display the specified WorkflowType.
     */
    public function show($id)
    {
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            Flash::error('Workflow Type not found');

            return redirect(route('workflowTypes.index'));
        }

        return view('workflowengine::workflow_types.show')->with('workflowType', $workflowType);
    }

    /**
     * Show the form for editing the specified WorkflowType.
     */
    public function edit($id)
    {
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            Flash::error('Workflow Type not found');

            return redirect(route('workflowTypes.index'));
        }

        return view('workflowengine::workflow_types.edit')->with('workflowType', $workflowType);
    }

    /**
     * Update the specified WorkflowType in storage.
     */
    public function update($id, UpdateWorkflowTypeRequest $request)
    {
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            Flash::error('Workflow Type not found');

            return redirect(route('workflowTypes.index'));
        }

        $workflowType = $this->workflowTypeRepository->update($request->all(), $id);

        Flash::success('Workflow Type updated successfully.');

        return redirect(route('workflowTypes.index'));
    }

    /**
     * Remove the specified WorkflowType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            Flash::error('Workflow Type not found');

            return redirect(route('workflowTypes.index'));
        }

        $this->workflowTypeRepository->delete($id);

        Flash::success('Workflow Type deleted successfully.');

        return redirect(route('workflowTypes.index'));
    }
}
