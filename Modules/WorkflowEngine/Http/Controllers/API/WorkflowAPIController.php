<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateWorkflowAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateWorkflowAPIRequest;
use Modules\WorkflowEngine\Models\Workflow;
use Modules\WorkflowEngine\Repositories\WorkflowRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\WorkflowResource;

/**
 * Class WorkflowController
 */

class WorkflowAPIController extends AppBaseController
{
    /** @var  WorkflowRepository */
    private $workflowRepository;

    public function __construct(WorkflowRepository $workflowRepo)
    {
        $this->workflowRepository = $workflowRepo;
    }

    /**
     * @OA\Get(
     *      path="/workflows",
     *      summary="getWorkflowList",
     *      tags={"Workflow"},
     *      description="Get all Workflows",
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
     *                  @OA\Items(ref="#/components/schemas/Workflow")
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
        $workflows = $this->workflowRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(WorkflowResource::collection($workflows), 'Workflows retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/workflows",
     *      summary="createWorkflow",
     *      tags={"Workflow"},
     *      description="Create Workflow",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Workflow")
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
     *                  ref="#/components/schemas/Workflow"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $workflow = $this->workflowRepository->create($input);

        return $this->sendResponse(new WorkflowResource($workflow), 'Workflow saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/workflows/{id}",
     *      summary="getWorkflowItem",
     *      tags={"Workflow"},
     *      description="Get Workflow",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Workflow",
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
     *                  ref="#/components/schemas/Workflow"
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
        /** @var Workflow $workflow */
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            return $this->sendError('Workflow not found');
        }

        return $this->sendResponse(new WorkflowResource($workflow), 'Workflow retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/workflows/{id}",
     *      summary="updateWorkflow",
     *      tags={"Workflow"},
     *      description="Update Workflow",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Workflow",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Workflow")
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
     *                  ref="#/components/schemas/Workflow"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Workflow $workflow */
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            return $this->sendError('Workflow not found');
        }

        $workflow = $this->workflowRepository->update($input, $id);

        return $this->sendResponse(new WorkflowResource($workflow), 'Workflow updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/workflows/{id}",
     *      summary="deleteWorkflow",
     *      tags={"Workflow"},
     *      description="Delete Workflow",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Workflow",
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
        /** @var Workflow $workflow */
        $workflow = $this->workflowRepository->find($id);

        if (empty($workflow)) {
            return $this->sendError('Workflow not found');
        }

        $workflow->delete();

        return $this->sendSuccess('Workflow deleted successfully');
    }
}
