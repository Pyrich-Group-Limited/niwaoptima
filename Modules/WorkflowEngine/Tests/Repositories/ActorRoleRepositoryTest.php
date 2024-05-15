<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\ActorRole;
use Modules\WorkflowEngine\Repositories\ActorRoleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class ActorRoleRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected ActorRoleRepository $actorRoleRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actorRoleRepo = app(ActorRoleRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_actor_role()
    {
        $actorRole = ActorRole::factory()->make()->toArray();

        $createdActorRole = $this->actorRoleRepo->create($actorRole);

        $createdActorRole = $createdActorRole->toArray();
        $this->assertArrayHasKey('id', $createdActorRole);
        $this->assertNotNull($createdActorRole['id'], 'Created ActorRole must have id specified');
        $this->assertNotNull(ActorRole::find($createdActorRole['id']), 'ActorRole with given id must be in DB');
        $this->assertModelData($actorRole, $createdActorRole);
    }

    /**
     * @test read
     */
    public function test_read_actor_role()
    {
        $actorRole = ActorRole::factory()->create();

        $dbActorRole = $this->actorRoleRepo->find($actorRole->id);

        $dbActorRole = $dbActorRole->toArray();
        $this->assertModelData($actorRole->toArray(), $dbActorRole);
    }

    /**
     * @test update
     */
    public function test_update_actor_role()
    {
        $actorRole = ActorRole::factory()->create();
        $fakeActorRole = ActorRole::factory()->make()->toArray();

        $updatedActorRole = $this->actorRoleRepo->update($fakeActorRole, $actorRole->id);

        $this->assertModelData($fakeActorRole, $updatedActorRole->toArray());
        $dbActorRole = $this->actorRoleRepo->find($actorRole->id);
        $this->assertModelData($fakeActorRole, $dbActorRole->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_actor_role()
    {
        $actorRole = ActorRole::factory()->create();

        $resp = $this->actorRoleRepo->delete($actorRole->id);

        $this->assertTrue($resp);
        $this->assertNull(ActorRole::find($actorRole->id), 'ActorRole should not exist in DB');
    }
}
