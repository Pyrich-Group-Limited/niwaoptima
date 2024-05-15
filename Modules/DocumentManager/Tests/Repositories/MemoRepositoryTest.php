<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\Memo;
use Modules\DocumentManager\Repositories\MemoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class MemoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected MemoRepository $memoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->memoRepo = app(MemoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_memo()
    {
        $memo = Memo::factory()->make()->toArray();

        $createdMemo = $this->memoRepo->create($memo);

        $createdMemo = $createdMemo->toArray();
        $this->assertArrayHasKey('id', $createdMemo);
        $this->assertNotNull($createdMemo['id'], 'Created Memo must have id specified');
        $this->assertNotNull(Memo::find($createdMemo['id']), 'Memo with given id must be in DB');
        $this->assertModelData($memo, $createdMemo);
    }

    /**
     * @test read
     */
    public function test_read_memo()
    {
        $memo = Memo::factory()->create();

        $dbMemo = $this->memoRepo->find($memo->id);

        $dbMemo = $dbMemo->toArray();
        $this->assertModelData($memo->toArray(), $dbMemo);
    }

    /**
     * @test update
     */
    public function test_update_memo()
    {
        $memo = Memo::factory()->create();
        $fakeMemo = Memo::factory()->make()->toArray();

        $updatedMemo = $this->memoRepo->update($fakeMemo, $memo->id);

        $this->assertModelData($fakeMemo, $updatedMemo->toArray());
        $dbMemo = $this->memoRepo->find($memo->id);
        $this->assertModelData($fakeMemo, $dbMemo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_memo()
    {
        $memo = Memo::factory()->create();

        $resp = $this->memoRepo->delete($memo->id);

        $this->assertTrue($resp);
        $this->assertNull(Memo::find($memo->id), 'Memo should not exist in DB');
    }
}
