<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateFormFieldAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateFormFieldAPIRequest;
use Modules\WorkflowEngine\Models\FormField;
use Modules\WorkflowEngine\Repositories\FormFieldRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\FormFieldResource;

/**
 * Class FormFieldController
 */

class FormFieldAPIController extends AppBaseController
{
    /** @var  FormFieldRepository */
    private $formFieldRepository;

    public function __construct(FormFieldRepository $formFieldRepo)
    {
        $this->formFieldRepository = $formFieldRepo;
    }

    /**
     * @OA\Get(
     *      path="/form-fields",
     *      summary="getFormFieldList",
     *      tags={"FormField"},
     *      description="Get all FormFields",
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
     *                  @OA\Items(ref="#/components/schemas/FormField")
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
        $formFields = $this->formFieldRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FormFieldResource::collection($formFields), 'Form Fields retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/form-fields",
     *      summary="createFormField",
     *      tags={"FormField"},
     *      description="Create FormField",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/FormField")
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
     *                  ref="#/components/schemas/FormField"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFormFieldAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $formField = $this->formFieldRepository->create($input);

        return $this->sendResponse(new FormFieldResource($formField), 'Form Field saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/form-fields/{id}",
     *      summary="getFormFieldItem",
     *      tags={"FormField"},
     *      description="Get FormField",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of FormField",
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
     *                  ref="#/components/schemas/FormField"
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
        /** @var FormField $formField */
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            return $this->sendError('Form Field not found');
        }

        return $this->sendResponse(new FormFieldResource($formField), 'Form Field retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/form-fields/{id}",
     *      summary="updateFormField",
     *      tags={"FormField"},
     *      description="Update FormField",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of FormField",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/FormField")
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
     *                  ref="#/components/schemas/FormField"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFormFieldAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var FormField $formField */
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            return $this->sendError('Form Field not found');
        }

        $formField = $this->formFieldRepository->update($input, $id);

        return $this->sendResponse(new FormFieldResource($formField), 'FormField updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/form-fields/{id}",
     *      summary="deleteFormField",
     *      tags={"FormField"},
     *      description="Delete FormField",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of FormField",
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
        /** @var FormField $formField */
        $formField = $this->formFieldRepository->find($id);

        if (empty($formField)) {
            return $this->sendError('Form Field not found');
        }

        $formField->delete();

        return $this->sendSuccess('Form Field deleted successfully');
    }
}
