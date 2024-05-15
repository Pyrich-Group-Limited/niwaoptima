<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\WorkflowType;
use Modules\WorkflowEngine\Repositories\WorkflowTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class WorkflowTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected WorkflowTypeRepository $workflowTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->workflowTypeRepo = app(WorkflowTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_workflow_type()
    {
        $workflowType = WorkflowType::factory()->make()->toArray();

        $createdWorkflowType = $this->workflowTypeRepo->create($workflowType);

        $createdWorkflowType = $createdWorkflowType->toArray();
        $this->assertArrayHasKey('id', $createdWorkflowType);
        $this->assertNotNull($createdWorkflowType['id'], 'Created WorkflowType must have id specified');
        $this->assertNotNull(WorkflowType::find($createdWorkflowType['id']), 'WorkflowType with given id must be in DB');
        $this->assertModelData($workflowType, $createdWorkflowType);
    }

    /**
     * @test read
     */
    public function test_read_workflow_type()
    {
        $workflowType = WorkflowType::factory()->create();

        $dbWorkflowType = $this->workflowTypeRepo->find($workflowType->id);

        $dbWorkflowType = $dbWorkflowType->toArray();
        $this->assertModelData($workflowType->toArray(), $dbWorkflowType);
    }

    /**
     * @test update
     */
    public function test_update_workflow_type()
    {
        $workflowType = WorkflowType::factory()->create();
        $fakeWorkflowType = WorkflowType::factory()->make()->toArray();

        $updatedWorkflowType = $this->workflowTypeRepo->update($fakeWorkflowType, $workflowType->id);

        $this->assertModelData($fakeWorkflowType, $updatedWorkflowType->toArray());
        $dbWorkflowType = $this->workflowTypeRepo->find($workflowType->id);
        $this->assertModelData($fakeWorkflowType, $dbWorkflowType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_workflow_type()
    {
        $workflowType = WorkflowType::factory()->create();

        $resp = $this->workflowTypeRepo->delete($workflowType->id);

        $this->assertTrue($resp);
        $this->assertNull(WorkflowType::find($workflowType->id), 'WorkflowType should not exist in DB');
    }
}
