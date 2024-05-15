<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateWorkflowInstanceRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateWorkflowInstanceRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\WorkflowInstanceRepository;
use Illuminate\Http\Request;
use Flash;

class WorkflowInstanceController extends AppBaseController
{
    /** @var WorkflowInstanceRepository $workflowInstanceRepository*/
    private $workflowInstanceRepository;

    public function __construct(WorkflowInstanceRepository $workflowInstanceRepo)
    {
        $this->workflowInstanceRepository = $workflowInstanceRepo;
    }

    /**
     * Display a listing of the WorkflowInstance.
     */
    public function index(Request $request)
    {
        $workflowInstances = $this->workflowInstanceRepository->paginate(10);

        return view('workflowengine::workflow_instances.index')
            ->with('workflowInstances', $workflowInstances);
    }

    /**
     * Show the form for creating a new WorkflowInstance.
     */
    public function create()
    {
        return view('workflowengine::workflow_instances.create');
    }

    /**
     * Store a newly created WorkflowInstance in storage.
     */
    public function store(CreateWorkflowInstanceRequest $request)
    {
        $input = $request->all();

        $workflowInstance = $this->workflowInstanceRepository->create($input);

        Flash::success('Workflow Instance saved successfully.');

        return redirect(route('workflowInstances.index'));
    }

    /**
     * Display the specified WorkflowInstance.
     */
    public function show($id)
    {
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            Flash::error('Workflow Instance not found');

            return redirect(route('workflowInstances.index'));
        }

        return view('workflowengine::workflow_instances.show')->with('workflowInstance', $workflowInstance);
    }

    /**
     * Show the form for editing the specified WorkflowInstance.
     */
    public function edit($id)
    {
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            Flash::error('Workflow Instance not found');

            return redirect(route('workflowInstances.index'));
        }

        return view('workflowengine::workflow_instances.edit')->with('workflowInstance', $workflowInstance);
    }

    /**
     * Update the specified WorkflowInstance in storage.
     */
    public function update($id, UpdateWorkflowInstanceRequest $request)
    {
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            Flash::error('Workflow Instance not found');

            return redirect(route('workflowInstances.index'));
        }

        $workflowInstance = $this->workflowInstanceRepository->update($request->all(), $id);

        Flash::success('Workflow Instance updated successfully.');

        return redirect(route('workflowInstances.index'));
    }

    /**
     * Remove the specified WorkflowInstance from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            Flash::error('Workflow Instance not found');

            return redirect(route('workflowInstances.index'));
        }

        $this->workflowInstanceRepository->delete($id);

        Flash::success('Workflow Instance deleted successfully.');

        return redirect(route('workflowInstances.index'));
    }
}
