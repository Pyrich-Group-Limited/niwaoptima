<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\WorkflowActivity;

class WorkflowActivityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/workflow-activities', $workflowActivity
        );

        $this->assertApiResponse($workflowActivity);
    }

    /**
     * @test
     */
    public function test_read_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/workflow-activities/'.$workflowActivity->id
        );

        $this->assertApiResponse($workflowActivity->toArray());
    }

    /**
     * @test
     */
    public function test_update_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->create();
        $editedWorkflowActivity = WorkflowActivity::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/workflow-activities/'.$workflowActivity->id,
            $editedWorkflowActivity
        );

        $this->assertApiResponse($editedWorkflowActivity);
    }

    /**
     * @test
     */
    public function test_delete_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/workflow-activities/'.$workflowActivity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/workflow-activities/'.$workflowActivity->id
        );

        $this->response->assertStatus(404);
    }
}
