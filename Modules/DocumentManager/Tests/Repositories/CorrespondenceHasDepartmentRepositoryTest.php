<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\CorrespondenceHasDepartment;
use Modules\DocumentManager\Repositories\CorrespondenceHasDepartmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class CorrespondenceHasDepartmentRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected CorrespondenceHasDepartmentRepository $correspondenceHasDepartmentRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->correspondenceHasDepartmentRepo = app(CorrespondenceHasDepartmentRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->make()->toArray();

        $createdCorrespondenceHasDepartment = $this->correspondenceHasDepartmentRepo->create($correspondenceHasDepartment);

        $createdCorrespondenceHasDepartment = $createdCorrespondenceHasDepartment->toArray();
        $this->assertArrayHasKey('id', $createdCorrespondenceHasDepartment);
        $this->assertNotNull($createdCorrespondenceHasDepartment['id'], 'Created CorrespondenceHasDepartment must have id specified');
        $this->assertNotNull(CorrespondenceHasDepartment::find($createdCorrespondenceHasDepartment['id']), 'CorrespondenceHasDepartment with given id must be in DB');
        $this->assertModelData($correspondenceHasDepartment, $createdCorrespondenceHasDepartment);
    }

    /**
     * @test read
     */
    public function test_read_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->create();

        $dbCorrespondenceHasDepartment = $this->correspondenceHasDepartmentRepo->find($correspondenceHasDepartment->id);

        $dbCorrespondenceHasDepartment = $dbCorrespondenceHasDepartment->toArray();
        $this->assertModelData($correspondenceHasDepartment->toArray(), $dbCorrespondenceHasDepartment);
    }

    /**
     * @test update
     */
    public function test_update_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->create();
        $fakeCorrespondenceHasDepartment = CorrespondenceHasDepartment::factory()->make()->toArray();

        $updatedCorrespondenceHasDepartment = $this->correspondenceHasDepartmentRepo->update($fakeCorrespondenceHasDepartment, $correspondenceHasDepartment->id);

        $this->assertModelData($fakeCorrespondenceHasDepartment, $updatedCorrespondenceHasDepartment->toArray());
        $dbCorrespondenceHasDepartment = $this->correspondenceHasDepartmentRepo->find($correspondenceHasDepartment->id);
        $this->assertModelData($fakeCorrespondenceHasDepartment, $dbCorrespondenceHasDepartment->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->create();

        $resp = $this->correspondenceHasDepartmentRepo->delete($correspondenceHasDepartment->id);

        $this->assertTrue($resp);
        $this->assertNull(CorrespondenceHasDepartment::find($correspondenceHasDepartment->id), 'CorrespondenceHasDepartment should not exist in DB');
    }
}
