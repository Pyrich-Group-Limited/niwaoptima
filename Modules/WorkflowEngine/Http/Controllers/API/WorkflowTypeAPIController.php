<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateWorkflowTypeAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateWorkflowTypeAPIRequest;
use Modules\WorkflowEngine\Models\WorkflowType;
use Modules\WorkflowEngine\Repositories\WorkflowTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\WorkflowTypeResource;

/**
 * Class WorkflowTypeController
 */

class WorkflowTypeAPIController extends AppBaseController
{
    /** @var  WorkflowTypeRepository */
    private $workflowTypeRepository;

    public function __construct(WorkflowTypeRepository $workflowTypeRepo)
    {
        $this->workflowTypeRepository = $workflowTypeRepo;
    }

    /**
     * @OA\Get(
     *      path="/workflow-types",
     *      summary="getWorkflowTypeList",
     *      tags={"WorkflowType"},
     *      description="Get all WorkflowTypes",
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
     *                  @OA\Items(ref="#/components/schemas/WorkflowType")
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
        $workflowTypes = $this->workflowTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(WorkflowTypeResource::collection($workflowTypes), 'Workflow Types retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/workflow-types",
     *      summary="createWorkflowType",
     *      tags={"WorkflowType"},
     *      description="Create WorkflowType",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowType")
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
     *                  ref="#/components/schemas/WorkflowType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWorkflowTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $workflowType = $this->workflowTypeRepository->create($input);

        return $this->sendResponse(new WorkflowTypeResource($workflowType), 'Workflow Type saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/workflow-types/{id}",
     *      summary="getWorkflowTypeItem",
     *      tags={"WorkflowType"},
     *      description="Get WorkflowType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowType",
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
     *                  ref="#/components/schemas/WorkflowType"
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
        /** @var WorkflowType $workflowType */
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            return $this->sendError('Workflow Type not found');
        }

        return $this->sendResponse(new WorkflowTypeResource($workflowType), 'Workflow Type retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/workflow-types/{id}",
     *      summary="updateWorkflowType",
     *      tags={"WorkflowType"},
     *      description="Update WorkflowType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/WorkflowType")
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
     *                  ref="#/components/schemas/WorkflowType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWorkflowTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var WorkflowType $workflowType */
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            return $this->sendError('Workflow Type not found');
        }

        $workflowType = $this->workflowTypeRepository->update($input, $id);

        return $this->sendResponse(new WorkflowTypeResource($workflowType), 'WorkflowType updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/workflow-types/{id}",
     *      summary="deleteWorkflowType",
     *      tags={"WorkflowType"},
     *      description="Delete WorkflowType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of WorkflowType",
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
        /** @var WorkflowType $workflowType */
        $workflowType = $this->workflowTypeRepository->find($id);

        if (empty($workflowType)) {
            return $this->sendError('Workflow Type not found');
        }

        $workflowType->delete();

        return $this->sendSuccess('Workflow Type deleted successfully');
    }
}
