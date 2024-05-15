<?php

namespace Modules\DocumentManager\Http\Controllers\API;

use Modules\DocumentManager\Http\Requests\API\CreateDocumentVersionAPIRequest;
use Modules\DocumentManager\Http\Requests\API\UpdateDocumentVersionAPIRequest;
use Modules\DocumentManager\Models\DocumentVersion;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Http\Resources\DocumentVersionResource;

/**
 * Class DocumentVersionController
 */

class DocumentVersionAPIController extends AppBaseController
{
    /** @var  DocumentVersionRepository */
    private $documentVersionRepository;

    public function __construct(DocumentVersionRepository $documentVersionRepo)
    {
        $this->documentVersionRepository = $documentVersionRepo;
    }

    /**
     * @OA\Get(
     *      path="/document-versions",
     *      summary="getDocumentVersionList",
     *      tags={"DocumentVersion"},
     *      description="Get all DocumentVersions",
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
     *                  @OA\Items(ref="#/components/schemas/DocumentVersion")
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
        $documentVersions = $this->documentVersionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(DocumentVersionResource::collection($documentVersions), 'Document Versions retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/document-versions",
     *      summary="createDocumentVersion",
     *      tags={"DocumentVersion"},
     *      description="Create DocumentVersion",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/DocumentVersion")
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
     *                  ref="#/components/schemas/DocumentVersion"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDocumentVersionAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $documentVersion = $this->documentVersionRepository->create($input);

        return $this->sendResponse(new DocumentVersionResource($documentVersion), 'Document Version saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/document-versions/{id}",
     *      summary="getDocumentVersionItem",
     *      tags={"DocumentVersion"},
     *      description="Get DocumentVersion",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of DocumentVersion",
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
     *                  ref="#/components/schemas/DocumentVersion"
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
        /** @var DocumentVersion $documentVersion */
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            return $this->sendError('Document Version not found');
        }

        return $this->sendResponse(new DocumentVersionResource($documentVersion), 'Document Version retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/document-versions/{id}",
     *      summary="updateDocumentVersion",
     *      tags={"DocumentVersion"},
     *      description="Update DocumentVersion",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of DocumentVersion",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/DocumentVersion")
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
     *                  ref="#/components/schemas/DocumentVersion"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDocumentVersionAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var DocumentVersion $documentVersion */
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            return $this->sendError('Document Version not found');
        }

        $documentVersion = $this->documentVersionRepository->update($input, $id);

        return $this->sendResponse(new DocumentVersionResource($documentVersion), 'DocumentVersion updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/document-versions/{id}",
     *      summary="deleteDocumentVersion",
     *      tags={"DocumentVersion"},
     *      description="Delete DocumentVersion",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of DocumentVersion",
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
        /** @var DocumentVersion $documentVersion */
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            return $this->sendError('Document Version not found');
        }

        $documentVersion->delete();

        return $this->sendSuccess('Document Version deleted successfully');
    }
}
