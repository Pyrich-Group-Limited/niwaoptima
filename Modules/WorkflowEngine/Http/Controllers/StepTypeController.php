<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateStepTypeRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateStepTypeRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\StepTypeRepository;
use Illuminate\Http\Request;
use Flash;

class StepTypeController extends AppBaseController
{
    /** @var StepTypeRepository $stepTypeRepository*/
    private $stepTypeRepository;

    public function __construct(StepTypeRepository $stepTypeRepo)
    {
        $this->stepTypeRepository = $stepTypeRepo;
    }

    /**
     * Display a listing of the StepType.
     */
    public function index(Request $request)
    {
        $stepTypes = $this->stepTypeRepository->paginate(10);

        return view('workflowengine::step_types.index')
            ->with('stepTypes', $stepTypes);
    }

    /**
     * Show the form for creating a new StepType.
     */
    public function create()
    {
        return view('workflowengine::step_types.create');
    }

    /**
     * Store a newly created StepType in storage.
     */
    public function store(CreateStepTypeRequest $request)
    {
        $input = $request->all();

        $stepType = $this->stepTypeRepository->create($input);

        Flash::success('Step Type saved successfully.');

        return redirect(route('stepTypes.index'));
    }

    /**
     * Display the specified StepType.
     */
    public function show($id)
    {
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            Flash::error('Step Type not found');

            return redirect(route('stepTypes.index'));
        }

        return view('workflowengine::step_types.show')->with('stepType', $stepType);
    }

    /**
     * Show the form for editing the specified StepType.
     */
    public function edit($id)
    {
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            Flash::error('Step Type not found');

            return redirect(route('stepTypes.index'));
        }

        return view('workflowengine::step_types.edit')->with('stepType', $stepType);
    }

    /**
     * Update the specified StepType in storage.
     */
    public function update($id, UpdateStepTypeRequest $request)
    {
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            Flash::error('Step Type not found');

            return redirect(route('stepTypes.index'));
        }

        $stepType = $this->stepTypeRepository->update($request->all(), $id);

        Flash::success('Step Type updated successfully.');

        return redirect(route('stepTypes.index'));
    }

    /**
     * Remove the specified StepType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            Flash::error('Step Type not found');

            return redirect(route('stepTypes.index'));
        }

        $this->stepTypeRepository->delete($id);

        Flash::success('Step Type deleted successfully.');

        return redirect(route('stepTypes.index'));
    }
}
