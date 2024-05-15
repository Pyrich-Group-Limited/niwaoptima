<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\Form;

class FormApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_form()
    {
        $form = Form::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/forms', $form
        );

        $this->assertApiResponse($form);
    }

    /**
     * @test
     */
    public function test_read_form()
    {
        $form = Form::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/forms/'.$form->id
        );

        $this->assertApiResponse($form->toArray());
    }

    /**
     * @test
     */
    public function test_update_form()
    {
        $form = Form::factory()->create();
        $editedForm = Form::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/forms/'.$form->id,
            $editedForm
        );

        $this->assertApiResponse($editedForm);
    }

    /**
     * @test
     */
    public function test_delete_form()
    {
        $form = Form::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/forms/'.$form->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/forms/'.$form->id
        );

        $this->response->assertStatus(404);
    }
}
