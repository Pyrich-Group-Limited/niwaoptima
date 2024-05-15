<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\StepActivity;

class StepActivityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_step_activity()
    {
        $stepActivity = StepActivity::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/step-activities', $stepActivity
        );

        $this->assertApiResponse($stepActivity);
    }

    /**
     * @test
     */
    public function test_read_step_activity()
    {
        $stepActivity = StepActivity::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/step-activities/'.$stepActivity->id
        );

        $this->assertApiResponse($stepActivity->toArray());
    }

    /**
     * @test
     */
    public function test_update_step_activity()
    {
        $stepActivity = StepActivity::factory()->create();
        $editedStepActivity = StepActivity::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/step-activities/'.$stepActivity->id,
            $editedStepActivity
        );

        $this->assertApiResponse($editedStepActivity);
    }

    /**
     * @test
     */
    public function test_delete_step_activity()
    {
        $stepActivity = StepActivity::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/step-activities/'.$stepActivity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/step-activities/'.$stepActivity->id
        );

        $this->response->assertStatus(404);
    }
}
