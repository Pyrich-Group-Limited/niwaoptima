<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateActorTypeAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateActorTypeAPIRequest;
use Modules\WorkflowEngine\Models\ActorType;
use Modules\WorkflowEngine\Repositories\ActorTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\ActorTypeResource;

/**
 * Class ActorTypeController
 */

class ActorTypeAPIController extends AppBaseController
{
    /** @var  ActorTypeRepository */
    private $actorTypeRepository;

    public function __construct(ActorTypeRepository $actorTypeRepo)
    {
        $this->actorTypeRepository = $actorTypeRepo;
    }

    /**
     * @OA\Get(
     *      path="/actor-types",
     *      summary="getActorTypeList",
     *      tags={"ActorType"},
     *      description="Get all ActorTypes",
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
     *                  @OA\Items(ref="#/components/schemas/ActorType")
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
        $actorTypes = $this->actorTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ActorTypeResource::collection($actorTypes), 'Actor Types retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/actor-types",
     *      summary="createActorType",
     *      tags={"ActorType"},
     *      description="Create ActorType",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ActorType")
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
     *                  ref="#/components/schemas/ActorType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateActorTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $actorType = $this->actorTypeRepository->create($input);

        return $this->sendResponse(new ActorTypeResource($actorType), 'Actor Type saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/actor-types/{id}",
     *      summary="getActorTypeItem",
     *      tags={"ActorType"},
     *      description="Get ActorType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ActorType",
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
     *                  ref="#/components/schemas/ActorType"
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
        /** @var ActorType $actorType */
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            return $this->sendError('Actor Type not found');
        }

        return $this->sendResponse(new ActorTypeResource($actorType), 'Actor Type retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/actor-types/{id}",
     *      summary="updateActorType",
     *      tags={"ActorType"},
     *      description="Update ActorType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ActorType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/ActorType")
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
     *                  ref="#/components/schemas/ActorType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateActorTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var ActorType $actorType */
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            return $this->sendError('Actor Type not found');
        }

        $actorType = $this->actorTypeRepository->update($input, $id);

        return $this->sendResponse(new ActorTypeResource($actorType), 'ActorType updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/actor-types/{id}",
     *      summary="deleteActorType",
     *      tags={"ActorType"},
     *      description="Delete ActorType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of ActorType",
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
        /** @var ActorType $actorType */
        $actorType = $this->actorTypeRepository->find($id);

        if (empty($actorType)) {
            return $this->sendError('Actor Type not found');
        }

        $actorType->delete();

        return $this->sendSuccess('Actor Type deleted successfully');
    }
}
