<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\Folder;

class FolderApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_folder()
    {
        $folder = Folder::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/folders', $folder
        );

        $this->assertApiResponse($folder);
    }

    /**
     * @test
     */
    public function test_read_folder()
    {
        $folder = Folder::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/folders/'.$folder->id
        );

        $this->assertApiResponse($folder->toArray());
    }

    /**
     * @test
     */
    public function test_update_folder()
    {
        $folder = Folder::factory()->create();
        $editedFolder = Folder::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/folders/'.$folder->id,
            $editedFolder
        );

        $this->assertApiResponse($editedFolder);
    }

    /**
     * @test
     */
    public function test_delete_folder()
    {
        $folder = Folder::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/folders/'.$folder->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/folders/'.$folder->id
        );

        $this->response->assertStatus(404);
    }
}
