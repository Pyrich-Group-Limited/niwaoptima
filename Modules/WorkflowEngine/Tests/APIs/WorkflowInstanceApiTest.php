<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\WorkflowInstance;

class WorkflowInstanceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/workflow-instances', $workflowInstance
        );

        $this->assertApiResponse($workflowInstance);
    }

    /**
     * @test
     */
    public function test_read_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/workflow-instances/'.$workflowInstance->id
        );

        $this->assertApiResponse($workflowInstance->toArray());
    }

    /**
     * @test
     */
    public function test_update_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->create();
        $editedWorkflowInstance = WorkflowInstance::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/workflow-instances/'.$workflowInstance->id,
            $editedWorkflowInstance
        );

        $this->assertApiResponse($editedWorkflowInstance);
    }

    /**
     * @test
     */
    public function test_delete_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/workflow-instances/'.$workflowInstance->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/workflow-instances/'.$workflowInstance->id
        );

        $this->response->assertStatus(404);
    }
}
