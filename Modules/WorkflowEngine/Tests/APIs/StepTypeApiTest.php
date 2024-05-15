<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\StepType;

class StepTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_step_type()
    {
        $stepType = StepType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/step-types', $stepType
        );

        $this->assertApiResponse($stepType);
    }

    /**
     * @test
     */
    public function test_read_step_type()
    {
        $stepType = StepType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/step-types/'.$stepType->id
        );

        $this->assertApiResponse($stepType->toArray());
    }

    /**
     * @test
     */
    public function test_update_step_type()
    {
        $stepType = StepType::factory()->create();
        $editedStepType = StepType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/step-types/'.$stepType->id,
            $editedStepType
        );

        $this->assertApiResponse($editedStepType);
    }

    /**
     * @test
     */
    public function test_delete_step_type()
    {
        $stepType = StepType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/step-types/'.$stepType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/step-types/'.$stepType->id
        );

        $this->response->assertStatus(404);
    }
}
