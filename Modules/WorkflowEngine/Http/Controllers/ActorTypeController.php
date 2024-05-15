<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateActorTypeRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateActorTypeRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\ActorTypeRepository;
use Illuminate\Http\Request;
use Flash;

class ActorTypeController extends AppBaseController
{
    /** @var ActorTypeRepository $actorTypeRepository*/
    private $actorTypeRepository;

    public function __construct(ActorTypeRepository $actorTypeRepo)
    {
        $this->actorTypeRepository = $actorTypeRepo;
    }

    /**
     * Display a listing of the ActorType.
     */
    public function index(Request $request)
    {
        $actorTypes = $this->actorTypeRepository->paginate(10);

        return view('workflowengine::actor_types.index')
            ->with('actorTypes', $actorTypes);
    }

    /**
     * Show the form for creating a new ActorType.
     */
    public function create()
    {
        return view('workflowengine::actor_types.create');
    }

    /**
     * Store a newly created ActorType in storage.
     */
    public function store(CreateActorTypeRequest $request)
    {
        $input = $request->all();

        $actorType = $this->actorTypeRepository->create($input);

        Flash::success('Actor Type saved successfully.');

        return redirect(route('actorTypes.index'));
    }

    /**
     * Display the specified ActorType.
     */
    public function show($id)
    {
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            Flash::error('Actor Type not found');

            return redirect(route('actorTypes.index'));
        }

        return view('workflowengine::actor_types.show')->with('actorType', $actorType);
    }

    /**
     * Show the form for editing the specified ActorType.
     */
    public function edit($id)
    {
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            Flash::error('Actor Type not found');

            return redirect(route('actorTypes.index'));
        }

        return view('workflowengine::actor_types.edit')->with('actorType', $actorType);
    }

    /**
     * Update the specified ActorType in storage.
     */
    public function update($id, UpdateActorTypeRequest $request)
    {
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            Flash::error('Actor Type not found');

            return redirect(route('actorTypes.index'));
        }

        $actorType = $this->actorTypeRepository->update($request->all(), $id);

        Flash::success('Actor Type updated successfully.');

        return redirect(route('actorTypes.index'));
    }

    /**
     * Remove the specified ActorType from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            Flash::error('Actor Type not found');

            return redirect(route('actorTypes.index'));
        }

        $this->actorTypeRepository->delete($id);

        Flash::success('Actor Type deleted successfully.');

        return redirect(route('actorTypes.index'));
    }
}
