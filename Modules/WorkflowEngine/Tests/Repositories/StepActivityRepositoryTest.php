<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\StepActivity;
use Modules\WorkflowEngine\Repositories\StepActivityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class StepActivityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected StepActivityRepository $stepActivityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->stepActivityRepo = app(StepActivityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_step_activity()
    {
        $stepActivity = StepActivity::factory()->make()->toArray();

        $createdStepActivity = $this->stepActivityRepo->create($stepActivity);

        $createdStepActivity = $createdStepActivity->toArray();
        $this->assertArrayHasKey('id', $createdStepActivity);
        $this->assertNotNull($createdStepActivity['id'], 'Created StepActivity must have id specified');
        $this->assertNotNull(StepActivity::find($createdStepActivity['id']), 'StepActivity with given id must be in DB');
        $this->assertModelData($stepActivity, $createdStepActivity);
    }

    /**
     * @test read
     */
    public function test_read_step_activity()
    {
        $stepActivity = StepActivity::factory()->create();

        $dbStepActivity = $this->stepActivityRepo->find($stepActivity->id);

        $dbStepActivity = $dbStepActivity->toArray();
        $this->assertModelData($stepActivity->toArray(), $dbStepActivity);
    }

    /**
     * @test update
     */
    public function test_update_step_activity()
    {
        $stepActivity = StepActivity::factory()->create();
        $fakeStepActivity = StepActivity::factory()->make()->toArray();

        $updatedStepActivity = $this->stepActivityRepo->update($fakeStepActivity, $stepActivity->id);

        $this->assertModelData($fakeStepActivity, $updatedStepActivity->toArray());
        $dbStepActivity = $this->stepActivityRepo->find($stepActivity->id);
        $this->assertModelData($fakeStepActivity, $dbStepActivity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_step_activity()
    {
        $stepActivity = StepActivity::factory()->create();

        $resp = $this->stepActivityRepo->delete($stepActivity->id);

        $this->assertTrue($resp);
        $this->assertNull(StepActivity::find($stepActivity->id), 'StepActivity should not exist in DB');
    }
}
