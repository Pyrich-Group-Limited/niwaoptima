<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\CorrespondenceHasUser;
use Modules\DocumentManager\Repositories\CorrespondenceHasUserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class CorrespondenceHasUserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected CorrespondenceHasUserRepository $correspondenceHasUserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->correspondenceHasUserRepo = app(CorrespondenceHasUserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->make()->toArray();

        $createdCorrespondenceHasUser = $this->correspondenceHasUserRepo->create($correspondenceHasUser);

        $createdCorrespondenceHasUser = $createdCorrespondenceHasUser->toArray();
        $this->assertArrayHasKey('id', $createdCorrespondenceHasUser);
        $this->assertNotNull($createdCorrespondenceHasUser['id'], 'Created CorrespondenceHasUser must have id specified');
        $this->assertNotNull(CorrespondenceHasUser::find($createdCorrespondenceHasUser['id']), 'CorrespondenceHasUser with given id must be in DB');
        $this->assertModelData($correspondenceHasUser, $createdCorrespondenceHasUser);
    }

    /**
     * @test read
     */
    public function test_read_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->create();

        $dbCorrespondenceHasUser = $this->correspondenceHasUserRepo->find($correspondenceHasUser->id);

        $dbCorrespondenceHasUser = $dbCorrespondenceHasUser->toArray();
        $this->assertModelData($correspondenceHasUser->toArray(), $dbCorrespondenceHasUser);
    }

    /**
     * @test update
     */
    public function test_update_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->create();
        $fakeCorrespondenceHasUser = CorrespondenceHasUser::factory()->make()->toArray();

        $updatedCorrespondenceHasUser = $this->correspondenceHasUserRepo->update($fakeCorrespondenceHasUser, $correspondenceHasUser->id);

        $this->assertModelData($fakeCorrespondenceHasUser, $updatedCorrespondenceHasUser->toArray());
        $dbCorrespondenceHasUser = $this->correspondenceHasUserRepo->find($correspondenceHasUser->id);
        $this->assertModelData($fakeCorrespondenceHasUser, $dbCorrespondenceHasUser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->create();

        $resp = $this->correspondenceHasUserRepo->delete($correspondenceHasUser->id);

        $this->assertTrue($resp);
        $this->assertNull(CorrespondenceHasUser::find($correspondenceHasUser->id), 'CorrespondenceHasUser should not exist in DB');
    }
}
