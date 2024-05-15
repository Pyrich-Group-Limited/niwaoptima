<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\ActorType;

class ActorTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_actor_type()
    {
        $actorType = ActorType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/actor-types', $actorType
        );

        $this->assertApiResponse($actorType);
    }

    /**
     * @test
     */
    public function test_read_actor_type()
    {
        $actorType = ActorType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/actor-types/'.$actorType->id
        );

        $this->assertApiResponse($actorType->toArray());
    }

    /**
     * @test
     */
    public function test_update_actor_type()
    {
        $actorType = ActorType::factory()->create();
        $editedActorType = ActorType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/actor-types/'.$actorType->id,
            $editedActorType
        );

        $this->assertApiResponse($editedActorType);
    }

    /**
     * @test
     */
    public function test_delete_actor_type()
    {
        $actorType = ActorType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/actor-types/'.$actorType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/actor-types/'.$actorType->id
        );

        $this->response->assertStatus(404);
    }
}
