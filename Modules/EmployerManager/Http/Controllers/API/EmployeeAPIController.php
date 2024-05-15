<?php

namespace Modules\EmployerManager\Http\Controllers\API;

use Modules\EmployerManager\Http\Requests\API\CreateEmployeeAPIRequest;
use Modules\EmployerManager\Http\Requests\API\UpdateEmployeeAPIRequest;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Repositories\EmployeeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\EmployerManager\Http\Resources\EmployeeResource;

/**
 * Class EmployeeController
 */

class EmployeeAPIController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * @OA\Get(
     *      path="/employees",
     *      summary="getEmployeeList",
     *      tags={"Employee"},
     *      description="Get all Employees",
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
     *                  @OA\Items(ref="#/components/schemas/Employee")
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
        $employees = $this->employeeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(EmployeeResource::collection($employees), 'Employees retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/employees",
     *      summary="createEmployee",
     *      tags={"Employee"},
     *      description="Create Employee",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Employee")
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
     *                  ref="#/components/schemas/Employee"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmployeeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $employee = $this->employeeRepository->create($input);

        return $this->sendResponse(new EmployeeResource($employee), 'Employee saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/employees/{id}",
     *      summary="getEmployeeItem",
     *      tags={"Employee"},
     *      description="Get Employee",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Employee",
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
     *                  ref="#/components/schemas/Employee"
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
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError('Employee not found');
        }

        return $this->sendResponse(new EmployeeResource($employee), 'Employee retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/employees/{id}",
     *      summary="updateEmployee",
     *      tags={"Employee"},
     *      description="Update Employee",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Employee",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Employee")
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
     *                  ref="#/components/schemas/Employee"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmployeeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError('Employee not found');
        }

        $employee = $this->employeeRepository->update($input, $id);

        return $this->sendResponse(new EmployeeResource($employee), 'Employee updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/employees/{id}",
     *      summary="deleteEmployee",
     *      tags={"Employee"},
     *      description="Delete Employee",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Employee",
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
        /** @var Employee $employee */
        $employee = $this->employeeRepository->find($id);

        if (empty($employee)) {
            return $this->sendError('Employee not found');
        }

        $employee->delete();

        return $this->sendSuccess('Employee deleted successfully');
    }
}
