<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\Workflow;

class WorkflowApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_workflow()
    {
        $workflow = Workflow::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/workflows', $workflow
        );

        $this->assertApiResponse($workflow);
    }

    /**
     * @test
     */
    public function test_read_workflow()
    {
        $workflow = Workflow::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/workflows/'.$workflow->id
        );

        $this->assertApiResponse($workflow->toArray());
    }

    /**
     * @test
     */
    public function test_update_workflow()
    {
        $workflow = Workflow::factory()->create();
        $editedWorkflow = Workflow::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/workflows/'.$workflow->id,
            $editedWorkflow
        );

        $this->assertApiResponse($editedWorkflow);
    }

    /**
     * @test
     */
    public function test_delete_workflow()
    {
        $workflow = Workflow::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/workflows/'.$workflow->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/workflows/'.$workflow->id
        );

        $this->response->assertStatus(404);
    }
}
