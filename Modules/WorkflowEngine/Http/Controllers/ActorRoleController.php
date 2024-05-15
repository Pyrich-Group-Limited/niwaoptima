<?php

namespace Modules\WorkflowEngine\Http\Controllers;

use Modules\WorkflowEngine\Http\Requests\CreateActorRoleRequest;
use Modules\WorkflowEngine\Http\Requests\UpdateActorRoleRequest;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Repositories\ActorRoleRepository;
use Illuminate\Http\Request;
use Flash;

class ActorRoleController extends AppBaseController
{
    /** @var ActorRoleRepository $actorRoleRepository*/
    private $actorRoleRepository;

    public function __construct(ActorRoleRepository $actorRoleRepo)
    {
        $this->actorRoleRepository = $actorRoleRepo;
    }

    /**
     * Display a listing of the ActorRole.
     */
    public function index(Request $request)
    {
        $actorRoles = $this->actorRoleRepository->paginate(10);

        return view('workflowengine::actor_roles.index')
            ->with('actorRoles', $actorRoles);
    }

    /**
     * Show the form for creating a new ActorRole.
     */
    public function create()
    {
        return view('workflowengine::actor_roles.create');
    }

    /**
     * Store a newly created ActorRole in storage.
     */
    public function store(CreateActorRoleRequest $request)
    {
        $input = $request->all();

        $actorRole = $this->actorRoleRepository->create($input);

        Flash::success('Actor Role saved successfully.');

        return redirect(route('actorRoles.index'));
    }

    /**
     * Display the specified ActorRole.
     */
    public function show($id)
    {
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            Flash::error('Actor Role not found');

            return redirect(route('actorRoles.index'));
        }

        return view('workflowengine::actor_roles.show')->with('actorRole', $actorRole);
    }

    /**
     * Show the form for editing the specified ActorRole.
     */
    public function edit($id)
    {
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            Flash::error('Actor Role not found');

            return redirect(route('actorRoles.index'));
        }

        return view('workflowengine::actor_roles.edit')->with('actorRole', $actorRole);
    }

    /**
     * Update the specified ActorRole in storage.
     */
    public function update($id, UpdateActorRoleRequest $request)
    {
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            Flash::error('Actor Role not found');

            return redirect(route('actorRoles.index'));
        }

        $actorRole = $this->actorRoleRepository->update($request->all(), $id);

        Flash::success('Actor Role updated successfully.');

        return redirect(route('actorRoles.index'));
    }

    /**
     * Remove the specified ActorRole from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            Flash::error('Actor Role not found');

            return redirect(route('actorRoles.index'));
        }

        $this->actorRoleRepository->delete($id);

        Flash::success('Actor Role deleted successfully.');

        return redirect(route('actorRoles.index'));
    }
}
