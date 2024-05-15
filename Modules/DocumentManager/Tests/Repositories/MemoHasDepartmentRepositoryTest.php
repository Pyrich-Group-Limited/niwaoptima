<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\MemoHasDepartment;
use Modules\DocumentManager\Repositories\MemoHasDepartmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class MemoHasDepartmentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected MemoHasDepartmentRepository $memoHasDepartmentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->memoHasDepartmentRepo = app(MemoHasDepartmentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->make()->toArray();

        $createdMemoHasDepartment = $this->memoHasDepartmentRepo->create($memoHasDepartment);

        $createdMemoHasDepartment = $createdMemoHasDepartment->toArray();
        $this->assertArrayHasKey('id', $createdMemoHasDepartment);
        $this->assertNotNull($createdMemoHasDepartment['id'], 'Created MemoHasDepartment must have id specified');
        $this->assertNotNull(MemoHasDepartment::find($createdMemoHasDepartment['id']), 'MemoHasDepartment with given id must be in DB');
        $this->assertModelData($memoHasDepartment, $createdMemoHasDepartment);
    }

    /**
     * @test read
     */
    public function test_read_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->create();

        $dbMemoHasDepartment = $this->memoHasDepartmentRepo->find($memoHasDepartment->id);

        $dbMemoHasDepartment = $dbMemoHasDepartment->toArray();
        $this->assertModelData($memoHasDepartment->toArray(), $dbMemoHasDepartment);
    }

    /**
     * @test update
     */
    public function test_update_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->create();
        $fakeMemoHasDepartment = MemoHasDepartment::factory()->make()->toArray();

        $updatedMemoHasDepartment = $this->memoHasDepartmentRepo->update($fakeMemoHasDepartment, $memoHasDepartment->id);

        $this->assertModelData($fakeMemoHasDepartment, $updatedMemoHasDepartment->toArray());
        $dbMemoHasDepartment = $this->memoHasDepartmentRepo->find($memoHasDepartment->id);
        $this->assertModelData($fakeMemoHasDepartment, $dbMemoHasDepartment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->create();

        $resp = $this->memoHasDepartmentRepo->delete($memoHasDepartment->id);

        $this->assertTrue($resp);
        $this->assertNull(MemoHasDepartment::find($memoHasDepartment->id), 'MemoHasDepartment should not exist in DB');
    }
}
