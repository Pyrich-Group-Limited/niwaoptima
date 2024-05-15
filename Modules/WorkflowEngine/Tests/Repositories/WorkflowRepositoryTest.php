<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\Workflow;
use Modules\WorkflowEngine\Repositories\WorkflowRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class WorkflowRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected WorkflowRepository $workflowRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->workflowRepo = app(WorkflowRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_workflow()
    {
        $workflow = Workflow::factory()->make()->toArray();

        $createdWorkflow = $this->workflowRepo->create($workflow);

        $createdWorkflow = $createdWorkflow->toArray();
        $this->assertArrayHasKey('id', $createdWorkflow);
        $this->assertNotNull($createdWorkflow['id'], 'Created Workflow must have id specified');
        $this->assertNotNull(Workflow::find($createdWorkflow['id']), 'Workflow with given id must be in DB');
        $this->assertModelData($workflow, $createdWorkflow);
    }

    /**
     * @test read
     */
    public function test_read_workflow()
    {
        $workflow = Workflow::factory()->create();

        $dbWorkflow = $this->workflowRepo->find($workflow->id);

        $dbWorkflow = $dbWorkflow->toArray();
        $this->assertModelData($workflow->toArray(), $dbWorkflow);
    }

    /**
     * @test update
     */
    public function test_update_workflow()
    {
        $workflow = Workflow::factory()->create();
        $fakeWorkflow = Workflow::factory()->make()->toArray();

        $updatedWorkflow = $this->workflowRepo->update($fakeWorkflow, $workflow->id);

        $this->assertModelData($fakeWorkflow, $updatedWorkflow->toArray());
        $dbWorkflow = $this->workflowRepo->find($workflow->id);
        $this->assertModelData($fakeWorkflow, $dbWorkflow->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_workflow()
    {
        $workflow = Workflow::factory()->create();

        $resp = $this->workflowRepo->delete($workflow->id);

        $this->assertTrue($resp);
        $this->assertNull(Workflow::find($workflow->id), 'Workflow should not exist in DB');
    }
}
