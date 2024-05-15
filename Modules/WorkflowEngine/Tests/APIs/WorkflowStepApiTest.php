<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\WorkflowStep;

class WorkflowStepApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/workflow-steps', $workflowStep
        );

        $this->assertApiResponse($workflowStep);
    }

    /**
     * @test
     */
    public function test_read_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/workflow-steps/'.$workflowStep->id
        );

        $this->assertApiResponse($workflowStep->toArray());
    }

    /**
     * @test
     */
    public function test_update_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->create();
        $editedWorkflowStep = WorkflowStep::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/workflow-steps/'.$workflowStep->id,
            $editedWorkflowStep
        );

        $this->assertApiResponse($editedWorkflowStep);
    }

    /**
     * @test
     */
    public function test_delete_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/workflow-steps/'.$workflowStep->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/workflow-steps/'.$workflowStep->id
        );

        $this->response->assertStatus(404);
    }
}
