<?php

namespace Modules\Leaves\Tests\Repositories;

use Modules\Leaves\Models\leaves;
use Modules\Leaves\Repositories\leavesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Leaves\Tests\TestCase;
use Modules\Leaves\Tests\ApiTestTrait;

class leavesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected leavesRepository $leavesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->leavesRepo = app(leavesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_leaves()
    {
        $leaves = leaves::factory()->make()->toArray();

        $createdleaves = $this->leavesRepo->create($leaves);

        $createdleaves = $createdleaves->toArray();
        $this->assertArrayHasKey('id', $createdleaves);
        $this->assertNotNull($createdleaves['id'], 'Created leaves must have id specified');
        $this->assertNotNull(leaves::find($createdleaves['id']), 'leaves with given id must be in DB');
        $this->assertModelData($leaves, $createdleaves);
    }

    /**
     * @test read
     */
    public function test_read_leaves()
    {
        $leaves = leaves::factory()->create();

        $dbleaves = $this->leavesRepo->find($leaves->id);

        $dbleaves = $dbleaves->toArray();
        $this->assertModelData($leaves->toArray(), $dbleaves);
    }

    /**
     * @test update
     */
    public function test_update_leaves()
    {
        $leaves = leaves::factory()->create();
        $fakeleaves = leaves::factory()->make()->toArray();

        $updatedleaves = $this->leavesRepo->update($fakeleaves, $leaves->id);

        $this->assertModelData($fakeleaves, $updatedleaves->toArray());
        $dbleaves = $this->leavesRepo->find($leaves->id);
        $this->assertModelData($fakeleaves, $dbleaves->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_leaves()
    {
        $leaves = leaves::factory()->create();

        $resp = $this->leavesRepo->delete($leaves->id);

        $this->assertTrue($resp);
        $this->assertNull(leaves::find($leaves->id), 'leaves should not exist in DB');
    }
}
