<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\WorkflowType;

class WorkflowTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_workflow_type()
    {
        $workflowType = WorkflowType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/workflow-types', $workflowType
        );

        $this->assertApiResponse($workflowType);
    }

    /**
     * @test
     */
    public function test_read_workflow_type()
    {
        $workflowType = WorkflowType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/workflow-types/'.$workflowType->id
        );

        $this->assertApiResponse($workflowType->toArray());
    }

    /**
     * @test
     */
    public function test_update_workflow_type()
    {
        $workflowType = WorkflowType::factory()->create();
        $editedWorkflowType = WorkflowType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/workflow-types/'.$workflowType->id,
            $editedWorkflowType
        );

        $this->assertApiResponse($editedWorkflowType);
    }

    /**
     * @test
     */
    public function test_delete_workflow_type()
    {
        $workflowType = WorkflowType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/workflow-types/'.$workflowType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/workflow-types/'.$workflowType->id
        );

        $this->response->assertStatus(404);
    }
}
