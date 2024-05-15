<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\WorkflowInstance;
use Modules\WorkflowEngine\Repositories\WorkflowInstanceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class WorkflowInstanceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected WorkflowInstanceRepository $workflowInstanceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->workflowInstanceRepo = app(WorkflowInstanceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->make()->toArray();

        $createdWorkflowInstance = $this->workflowInstanceRepo->create($workflowInstance);

        $createdWorkflowInstance = $createdWorkflowInstance->toArray();
        $this->assertArrayHasKey('id', $createdWorkflowInstance);
        $this->assertNotNull($createdWorkflowInstance['id'], 'Created WorkflowInstance must have id specified');
        $this->assertNotNull(WorkflowInstance::find($createdWorkflowInstance['id']), 'WorkflowInstance with given id must be in DB');
        $this->assertModelData($workflowInstance, $createdWorkflowInstance);
    }

    /**
     * @test read
     */
    public function test_read_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->create();

        $dbWorkflowInstance = $this->workflowInstanceRepo->find($workflowInstance->id);

        $dbWorkflowInstance = $dbWorkflowInstance->toArray();
        $this->assertModelData($workflowInstance->toArray(), $dbWorkflowInstance);
    }

    /**
     * @test update
     */
    public function test_update_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->create();
        $fakeWorkflowInstance = WorkflowInstance::factory()->make()->toArray();

        $updatedWorkflowInstance = $this->workflowInstanceRepo->update($fakeWorkflowInstance, $workflowInstance->id);

        $this->assertModelData($fakeWorkflowInstance, $updatedWorkflowInstance->toArray());
        $dbWorkflowInstance = $this->workflowInstanceRepo->find($workflowInstance->id);
        $this->assertModelData($fakeWorkflowInstance, $dbWorkflowInstance->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_workflow_instance()
    {
        $workflowInstance = WorkflowInstance::factory()->create();

        $resp = $this->workflowInstanceRepo->delete($workflowInstance->id);

        $this->assertTrue($resp);
        $this->assertNull(WorkflowInstance::find($workflowInstance->id), 'WorkflowInstance should not exist in DB');
    }
}
