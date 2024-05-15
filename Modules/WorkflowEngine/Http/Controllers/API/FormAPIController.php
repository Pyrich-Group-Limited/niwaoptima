<?php

namespace Modules\WorkflowEngine\Http\Controllers\API;

use Modules\WorkflowEngine\Http\Requests\API\CreateFormAPIRequest;
use Modules\WorkflowEngine\Http\Requests\API\UpdateFormAPIRequest;
use Modules\WorkflowEngine\Models\Form;
use Modules\WorkflowEngine\Repositories\FormRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Modules\WorkflowEngine\Http\Resources\FormResource;

/**
 * Class FormController
 */

class FormAPIController extends AppBaseController
{
    /** @var  FormRepository */
    private $formRepository;

    public function __construct(FormRepository $formRepo)
    {
        $this->formRepository = $formRepo;
    }

    /**
     * @OA\Get(
     *      path="/forms",
     *      summary="getFormList",
     *      tags={"Form"},
     *      description="Get all Forms",
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
     *                  @OA\Items(ref="#/components/schemas/Form")
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
        $forms = $this->formRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FormResource::collection($forms), 'Forms retrieved successfully');
    }

    /**
     * @OA\Post(
     *      path="/forms",
     *      summary="createForm",
     *      tags={"Form"},
     *      description="Create Form",
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Form")
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
     *                  ref="#/components/schemas/Form"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFormAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $form = $this->formRepository->create($input);

        return $this->sendResponse(new FormResource($form), 'Form saved successfully');
    }

    /**
     * @OA\Get(
     *      path="/forms/{id}",
     *      summary="getFormItem",
     *      tags={"Form"},
     *      description="Get Form",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Form",
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
     *                  ref="#/components/schemas/Form"
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
        /** @var Form $form */
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            return $this->sendError('Form not found');
        }

        return $this->sendResponse(new FormResource($form), 'Form retrieved successfully');
    }

    /**
     * @OA\Put(
     *      path="/forms/{id}",
     *      summary="updateForm",
     *      tags={"Form"},
     *      description="Update Form",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Form",
     *           @OA\Schema(
     *             type="integer"
     *          ),
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\RequestBody(
     *        required=true,
     *        @OA\JsonContent(ref="#/components/schemas/Form")
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
     *                  ref="#/components/schemas/Form"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFormAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Form $form */
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            return $this->sendError('Form not found');
        }

        $form = $this->formRepository->update($input, $id);

        return $this->sendResponse(new FormResource($form), 'Form updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/forms/{id}",
     *      summary="deleteForm",
     *      tags={"Form"},
     *      description="Delete Form",
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Form",
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
        /** @var Form $form */
        $form = $this->formRepository->find($id);

        if (empty($form)) {
            return $this->sendError('Form not found');
        }

        $form->delete();

        return $this->sendSuccess('Form deleted successfully');
    }
}
