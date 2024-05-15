<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateWorkflowInstanceAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateWorkflowInstanceAPIRequest;
use Modules\WorkflowEngine\Models\WorkflowInstance;
use Modules\WorkflowEngine\Repositories\WorkflowInstanceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\WorkflowInstanceResource;

/**
 * Class WorkflowInstanceController
 */

class WorkflowInstanceAPIController extends AppBaseController
{
    /** @var  WorkflowInstanceRepository */
    private $workflowInstanceRepository;

    public function __construct(WorkflowInstanceRepository $workflowInstanceRepo)
    {
        $this->workflowInstanceRepository = $workflowInstanceRepo;
    }

    /**
     * @OA\Get(
     *      path="/workflow-instances",
     *      summary="getWorkflowInstanceList",
     *      tags={"WorkflowInstance"},
     *      description="Get all WorkflowInstances",
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
     *                  @OA\Items(ref="#/components/schemas/WorkflowInstance")
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
        $workflowInstances = $this->workflowInstanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(WorkflowInstanceResource::collection($workflowInstances), 'Workflow Instances retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/workflow-instances",
     *      summary="createWorkflowInstance",
     *      tags={"WorkflowInstance"},
     *      description="Create WorkflowInstance",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowInstance")
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
     *                  ref="#/components/schemas/WorkflowInstance"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowInstanceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $workflowInstance = $this->workflowInstanceRepository->create($input);

        return $this->sendResponse(new WorkflowInstanceResource($workflowInstance), 'Workflow Instance saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/workflow-instances/{id}",
     *      summary="getWorkflowInstanceItem",
     *      tags={"WorkflowInstance"},
     *      description="Get WorkflowInstance",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowInstance",
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
     *                  ref="#/components/schemas/WorkflowInstance"
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
        /** @var WorkflowInstance $workflowInstance */
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            return $this->sendError('Workflow Instance not found');
        }

        return $this->sendResponse(new WorkflowInstanceResource($workflowInstance), 'Workflow Instance retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/workflow-instances/{id}",
     *      summary="updateWorkflowInstance",
     *      tags={"WorkflowInstance"},
     *      description="Update WorkflowInstance",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowInstance",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowInstance")
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
     *                  ref="#/components/schemas/WorkflowInstance"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowInstanceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var WorkflowInstance $workflowInstance */
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            return $this->sendError('Workflow Instance not found');
        }

        $workflowInstance = $this->workflowInstanceRepository->update($input, $id);

        return $this->sendResponse(new WorkflowInstanceResource($workflowInstance), 'WorkflowInstance updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/workflow-instances/{id}",
     *      summary="deleteWorkflowInstance",
     *      tags={"WorkflowInstance"},
     *      description="Delete WorkflowInstance",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowInstance",
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
        /** @var WorkflowInstance $workflowInstance */
        $workflowInstance = $this->workflowInstanceRepository->find($id);

        if (empty($workflowInstance)) {
            return $this->sendError('Workflow Instance not found');
        }

        $workflowInstance->delete();

        return $this->sendSuccess('Workflow Instance deleted successfully');
    }
}
