<?php

namespace Modules\Leaves\Http\Controllers\API;

use Modules\Leaves\Http\Requests\API\CreateleavesAPIRequest;
use Modules\Leaves\Http\Requests\API\UpdateleavesAPIRequest;
use Modules\Leaves\Models\leaves;
use Modules\Leaves\Repositories\leavesRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\Leaves\Http\Resources\leavesResource;

/**
 * Class leavesController
 */

class leavesAPIController extends AppBaseController
{
    /** @var  leavesRepository */
    private $leavesRepository;

    public function __construct(leavesRepository $leavesRepo)
    {
        $this->leavesRepository = $leavesRepo;
    }

    /**
     * @OA\Get(
     *      path="/leaves",
     *      summary="getleavesList",
     *      tags={"leaves"},
     *      description="Get all leaves",
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
     *                  @OA\Items(ref="#/components/schemas/leaves")
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
        $leaves = $this->leavesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(leavesResource::collection($leaves), 'Leaves retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/leaves",
     *      summary="createleaves",
     *      tags={"leaves"},
     *      description="Create leaves",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/leaves")
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
     *                  ref="#/components/schemas/leaves"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateleavesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $leaves = $this->leavesRepository->create($input);

        return $this->sendResponse(new leavesResource($leaves), 'Leaves saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/leaves/{id}",
     *      summary="getleavesItem",
     *      tags={"leaves"},
     *      description="Get leaves",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of leaves",
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
     *                  ref="#/components/schemas/leaves"
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
        /** @var leaves $leaves */
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            return $this->sendError('Leaves not found');
        }

        return $this->sendResponse(new leavesResource($leaves), 'Leaves retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/leaves/{id}",
     *      summary="updateleaves",
     *      tags={"leaves"},
     *      description="Update leaves",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of leaves",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/leaves")
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
     *                  ref="#/components/schemas/leaves"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateleavesAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var leaves $leaves */
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            return $this->sendError('Leaves not found');
        }

        $leaves = $this->leavesRepository->update($input, $id);

        return $this->sendResponse(new leavesResource($leaves), 'leaves updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/leaves/{id}",
     *      summary="deleteleaves",
     *      tags={"leaves"},
     *      description="Delete leaves",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of leaves",
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
        /** @var leaves $leaves */
        $leaves = $this->leavesRepository->find($id);

        if (empty($leaves)) {
            return $this->sendError('Leaves not found');
        }

        $leaves->delete();

        return $this->sendSuccess('Leaves deleted successfully');
    }
}
