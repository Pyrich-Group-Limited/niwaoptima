<?php

namespace Modules\DocumentManager\Http\Controllers\API;

use Modules\DocumentManager\Http\Requests\API\CreateFolderAPIRequest;
use Modules\DocumentManager\Http\Requests\API\UpdateFolderAPIRequest;
use Modules\DocumentManager\Models\Folder;
use Modules\DocumentManager\Repositories\FolderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Http\Resources\FolderResource;

/**
 * Class FolderController
 */

class FolderAPIController extends AppBaseController
{
    /** @var  FolderRepository */
    private $folderRepository;

    public function __construct(FolderRepository $folderRepo)
    {
        $this->folderRepository = $folderRepo;
    }

    /**
     * @OA\Get(
     *      path="/folders",
     *      summary="getFolderList",
     *      tags={"Folder"},
     *      description="Get all Files",
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
     *                  @OA\Items(ref="#/components/schemas/Folder")
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
        $folders = $this->folderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FolderResource::collection($folders), 'Files retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/folders",
     *      summary="createFolder",
     *      tags={"Folder"},
     *      description="create files",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Folder")
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
     *                  ref="#/components/schemas/Folder"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFolderAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $folder = $this->folderRepository->create($input);

        return $this->sendResponse(new FolderResource($folder), 'Folder saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/folders/{id}",
     *      summary="getFolderItem",
     *      tags={"Folder"},
     *      description="Get Folder",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Folder",
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
     *                  ref="#/components/schemas/Folder"
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
        /** @var Folder $folder */
        $folder = $this->folderRepository->find($id);

        if (empty($folder)) {
            return $this->sendError('Folder not found');
        }

        return $this->sendResponse(new FolderResource($folder), 'Folder retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/folders/{id}",
     *      summary="updateFolder",
     *      tags={"Folder"},
     *      description="update files",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Folder",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Folder")
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
     *                  ref="#/components/schemas/Folder"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFolderAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Folder $folder */
        $folder = $this->folderRepository->find($id);

        if (empty($folder)) {
            return $this->sendError('Folder not found');
        }

        $folder = $this->folderRepository->update($input, $id);

        return $this->sendResponse(new FolderResource($folder), 'Folder updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/folders/{id}",
     *      summary="deleteFolder",
     *      tags={"Folder"},
     *      description="delete files",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Folder",
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
        /** @var Folder $folder */
        $folder = $this->folderRepository->find($id);

        if (empty($folder)) {
            return $this->sendError('Folder not found');
        }

        $folder->delete();

        return $this->sendSuccess('Folder deleted successfully');
    }
}
