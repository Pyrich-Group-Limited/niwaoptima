<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateWorkflowActivityRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateWorkflowActivityRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\WorkflowActivityRepository;
use Illuminate\Http\Request;
use Flash;

class WorkflowActivityController extends AppBaseController
{
    /** @var WorkflowActivityRepository $workflowActivityRepository*/
    private $workflowActivityRepository;

    public function __construct(WorkflowActivityRepository $workflowActivityRepo)
    {
        $this->workflowActivityRepository = $workflowActivityRepo;
    }

    /**
     * Display a listing of the WorkflowActivity.
     */
    public function index(Request $request)
    {
        $workflowActivities = $this->workflowActivityRepository->paginate(10);

        return view('workflowengine::workflow_activities.index')
            ->with('workflowActivities', $workflowActivities);
    }

    /**
     * Show the form for creating a new WorkflowActivity.
     */
    public function create()
    {
        return view('workflowengine::workflow_activities.create');
    }

    /**
     * Store a newly created WorkflowActivity in storage.
     */
    public function store(CreateWorkflowActivityRequest $request)
    {
        $input = $request->all();

        $workflowActivity = $this->workflowActivityRepository->create($input);

        Flash::success('Workflow Activity saved successfully.');

        return redirect(route('workflowActivities.index'));
    }

    /**
     * Display the specified WorkflowActivity.
     */
    public function show($id)
    {
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            Flash::error('Workflow Activity not found');

            return redirect(route('workflowActivities.index'));
        }

        return view('workflowengine::workflow_activities.show')->with('workflowActivity', $workflowActivity);
    }

    /**
     * Show the form for editing the specified WorkflowActivity.
     */
    public function edit($id)
    {
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            Flash::error('Workflow Activity not found');

            return redirect(route('workflowActivities.index'));
        }

        return view('workflowengine::workflow_activities.edit')->with('workflowActivity', $workflowActivity);
    }

    /**
     * Update the specified WorkflowActivity in storage.
     */
    public function update($id, UpdateWorkflowActivityRequest $request)
    {
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            Flash::error('Workflow Activity not found');

            return redirect(route('workflowActivities.index'));
        }

        $workflowActivity = $this->workflowActivityRepository->update($request->all(), $id);

        Flash::success('Workflow Activity updated successfully.');

        return redirect(route('workflowActivities.index'));
    }

    /**
     * Remove the specified WorkflowActivity from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            Flash::error('Workflow Activity not found');

            return redirect(route('workflowActivities.index'));
        }

        $this->workflowActivityRepository->delete($id);

        Flash::success('Workflow Activity deleted successfully.');

        return redirect(route('workflowActivities.index'));
    }
}
