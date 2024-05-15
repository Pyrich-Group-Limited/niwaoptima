<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\ActorRole;

class ActorRoleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_actor_role()
    {
        $actorRole = ActorRole::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/actor-roles', $actorRole
        );

        $this->assertApiResponse($actorRole);
    }

    /**
     * @test
     */
    public function test_read_actor_role()
    {
        $actorRole = ActorRole::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/actor-roles/'.$actorRole->id
        );

        $this->assertApiResponse($actorRole->toArray());
    }

    /**
     * @test
     */
    public function test_update_actor_role()
    {
        $actorRole = ActorRole::factory()->create();
        $editedActorRole = ActorRole::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/actor-roles/'.$actorRole->id,
            $editedActorRole
        );

        $this->assertApiResponse($editedActorRole);
    }

    /**
     * @test
     */
    public function test_delete_actor_role()
    {
        $actorRole = ActorRole::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/actor-roles/'.$actorRole->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/actor-roles/'.$actorRole->id
        );

        $this->response->assertStatus(404);
    }
}
