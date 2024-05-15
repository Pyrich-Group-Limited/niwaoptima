<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\MemoHasUser;
use Modules\DocumentManager\Repositories\MemoHasUserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class MemoHasUserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected MemoHasUserRepository $memoHasUserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->memoHasUserRepo = app(MemoHasUserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->make()->toArray();

        $createdMemoHasUser = $this->memoHasUserRepo->create($memoHasUser);

        $createdMemoHasUser = $createdMemoHasUser->toArray();
        $this->assertArrayHasKey('id', $createdMemoHasUser);
        $this->assertNotNull($createdMemoHasUser['id'], 'Created MemoHasUser must have id specified');
        $this->assertNotNull(MemoHasUser::find($createdMemoHasUser['id']), 'MemoHasUser with given id must be in DB');
        $this->assertModelData($memoHasUser, $createdMemoHasUser);
    }

    /**
     * @test read
     */
    public function test_read_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->create();

        $dbMemoHasUser = $this->memoHasUserRepo->find($memoHasUser->id);

        $dbMemoHasUser = $dbMemoHasUser->toArray();
        $this->assertModelData($memoHasUser->toArray(), $dbMemoHasUser);
    }

    /**
     * @test update
     */
    public function test_update_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->create();
        $fakeMemoHasUser = MemoHasUser::factory()->make()->toArray();

        $updatedMemoHasUser = $this->memoHasUserRepo->update($fakeMemoHasUser, $memoHasUser->id);

        $this->assertModelData($fakeMemoHasUser, $updatedMemoHasUser->toArray());
        $dbMemoHasUser = $this->memoHasUserRepo->find($memoHasUser->id);
        $this->assertModelData($fakeMemoHasUser, $dbMemoHasUser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->create();

        $resp = $this->memoHasUserRepo->delete($memoHasUser->id);

        $this->assertTrue($resp);
        $this->assertNull(MemoHasUser::find($memoHasUser->id), 'MemoHasUser should not exist in DB');
    }
}
