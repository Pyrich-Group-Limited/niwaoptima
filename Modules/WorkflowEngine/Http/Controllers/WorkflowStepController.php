<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateWorkflowStepRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateWorkflowStepRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\WorkflowStepRepository;
use Illuminate\Http\Request;
use Flash;
use Modules\WorkflowEngine\Repositories\ActorRoleRepository;
use Modules\WorkflowEngine\Repositories\ActorTypeRepository;
use Modules\WorkflowEngine\Repositories\StepActivityRepository;
use Modules\WorkflowEngine\Repositories\StepTypeRepository;
use Modules\WorkflowEngine\Repositories\WorkflowRepository;

class WorkflowStepController extends AppBaseController
{
    /** @var WorkflowStepRepository $workflowStepRepository*/
    private $workflowStepRepository;

    /** @var WorkflowRepository $workflowRepository*/
    private $workflowRepository;

    /** @var ActorTypeRepository $actorTypeRepository*/
    private $actorTypeRepository;

    /** @var ActorRoleRepository $actorRoleRepository*/
    private $actorRoleRepository;

    /** @var StepTypeRepository $stepTypeRepository*/
    private $stepTypeRepository;

    /** @var StepActivityRepository $stepActivityRepository*/
    private $stepActivityRepository;

    public function __construct(WorkflowStepRepository $workflowStepRepo, WorkflowRepository $workflowRepo, ActorTypeRepository $actorTypeRepo, ActorRoleRepository $actorRoleRepo, StepTypeRepository $stepTypeRepo, StepActivityRepository $stepActivityRepo)
    {
        $this->workflowStepRepository = $workflowStepRepo;
        $this->workflowRepository = $workflowRepo;
        $this->actorTypeRepository = $actorTypeRepo;
        $this->actorTypeRepository = $actorTypeRepo;
        $this->actorRoleRepository = $actorRoleRepo;
        $this->stepTypeRepository = $stepTypeRepo;
        $this->stepActivityRepository = $stepActivityRepo;
    }

    /**
     * Display a listing of the WorkflowStep.
     */
    public function index(Request $request)
    {
        $workflowSteps = $this->workflowStepRepository->paginate(10);

        return view('workflowengine::workflow_steps.index')
            ->with('workflowSteps', $workflowSteps);
    }

    /**
     * Show the form for creating a new WorkflowStep.
     */
    public function create()
    {
        $workflow_steps = $this->workflowStepRepository->all()->pluck('step_name', 'id');
        $workflow_steps->prepend('Select workflow step', '');

        $workflows = $this->workflowRepository->all()->pluck('workflow_name', 'id');
        $workflows->prepend('Select workflow', '');

        $actor_types = $this->actorTypeRepository->all()->pluck('actor_type', 'id');
        $actor_types->prepend('Select actor type', '');

        $actor_roles = $this->actorRoleRepository->all()->pluck('actor_role', 'id');
        $actor_roles->prepend('Select actor role', '');

        $step_types = $this->stepTypeRepository->all()->pluck('step_type', 'id');
        $step_types->prepend('Select step type', '');

        $step_activities = $this->stepActivityRepository->all()->pluck('step_activity', 'id');
        $step_activities->prepend('Select step activity', '');

        return view('workflowengine::workflow_steps.create')->with(['workflow_steps' => $workflow_steps, 'workflows' => $workflows, 'actor_types' => $actor_types, 'actor_roles' => $actor_roles, 'step_types' => $step_types, 'step_activities' => $step_activities]);
    }

    /**
     * Store a newly created WorkflowStep in storage.
     */
    public function store(CreateWorkflowStepRequest $request)
    {
        $input = $request->all();

        $workflowStep = $this->workflowStepRepository->create($input);

        Flash::success('Workflow Step saved successfully.');

        return redirect(route('workflowSteps.index'));
    }

    /**
     * Display the specified WorkflowStep.
     */
    public function show($id)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        return view('workflowengine::workflow_steps.show')->with('workflowStep', $workflowStep);
    }

    /**
     * Show the form for editing the specified WorkflowStep.
     */
    public function edit($id)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        $workflow_steps = $this->workflowStepRepository->all()->pluck('step_name', 'id');
        $workflow_steps->prepend('Select workflow step', '');

        $workflows = $this->workflowRepository->all()->pluck('workflow_name', 'id');
        $workflows->prepend('Select workflow', '');

        $actor_types = $this->actorTypeRepository->all()->pluck('actor_type', 'id');
        $actor_types->prepend('Select actor type', '');

        $actor_roles = $this->actorRoleRepository->all()->pluck('actor_role', 'id');
        $actor_roles->prepend('Select actor role', '');

        $step_types = $this->stepTypeRepository->all()->pluck('step_type', 'id');
        $step_types->prepend('Select step type', '');

        $step_activities = $this->stepActivityRepository->all()->pluck('step_activity', 'id');
        $step_activities->prepend('Select step activity', '');

        return view('workflowengine::workflow_steps.edit')->with(['workflowStep' => $workflowStep, 'workflow_steps' => $workflow_steps, 'workflows' => $workflows, 'actor_types' => $actor_types, 'actor_roles' => $actor_roles, 'step_types' => $step_types, 'step_activities' => $step_activities]);
    }

    /**
     * Update the specified WorkflowStep in storage.
     */
    public function update($id, UpdateWorkflowStepRequest $request)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        $workflowStep = $this->workflowStepRepository->update($request->all(), $id);

        Flash::success('Workflow Step updated successfully.');

        return redirect(route('workflowSteps.index'));
    }

    /**
     * Remove the specified WorkflowStep from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            Flash::error('Workflow Step not found');

            return redirect(route('workflowSteps.index'));
        }

        $this->workflowStepRepository->delete($id);

        Flash::success('Workflow Step deleted successfully.');

        return redirect(route('workflowSteps.index'));
    }
}
