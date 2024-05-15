<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateActorRoleAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateActorRoleAPIRequest;
use Modules\WorkflowEngine\Models\ActorRole;
use Modules\WorkflowEngine\Repositories\ActorRoleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\ActorRoleResource;

/**
 * Class ActorRoleController
 */

class ActorRoleAPIController extends AppBaseController
{
    /** @var  ActorRoleRepository */
    private $actorRoleRepository;

    public function __construct(ActorRoleRepository $actorRoleRepo)
    {
        $this->actorRoleRepository = $actorRoleRepo;
    }

    /**
     * @OA\Get(
     *      path="/actor-roles",
     *      summary="getActorRoleList",
     *      tags={"ActorRole"},
     *      description="Get all ActorRoles",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/ActorRole")
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request): JsonResponse
    {
        $actorRoles = $this->actorRoleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ActorRoleResource::collection($actorRoles), 'Actor Roles retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/actor-roles",
     *      summary="createActorRole",
     *      tags={"ActorRole"},
     *      description="Create ActorRole",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ActorRole")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/ActorRole"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateActorRoleAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $actorRole = $this->actorRoleRepository->create($input);

        return $this->sendResponse(new ActorRoleResource($actorRole), 'Actor Role saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/actor-roles/{id}",
     *      summary="getActorRoleItem",
     *      tags={"ActorRole"},
     *      description="Get ActorRole",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ActorRole",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/ActorRole"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id): JsonResponse
    {
        /** @var ActorRole $actorRole */
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            return $this->sendError('Actor Role not found');
        }

        return $this->sendResponse(new ActorRoleResource($actorRole), 'Actor Role retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/actor-roles/{id}",
     *      summary="updateActorRole",
     *      tags={"ActorRole"},
     *      description="Update ActorRole",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ActorRole",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ActorRole")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/components/schemas/ActorRole"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateActorRoleAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ActorRole $actorRole */
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            return $this->sendError('Actor Role not found');
        }

        $actorRole = $this->actorRoleRepository->update($input, $id);

        return $this->sendResponse(new ActorRoleResource($actorRole), 'ActorRole updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/actor-roles/{id}",
     *      summary="deleteActorRole",
     *      tags={"ActorRole"},
     *      description="Delete ActorRole",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ActorRole",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id): JsonResponse
    {
        /** @var ActorRole $actorRole */
        $actorRole = $this->actorRoleRepository->find($id);

        if (empty($actorRole)) {
            return $this->sendError('Actor Role not found');
        }

        $actorRole->delete();

        return $this->sendSuccess('Actor Role deleted successfully');
    }
}
