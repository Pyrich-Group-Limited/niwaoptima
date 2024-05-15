<?php

namespace Modules\DocumentManager\Http\Controllers\API;

use Modules\DocumentManager\Http\Requests\API\CreateCorrespondenceAPIRequest;
use Modules\DocumentManager\Http\Requests\API\UpdateCorrespondenceAPIRequest;
use Modules\DocumentManager\Models\Correspondence;
use Modules\DocumentManager\Repositories\CorrespondenceRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Http\Resources\CorrespondenceResource;

/**
 * Class CorrespondenceController
 */

class CorrespondenceAPIController extends AppBaseController
{
    /** @var  CorrespondenceRepository */
    private $correspondenceRepository;

    public function __construct(CorrespondenceRepository $correspondenceRepo)
    {
        $this->correspondenceRepository = $correspondenceRepo;
    }

    /**
     * @OA\Get(
     *      path="/correspondences",
     *      summary="getCorrespondenceList",
     *      tags={"Correspondence"},
     *      description="Get all Correspondences",
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
     *                  @OA\Items(ref="#/components/schemas/Correspondence")
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
        $correspondences = $this->correspondenceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CorrespondenceResource::collection($correspondences), 'Correspondences retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/correspondences",
     *      summary="createCorrespondence",
     *      tags={"Correspondence"},
     *      description="Create Correspondence",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Correspondence")
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
     *                  ref="#/components/schemas/Correspondence"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCorrespondenceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $correspondence = $this->correspondenceRepository->create($input);

        return $this->sendResponse(new CorrespondenceResource($correspondence), 'Correspondence saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/correspondences/{id}",
     *      summary="getCorrespondenceItem",
     *      tags={"Correspondence"},
     *      description="Get Correspondence",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Correspondence",
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
     *                  ref="#/components/schemas/Correspondence"
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
        /** @var Correspondence $correspondence */
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            return $this->sendError('Correspondence not found');
        }

        return $this->sendResponse(new CorrespondenceResource($correspondence), 'Correspondence retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/correspondences/{id}",
     *      summary="updateCorrespondence",
     *      tags={"Correspondence"},
     *      description="Update Correspondence",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Correspondence",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Correspondence")
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
     *                  ref="#/components/schemas/Correspondence"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCorrespondenceAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Correspondence $correspondence */
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            return $this->sendError('Correspondence not found');
        }

        $correspondence = $this->correspondenceRepository->update($input, $id);

        return $this->sendResponse(new CorrespondenceResource($correspondence), 'Correspondence updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/correspondences/{id}",
     *      summary="deleteCorrespondence",
     *      tags={"Correspondence"},
     *      description="Delete Correspondence",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Correspondence",
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
        /** @var Correspondence $correspondence */
        $correspondence = $this->correspondenceRepository->find($id);

        if (empty($correspondence)) {
            return $this->sendError('Correspondence not found');
        }

        $correspondence->delete();

        return $this->sendSuccess('Correspondence deleted successfully');
    }
}
