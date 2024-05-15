<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateStepActivityAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateStepActivityAPIRequest;
use Modules\WorkflowEngine\Models\StepActivity;
use Modules\WorkflowEngine\Repositories\StepActivityRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\StepActivityResource;

/**
 * Class StepActivityController
 */

class StepActivityAPIController extends AppBaseController
{
    /** @var  StepActivityRepository */
    private $stepActivityRepository;

    public function __construct(StepActivityRepository $stepActivityRepo)
    {
        $this->stepActivityRepository = $stepActivityRepo;
    }

    /**
     * @OA\Get(
     *      path="/step-activities",
     *      summary="getStepActivityList",
     *      tags={"StepActivity"},
     *      description="Get all StepActivities",
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
     *                  @OA\Items(ref="#/components/schemas/StepActivity")
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
        $stepActivities = $this->stepActivityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StepActivityResource::collection($stepActivities), 'Step Activities retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/step-activities",
     *      summary="createStepActivity",
     *      tags={"StepActivity"},
     *      description="Create StepActivity",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/StepActivity")
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
     *                  ref="#/components/schemas/StepActivity"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStepActivityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $stepActivity = $this->stepActivityRepository->create($input);

        return $this->sendResponse(new StepActivityResource($stepActivity), 'Step Activity saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/step-activities/{id}",
     *      summary="getStepActivityItem",
     *      tags={"StepActivity"},
     *      description="Get StepActivity",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of StepActivity",
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
     *                  ref="#/components/schemas/StepActivity"
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
        /** @var StepActivity $stepActivity */
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            return $this->sendError('Step Activity not found');
        }

        return $this->sendResponse(new StepActivityResource($stepActivity), 'Step Activity retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/step-activities/{id}",
     *      summary="updateStepActivity",
     *      tags={"StepActivity"},
     *      description="Update StepActivity",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of StepActivity",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/StepActivity")
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
     *                  ref="#/components/schemas/StepActivity"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStepActivityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var StepActivity $stepActivity */
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            return $this->sendError('Step Activity not found');
        }

        $stepActivity = $this->stepActivityRepository->update($input, $id);

        return $this->sendResponse(new StepActivityResource($stepActivity), 'StepActivity updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/step-activities/{id}",
     *      summary="deleteStepActivity",
     *      tags={"StepActivity"},
     *      description="Delete StepActivity",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of StepActivity",
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
        /** @var StepActivity $stepActivity */
        $stepActivity = $this->stepActivityRepository->find($id);

        if (empty($stepActivity)) {
            return $this->sendError('Step Activity not found');
        }

        $stepActivity->delete();

        return $this->sendSuccess('Step Activity deleted successfully');
    }
}
