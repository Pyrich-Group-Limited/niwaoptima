<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateWorkflowStepAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateWorkflowStepAPIRequest;
use Modules\WorkflowEngine\Models\WorkflowStep;
use Modules\WorkflowEngine\Repositories\WorkflowStepRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\WorkflowStepResource;

/**
 * Class WorkflowStepController
 */

class WorkflowStepAPIController extends AppBaseController
{
    /** @var  WorkflowStepRepository */
    private $workflowStepRepository;

    public function __construct(WorkflowStepRepository $workflowStepRepo)
    {
        $this->workflowStepRepository = $workflowStepRepo;
    }

    /**
     * @OA\Get(
     *      path="/workflow-steps",
     *      summary="getWorkflowStepList",
     *      tags={"WorkflowStep"},
     *      description="Get all WorkflowSteps",
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
     *                  @OA\Items(ref="#/components/schemas/WorkflowStep")
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
        $workflowSteps = $this->workflowStepRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(WorkflowStepResource::collection($workflowSteps), 'Workflow Steps retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/workflow-steps",
     *      summary="createWorkflowStep",
     *      tags={"WorkflowStep"},
     *      description="Create WorkflowStep",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowStep")
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
     *                  ref="#/components/schemas/WorkflowStep"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowStepAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $workflowStep = $this->workflowStepRepository->create($input);

        return $this->sendResponse(new WorkflowStepResource($workflowStep), 'Workflow Step saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/workflow-steps/{id}",
     *      summary="getWorkflowStepItem",
     *      tags={"WorkflowStep"},
     *      description="Get WorkflowStep",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowStep",
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
     *                  ref="#/components/schemas/WorkflowStep"
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
        /** @var WorkflowStep $workflowStep */
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            return $this->sendError('Workflow Step not found');
        }

        return $this->sendResponse(new WorkflowStepResource($workflowStep), 'Workflow Step retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/workflow-steps/{id}",
     *      summary="updateWorkflowStep",
     *      tags={"WorkflowStep"},
     *      description="Update WorkflowStep",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowStep",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowStep")
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
     *                  ref="#/components/schemas/WorkflowStep"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowStepAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var WorkflowStep $workflowStep */
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            return $this->sendError('Workflow Step not found');
        }

        $workflowStep = $this->workflowStepRepository->update($input, $id);

        return $this->sendResponse(new WorkflowStepResource($workflowStep), 'WorkflowStep updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/workflow-steps/{id}",
     *      summary="deleteWorkflowStep",
     *      tags={"WorkflowStep"},
     *      description="Delete WorkflowStep",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowStep",
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
        /** @var WorkflowStep $workflowStep */
        $workflowStep = $this->workflowStepRepository->find($id);

        if (empty($workflowStep)) {
            return $this->sendError('Workflow Step not found');
        }

        $workflowStep->delete();

        return $this->sendSuccess('Workflow Step deleted successfully');
    }
}
