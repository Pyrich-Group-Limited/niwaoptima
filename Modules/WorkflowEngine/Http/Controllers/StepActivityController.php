<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateStepActivityRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateStepActivityRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\StepActivityRepository;
use Illuminate\Http\Request;
use Flash;

class StepActivityController extends AppBaseController
{
    /** @var StepActivityRepository $stepActivityRepository*/
    private $stepActivityRepository;

    public function __construct(StepActivityRepository $stepActivityRepo)
    {
        $this->stepActivityRepository = $stepActivityRepo;
    }

    /**
     * Display a listing of the StepActivity.
     */
    public function index(Request $request)
    {
        $stepActivities = $this->stepActivityRepository->paginate(10);

        return view('workflowengine::step_activities.index')
            ->with('stepActivities', $stepActivities);
    }

    /**
     * Show the form for creating a new StepActivity.
     */
    public function create()
    {
        return view('workflowengine::step_activities.create');
    }

    /**
     * Store a newly created StepActivity in storage.
     */
    public function store(CreateStepActivityRequest $request)
    {
        $input = $request->all();

        $stepActivity = $this->stepActivityRepository->create($input);

        Flash::success('Step Activity saved successfully.');

        return redirect(route('stepActivities.index'));
    }

    /**
     * Display the specified StepActivity.
     */
    public function show($id)
    {
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            Flash::error('Step Activity not found');

            return redirect(route('stepActivities.index'));
        }

        return view('workflowengine::step_activities.show')->with('stepActivity', $stepActivity);
    }

    /**
     * Show the form for editing the specified StepActivity.
     */
    public function edit($id)
    {
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            Flash::error('Step Activity not found');

            return redirect(route('stepActivities.index'));
        }

        return view('workflowengine::step_activities.edit')->with('stepActivity', $stepActivity);
    }

    /**
     * Update the specified StepActivity in storage.
     */
    public function update($id, UpdateStepActivityRequest $request)
    {
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            Flash::error('Step Activity not found');

            return redirect(route('stepActivities.index'));
        }

        $stepActivity = $this->stepActivityRepository->update($request->all(), $id);

        Flash::success('Step Activity updated successfully.');

        return redirect(route('stepActivities.index'));
    }

    /**
     * Remove the specified StepActivity from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            Flash::error('Step Activity not found');

            return redirect(route('stepActivities.index'));
        }

        $this->stepActivityRepository->delete($id);

        Flash::success('Step Activity deleted successfully.');

        return redirect(route('stepActivities.index'));
    }
}
