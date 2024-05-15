<?php

namespace Modules\EmployerManager\Http\Controllers\API;

use Modules\EmployerManager\Http\Requests\API\CreateEmployerAPIRequest;
use Modules\EmployerManager\Http\Requests\API\UpdateEmployerAPIRequest;
use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Repositories\EmployerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\EmployerManager\Http\Resources\EmployerResource;

/**
 * Class EmployerController
 */

class EmployerAPIController extends AppBaseController
{
    /** @var  EmployerRepository */
    private $employerRepository;

    public function __construct(EmployerRepository $employerRepo)
    {
        $this->employerRepository = $employerRepo;
    }

    /**
     * @OA\Get(
     *      path="/employers",
     *      summary="getEmployerList",
     *      tags={"Employer"},
     *      description="Get all Employers",
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
     *                  @OA\Items(ref="#/components/schemas/Employer")
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
        $employers = $this->employerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(EmployerResource::collection($employers), 'Employers retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/employers",
     *      summary="createEmployer",
     *      tags={"Employer"},
     *      description="Create Employer",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Employer")
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
     *                  ref="#/components/schemas/Employer"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmployerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $employer = $this->employerRepository->create($input);

        return $this->sendResponse(new EmployerResource($employer), 'Employer saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/employers/{id}",
     *      summary="getEmployerItem",
     *      tags={"Employer"},
     *      description="Get Employer",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Employer",
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
     *                  ref="#/components/schemas/Employer"
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
        /** @var Employer $employer */
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        return $this->sendResponse(new EmployerResource($employer), 'Employer retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/employers/{id}",
     *      summary="updateEmployer",
     *      tags={"Employer"},
     *      description="Update Employer",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Employer",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Employer")
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
     *                  ref="#/components/schemas/Employer"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmployerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Employer $employer */
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        $employer = $this->employerRepository->update($input, $id);

        return $this->sendResponse(new EmployerResource($employer), 'Employer updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/employers/{id}",
     *      summary="deleteEmployer",
     *      tags={"Employer"},
     *      description="Delete Employer",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Employer",
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
        /** @var Employer $employer */
        $employer = $this->employerRepository->find($id);

        if (empty($employer)) {
            return $this->sendError('Employer not found');
        }

        $employer->delete();

        return $this->sendSuccess('Employer deleted successfully');
    }
}
