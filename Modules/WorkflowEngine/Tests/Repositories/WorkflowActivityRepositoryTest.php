<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\WorkflowActivity;
use Modules\WorkflowEngine\Repositories\WorkflowActivityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class WorkflowActivityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected WorkflowActivityRepository $workflowActivityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->workflowActivityRepo = app(WorkflowActivityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->make()->toArray();

        $createdWorkflowActivity = $this->workflowActivityRepo->create($workflowActivity);

        $createdWorkflowActivity = $createdWorkflowActivity->toArray();
        $this->assertArrayHasKey('id', $createdWorkflowActivity);
        $this->assertNotNull($createdWorkflowActivity['id'], 'Created WorkflowActivity must have id specified');
        $this->assertNotNull(WorkflowActivity::find($createdWorkflowActivity['id']), 'WorkflowActivity with given id must be in DB');
        $this->assertModelData($workflowActivity, $createdWorkflowActivity);
    }

    /**
     * @test read
     */
    public function test_read_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->create();

        $dbWorkflowActivity = $this->workflowActivityRepo->find($workflowActivity->id);

        $dbWorkflowActivity = $dbWorkflowActivity->toArray();
        $this->assertModelData($workflowActivity->toArray(), $dbWorkflowActivity);
    }

    /**
     * @test update
     */
    public function test_update_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->create();
        $fakeWorkflowActivity = WorkflowActivity::factory()->make()->toArray();

        $updatedWorkflowActivity = $this->workflowActivityRepo->update($fakeWorkflowActivity, $workflowActivity->id);

        $this->assertModelData($fakeWorkflowActivity, $updatedWorkflowActivity->toArray());
        $dbWorkflowActivity = $this->workflowActivityRepo->find($workflowActivity->id);
        $this->assertModelData($fakeWorkflowActivity, $dbWorkflowActivity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_workflow_activity()
    {
        $workflowActivity = WorkflowActivity::factory()->create();

        $resp = $this->workflowActivityRepo->delete($workflowActivity->id);

        $this->assertTrue($resp);
        $this->assertNull(WorkflowActivity::find($workflowActivity->id), 'WorkflowActivity should not exist in DB');
    }
}
