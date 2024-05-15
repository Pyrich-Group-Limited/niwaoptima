<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\Correspondence;
use Modules\DocumentManager\Repositories\CorrespondenceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class CorrespondenceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected CorrespondenceRepository $correspondenceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->correspondenceRepo = app(CorrespondenceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_correspondence()
    {
        $correspondence = Correspondence::factory()->make()->toArray();

        $createdCorrespondence = $this->correspondenceRepo->create($correspondence);

        $createdCorrespondence = $createdCorrespondence->toArray();
        $this->assertArrayHasKey('id', $createdCorrespondence);
        $this->assertNotNull($createdCorrespondence['id'], 'Created Correspondence must have id specified');
        $this->assertNotNull(Correspondence::find($createdCorrespondence['id']), 'Correspondence with given id must be in DB');
        $this->assertModelData($correspondence, $createdCorrespondence);
    }

    /**
     * @test read
     */
    public function test_read_correspondence()
    {
        $correspondence = Correspondence::factory()->create();

        $dbCorrespondence = $this->correspondenceRepo->find($correspondence->id);

        $dbCorrespondence = $dbCorrespondence->toArray();
        $this->assertModelData($correspondence->toArray(), $dbCorrespondence);
    }

    /**
     * @test update
     */
    public function test_update_correspondence()
    {
        $correspondence = Correspondence::factory()->create();
        $fakeCorrespondence = Correspondence::factory()->make()->toArray();

        $updatedCorrespondence = $this->correspondenceRepo->update($fakeCorrespondence, $correspondence->id);

        $this->assertModelData($fakeCorrespondence, $updatedCorrespondence->toArray());
        $dbCorrespondence = $this->correspondenceRepo->find($correspondence->id);
        $this->assertModelData($fakeCorrespondence, $dbCorrespondence->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_correspondence()
    {
        $correspondence = Correspondence::factory()->create();

        $resp = $this->correspondenceRepo->delete($correspondence->id);

        $this->assertTrue($resp);
        $this->assertNull(Correspondence::find($correspondence->id), 'Correspondence should not exist in DB');
    }
}
