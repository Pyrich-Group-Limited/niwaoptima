<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\Correspondence;

class CorrespondenceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_correspondence()
    {
        $correspondence = Correspondence::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/correspondences', $correspondence
        );

        $this->assertApiResponse($correspondence);
    }

    /**
     * @test
     */
    public function test_read_correspondence()
    {
        $correspondence = Correspondence::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/correspondences/'.$correspondence->id
        );

        $this->assertApiResponse($correspondence->toArray());
    }

    /**
     * @test
     */
    public function test_update_correspondence()
    {
        $correspondence = Correspondence::factory()->create();
        $editedCorrespondence = Correspondence::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/correspondences/'.$correspondence->id,
            $editedCorrespondence
        );

        $this->assertApiResponse($editedCorrespondence);
    }

    /**
     * @test
     */
    public function test_delete_correspondence()
    {
        $correspondence = Correspondence::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/correspondences/'.$correspondence->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/correspondences/'.$correspondence->id
        );

        $this->response->assertStatus(404);
    }
}
