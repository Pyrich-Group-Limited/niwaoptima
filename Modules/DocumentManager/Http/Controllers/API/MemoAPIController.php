<?php

namespace Modules\DocumentManager\Http\Controllers\API;

use Modules\DocumentManager\Http\Requests\API\CreateMemoAPIRequest;
use Modules\DocumentManager\Http\Requests\API\UpdateMemoAPIRequest;
use Modules\DocumentManager\Models\Memo;
use Modules\DocumentManager\Repositories\MemoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Http\Resources\MemoResource;

/**
 * Class MemoController
 */

class MemoAPIController extends AppBaseController
{
    /** @var  MemoRepository */
    private $memoRepository;

    public function __construct(MemoRepository $memoRepo)
    {
        $this->memoRepository = $memoRepo;
    }

    /**
     * @OA\Get(
     *      path="/memos",
     *      summary="getMemoList",
     *      tags={"Memo"},
     *      description="Get all Memos",
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
     *                  @OA\Items(ref="#/components/schemas/Memo")
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
        $memos = $this->memoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MemoResource::collection($memos), 'Memos retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/memos",
     *      summary="createMemo",
     *      tags={"Memo"},
     *      description="Create Memo",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Memo")
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
     *                  ref="#/components/schemas/Memo"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMemoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $memo = $this->memoRepository->create($input);

        return $this->sendResponse(new MemoResource($memo), 'Memo saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/memos/{id}",
     *      summary="getMemoItem",
     *      tags={"Memo"},
     *      description="Get Memo",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Memo",
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
     *                  ref="#/components/schemas/Memo"
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
        /** @var Memo $memo */
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            return $this->sendError('Memo not found');
        }

        return $this->sendResponse(new MemoResource($memo), 'Memo retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/memos/{id}",
     *      summary="updateMemo",
     *      tags={"Memo"},
     *      description="Update Memo",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Memo",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Memo")
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
     *                  ref="#/components/schemas/Memo"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMemoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Memo $memo */
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            return $this->sendError('Memo not found');
        }

        $memo = $this->memoRepository->update($input, $id);

        return $this->sendResponse(new MemoResource($memo), 'Memo updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/memos/{id}",
     *      summary="deleteMemo",
     *      tags={"Memo"},
     *      description="Delete Memo",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Memo",
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
        /** @var Memo $memo */
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            return $this->sendError('Memo not found');
        }

        $memo->delete();

        return $this->sendSuccess('Memo deleted successfully');
    }
}
