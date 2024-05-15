<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\ActorType;
use Modules\WorkflowEngine\Repositories\ActorTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class ActorTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected ActorTypeRepository $actorTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->actorTypeRepo = app(ActorTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_actor_type()
    {
        $actorType = ActorType::factory()->make()->toArray();

        $createdActorType = $this->actorTypeRepo->create($actorType);

        $createdActorType = $createdActorType->toArray();
        $this->assertArrayHasKey('id', $createdActorType);
        $this->assertNotNull($createdActorType['id'], 'Created ActorType must have id specified');
        $this->assertNotNull(ActorType::find($createdActorType['id']), 'ActorType with given id must be in DB');
        $this->assertModelData($actorType, $createdActorType);
    }

    /**
     * @test read
     */
    public function test_read_actor_type()
    {
        $actorType = ActorType::factory()->create();

        $dbActorType = $this->actorTypeRepo->find($actorType->id);

        $dbActorType = $dbActorType->toArray();
        $this->assertModelData($actorType->toArray(), $dbActorType);
    }

    /**
     * @test update
     */
    public function test_update_actor_type()
    {
        $actorType = ActorType::factory()->create();
        $fakeActorType = ActorType::factory()->make()->toArray();

        $updatedActorType = $this->actorTypeRepo->update($fakeActorType, $actorType->id);

        $this->assertModelData($fakeActorType, $updatedActorType->toArray());
        $dbActorType = $this->actorTypeRepo->find($actorType->id);
        $this->assertModelData($fakeActorType, $dbActorType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_actor_type()
    {
        $actorType = ActorType::factory()->create();

        $resp = $this->actorTypeRepo->delete($actorType->id);

        $this->assertTrue($resp);
        $this->assertNull(ActorType::find($actorType->id), 'ActorType should not exist in DB');
    }
}
