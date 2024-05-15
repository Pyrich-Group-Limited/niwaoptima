<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateWorkflowActivityAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateWorkflowActivityAPIRequest;
use Modules\WorkflowEngine\Models\WorkflowActivity;
use Modules\WorkflowEngine\Repositories\WorkflowActivityRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\WorkflowActivityResource;

/**
 * Class WorkflowActivityController
 */

class WorkflowActivityAPIController extends AppBaseController
{
    /** @var  WorkflowActivityRepository */
    private $workflowActivityRepository;

    public function __construct(WorkflowActivityRepository $workflowActivityRepo)
    {
        $this->workflowActivityRepository = $workflowActivityRepo;
    }

    /**
     * @OA\Get(
     *      path="/workflow-activities",
     *      summary="getWorkflowActivityList",
     *      tags={"WorkflowActivity"},
     *      description="Get all WorkflowActivities",
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
     *                  @OA\Items(ref="#/components/schemas/WorkflowActivity")
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
        $workflowActivities = $this->workflowActivityRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(WorkflowActivityResource::collection($workflowActivities), 'Workflow Activities retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/workflow-activities",
     *      summary="createWorkflowActivity",
     *      tags={"WorkflowActivity"},
     *      description="Create WorkflowActivity",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowActivity")
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
     *                  ref="#/components/schemas/WorkflowActivity"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowActivityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $workflowActivity = $this->workflowActivityRepository->create($input);

        return $this->sendResponse(new WorkflowActivityResource($workflowActivity), 'Workflow Activity saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/workflow-activities/{id}",
     *      summary="getWorkflowActivityItem",
     *      tags={"WorkflowActivity"},
     *      description="Get WorkflowActivity",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowActivity",
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
     *                  ref="#/components/schemas/WorkflowActivity"
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
        /** @var WorkflowActivity $workflowActivity */
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            return $this->sendError('Workflow Activity not found');
        }

        return $this->sendResponse(new WorkflowActivityResource($workflowActivity), 'Workflow Activity retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/workflow-activities/{id}",
     *      summary="updateWorkflowActivity",
     *      tags={"WorkflowActivity"},
     *      description="Update WorkflowActivity",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowActivity",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowActivity")
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
     *                  ref="#/components/schemas/WorkflowActivity"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowActivityAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var WorkflowActivity $workflowActivity */
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            return $this->sendError('Workflow Activity not found');
        }

        $workflowActivity = $this->workflowActivityRepository->update($input, $id);

        return $this->sendResponse(new WorkflowActivityResource($workflowActivity), 'WorkflowActivity updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/workflow-activities/{id}",
     *      summary="deleteWorkflowActivity",
     *      tags={"WorkflowActivity"},
     *      description="Delete WorkflowActivity",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowActivity",
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
        /** @var WorkflowActivity $workflowActivity */
        $workflowActivity = $this->workflowActivityRepository->find($id);

        if (empty($workflowActivity)) {
            return $this->sendError('Workflow Activity not found');
        }

        $workflowActivity->delete();

        return $this->sendSuccess('Workflow Activity deleted successfully');
    }
}
