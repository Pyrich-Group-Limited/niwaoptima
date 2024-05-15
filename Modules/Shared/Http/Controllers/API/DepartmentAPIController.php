<?php

namespace Modules\Shared\Http\Controllers\API;

use Modules\Shared\Http\Requests\API\CreateDepartmentAPIRequest;
use Modules\Shared\Http\Requests\API\UpdateDepartmentAPIRequest;
use Modules\Shared\Models\Department;
use Modules\Shared\Repositories\DepartmentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\Shared\Http\Resources\DepartmentResource;

/**
 * Class DepartmentController
 */

class DepartmentAPIController extends AppBaseController
{
    /** @var  DepartmentRepository */
    private $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepo)
    {
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * @OA\Get(
     *      path="/departments",
     *      summary="getDepartmentList",
     *      tags={"Department"},
     *      description="Get all Departments",
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
     *                  @OA\Items(ref="#/components/schemas/Department")
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
        $departments = $this->departmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DepartmentResource::collection($departments), 'Departments retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/departments",
     *      summary="createDepartment",
     *      tags={"Department"},
     *      description="Create Department",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Department")
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
     *                  ref="#/components/schemas/Department"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDepartmentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $department = $this->departmentRepository->create($input);

        return $this->sendResponse(new DepartmentResource($department), 'Department saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/departments/{id}",
     *      summary="getDepartmentItem",
     *      tags={"Department"},
     *      description="Get Department",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Department",
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
     *                  ref="#/components/schemas/Department"
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
        /** @var Department $department */
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            return $this->sendError('Department not found');
        }

        return $this->sendResponse(new DepartmentResource($department), 'Department retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/departments/{id}",
     *      summary="updateDepartment",
     *      tags={"Department"},
     *      description="Update Department",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Department",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Department")
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
     *                  ref="#/components/schemas/Department"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDepartmentAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Department $department */
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            return $this->sendError('Department not found');
        }

        $department = $this->departmentRepository->update($input, $id);

        return $this->sendResponse(new DepartmentResource($department), 'Department updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/departments/{id}",
     *      summary="deleteDepartment",
     *      tags={"Department"},
     *      description="Delete Department",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Department",
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
        /** @var Department $department */
        $department = $this->departmentRepository->find($id);

        if (empty($department)) {
            return $this->sendError('Department not found');
        }

        $department->delete();

        return $this->sendSuccess('Department deleted successfully');
    }
}
