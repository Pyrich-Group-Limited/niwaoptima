<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\StepType;
use Modules\WorkflowEngine\Repositories\StepTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class StepTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected StepTypeRepository $stepTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stepTypeRepo = app(StepTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_step_type()
    {
        $stepType = StepType::factory()->make()->toArray();

        $createdStepType = $this->stepTypeRepo->create($stepType);

        $createdStepType = $createdStepType->toArray();
        $this->assertArrayHasKey('id', $createdStepType);
        $this->assertNotNull($createdStepType['id'], 'Created StepType must have id specified');
        $this->assertNotNull(StepType::find($createdStepType['id']), 'StepType with given id must be in DB');
        $this->assertModelData($stepType, $createdStepType);
    }

    /**
     * @test read
     */
    public function test_read_step_type()
    {
        $stepType = StepType::factory()->create();

        $dbStepType = $this->stepTypeRepo->find($stepType->id);

        $dbStepType = $dbStepType->toArray();
        $this->assertModelData($stepType->toArray(), $dbStepType);
    }

    /**
     * @test update
     */
    public function test_update_step_type()
    {
        $stepType = StepType::factory()->create();
        $fakeStepType = StepType::factory()->make()->toArray();

        $updatedStepType = $this->stepTypeRepo->update($fakeStepType, $stepType->id);

        $this->assertModelData($fakeStepType, $updatedStepType->toArray());
        $dbStepType = $this->stepTypeRepo->find($stepType->id);
        $this->assertModelData($fakeStepType, $dbStepType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_step_type()
    {
        $stepType = StepType::factory()->create();

        $resp = $this->stepTypeRepo->delete($stepType->id);

        $this->assertTrue($resp);
        $this->assertNull(StepType::find($stepType->id), 'StepType should not exist in DB');
    }
}
