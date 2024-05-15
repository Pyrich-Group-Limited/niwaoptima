<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\Folder;
use Modules\DocumentManager\Repositories\FolderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class FolderRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected FolderRepository $folderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->folderRepo = app(FolderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_folder()
    {
        $folder = Folder::factory()->make()->toArray();

        $createdFolder = $this->folderRepo->create($folder);

        $createdFolder = $createdFolder->toArray();
        $this->assertArrayHasKey('id', $createdFolder);
        $this->assertNotNull($createdFolder['id'], 'Created Folder must have id specified');
        $this->assertNotNull(Folder::find($createdFolder['id']), 'Folder with given id must be in DB');
        $this->assertModelData($folder, $createdFolder);
    }

    /**
     * @test read
     */
    public function test_read_folder()
    {
        $folder = Folder::factory()->create();

        $dbFolder = $this->folderRepo->find($folder->id);

        $dbFolder = $dbFolder->toArray();
        $this->assertModelData($folder->toArray(), $dbFolder);
    }

    /**
     * @test update
     */
    public function test_update_folder()
    {
        $folder = Folder::factory()->create();
        $fakeFolder = Folder::factory()->make()->toArray();

        $updatedFolder = $this->folderRepo->update($fakeFolder, $folder->id);

        $this->assertModelData($fakeFolder, $updatedFolder->toArray());
        $dbFolder = $this->folderRepo->find($folder->id);
        $this->assertModelData($fakeFolder, $dbFolder->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_folder()
    {
        $folder = Folder::factory()->create();

        $resp = $this->folderRepo->delete($folder->id);

        $this->assertTrue($resp);
        $this->assertNull(Folder::find($folder->id), 'Folder should not exist in DB');
    }
}
