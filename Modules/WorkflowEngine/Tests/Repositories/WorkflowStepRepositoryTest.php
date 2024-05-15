<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\WorkflowStep;
use Modules\WorkflowEngine\Repositories\WorkflowStepRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class WorkflowStepRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected WorkflowStepRepository $workflowStepRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->workflowStepRepo = app(WorkflowStepRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->make()->toArray();

        $createdWorkflowStep = $this->workflowStepRepo->create($workflowStep);

        $createdWorkflowStep = $createdWorkflowStep->toArray();
        $this->assertArrayHasKey('id', $createdWorkflowStep);
        $this->assertNotNull($createdWorkflowStep['id'], 'Created WorkflowStep must have id specified');
        $this->assertNotNull(WorkflowStep::find($createdWorkflowStep['id']), 'WorkflowStep with given id must be in DB');
        $this->assertModelData($workflowStep, $createdWorkflowStep);
    }

    /**
     * @test read
     */
    public function test_read_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->create();

        $dbWorkflowStep = $this->workflowStepRepo->find($workflowStep->id);

        $dbWorkflowStep = $dbWorkflowStep->toArray();
        $this->assertModelData($workflowStep->toArray(), $dbWorkflowStep);
    }

    /**
     * @test update
     */
    public function test_update_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->create();
        $fakeWorkflowStep = WorkflowStep::factory()->make()->toArray();

        $updatedWorkflowStep = $this->workflowStepRepo->update($fakeWorkflowStep, $workflowStep->id);

        $this->assertModelData($fakeWorkflowStep, $updatedWorkflowStep->toArray());
        $dbWorkflowStep = $this->workflowStepRepo->find($workflowStep->id);
        $this->assertModelData($fakeWorkflowStep, $dbWorkflowStep->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_workflow_step()
    {
        $workflowStep = WorkflowStep::factory()->create();

        $resp = $this->workflowStepRepo->delete($workflowStep->id);

        $this->assertTrue($resp);
        $this->assertNull(WorkflowStep::find($workflowStep->id), 'WorkflowStep should not exist in DB');
    }
}
