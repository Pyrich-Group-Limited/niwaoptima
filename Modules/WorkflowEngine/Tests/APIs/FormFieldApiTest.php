<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\FormField;

class FormFieldApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_form_field()
    {
        $formField = FormField::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/form-fields', $formField
        );

        $this->assertApiResponse($formField);
    }

    /**
     * @test
     */
    public function test_read_form_field()
    {
        $formField = FormField::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/form-fields/'.$formField->id
        );

        $this->assertApiResponse($formField->toArray());
    }

    /**
     * @test
     */
    public function test_update_form_field()
    {
        $formField = FormField::factory()->create();
        $editedFormField = FormField::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/form-fields/'.$formField->id,
            $editedFormField
        );

        $this->assertApiResponse($editedFormField);
    }

    /**
     * @test
     */
    public function test_delete_form_field()
    {
        $formField = FormField::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/form-fields/'.$formField->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/form-fields/'.$formField->id
        );

        $this->response->assertStatus(404);
    }
}
