<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateStepTypeAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateStepTypeAPIRequest;
use Modules\WorkflowEngine\Models\StepType;
use Modules\WorkflowEngine\Repositories\StepTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\StepTypeResource;

/**
 * Class StepTypeController
 */

class StepTypeAPIController extends AppBaseController
{
    /** @var  StepTypeRepository */
    private $stepTypeRepository;

    public function __construct(StepTypeRepository $stepTypeRepo)
    {
        $this->stepTypeRepository = $stepTypeRepo;
    }

    /**
     * @OA\Get(
     *      path="/step-types",
     *      summary="getStepTypeList",
     *      tags={"StepType"},
     *      description="Get all StepTypes",
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
     *                  @OA\Items(ref="#/components/schemas/StepType")
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
        $stepTypes = $this->stepTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StepTypeResource::collection($stepTypes), 'Step Types retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/step-types",
     *      summary="createStepType",
     *      tags={"StepType"},
     *      description="Create StepType",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/StepType")
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
     *                  ref="#/components/schemas/StepType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStepTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $stepType = $this->stepTypeRepository->create($input);

        return $this->sendResponse(new StepTypeResource($stepType), 'Step Type saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/step-types/{id}",
     *      summary="getStepTypeItem",
     *      tags={"StepType"},
     *      description="Get StepType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of StepType",
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
     *                  ref="#/components/schemas/StepType"
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
        /** @var StepType $stepType */
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            return $this->sendError('Step Type not found');
        }

        return $this->sendResponse(new StepTypeResource($stepType), 'Step Type retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/step-types/{id}",
     *      summary="updateStepType",
     *      tags={"StepType"},
     *      description="Update StepType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of StepType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/StepType")
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
     *                  ref="#/components/schemas/StepType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStepTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var StepType $stepType */
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            return $this->sendError('Step Type not found');
        }

        $stepType = $this->stepTypeRepository->update($input, $id);

        return $this->sendResponse(new StepTypeResource($stepType), 'StepType updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/step-types/{id}",
     *      summary="deleteStepType",
     *      tags={"StepType"},
     *      description="Delete StepType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of StepType",
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
        /** @var StepType $stepType */
        $stepType = $this->stepTypeRepository->find($id);

        if (empty($stepType)) {
            return $this->sendError('Step Type not found');
        }

        $stepType->delete();

        return $this->sendSuccess('Step Type deleted successfully');
    }
}
