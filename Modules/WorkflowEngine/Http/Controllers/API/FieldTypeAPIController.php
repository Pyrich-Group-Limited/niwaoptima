<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateFieldTypeAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateFieldTypeAPIRequest;
use Modules\WorkflowEngine\Models\FieldType;
use Modules\WorkflowEngine\Repositories\FieldTypeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\FieldTypeResource;

/**
 * Class FieldTypeController
 */

class FieldTypeAPIController extends AppBaseController
{
    /** @var  FieldTypeRepository */
    private $fieldTypeRepository;

    public function __construct(FieldTypeRepository $fieldTypeRepo)
    {
        $this->fieldTypeRepository = $fieldTypeRepo;
    }

    /**
     * @OA\Get(
     *      path="/field-types",
     *      summary="getFieldTypeList",
     *      tags={"FieldType"},
     *      description="Get all FieldTypes",
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
     *                  @OA\Items(ref="#/components/schemas/FieldType")
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
        $fieldTypes = $this->fieldTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            FieldTypeResource::collection($fieldTypes),
            __('messages.retrieved', ['model' => __('models/fieldTypes.plural')])
        );
    }

    /**
     * @OA\Post(
     *      path="/field-types",
     *      summary="createFieldType",
     *      tags={"FieldType"},
     *      description="Create FieldType",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/FieldType")
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
     *                  ref="#/components/schemas/FieldType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFieldTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $fieldType = $this->fieldTypeRepository->create($input);

        return $this->sendResponse(
            new FieldTypeResource($fieldType),
            __('messages.saved', ['model' => __('models/fieldTypes.singular')])
        );
    }

    /**
     * @OA\Get(
     *      path="/field-types/{id}",
     *      summary="getFieldTypeItem",
     *      tags={"FieldType"},
     *      description="Get FieldType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of FieldType",
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
     *                  ref="#/components/schemas/FieldType"
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
        /** @var FieldType $fieldType */
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fieldTypes.singular')])
            );
        }

        return $this->sendResponse(
            new FieldTypeResource($fieldType),
            __('messages.retrieved', ['model' => __('models/fieldTypes.singular')])
        );
    }

    /**
     * @OA\Put(
     *      path="/field-types/{id}",
     *      summary="updateFieldType",
     *      tags={"FieldType"},
     *      description="Update FieldType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of FieldType",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/FieldType")
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
     *                  ref="#/components/schemas/FieldType"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFieldTypeAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var FieldType $fieldType */
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fieldTypes.singular')])
            );
        }

        $fieldType = $this->fieldTypeRepository->update($input, $id);

        return $this->sendResponse(
            new FieldTypeResource($fieldType),
            __('messages.updated', ['model' => __('models/fieldTypes.singular')])
        );
    }

    /**
     * @OA\Delete(
     *      path="/field-types/{id}",
     *      summary="deleteFieldType",
     *      tags={"FieldType"},
     *      description="Delete FieldType",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of FieldType",
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
        /** @var FieldType $fieldType */
        $fieldType = $this->fieldTypeRepository->find($id);

        if (empty($fieldType)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fieldTypes.singular')])
            );
        }

        $fieldType->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/fieldTypes.singular')])
        );
    }
}
