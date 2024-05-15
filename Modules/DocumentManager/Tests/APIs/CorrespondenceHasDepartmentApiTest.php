<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\CorrespondenceHasDepartment;

class CorrespondenceHasDepartmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/correspondence-has-departments', $correspondenceHasDepartment
        );

        $this->assertApiResponse($correspondenceHasDepartment);
    }

    /**
     * @test
     */
    public function test_read_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/correspondence-has-departments/'.$correspondenceHasDepartment->id
        );

        $this->assertApiResponse($correspondenceHasDepartment->toArray());
    }

    /**
     * @test
     */
    public function test_update_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->create();
        $editedCorrespondenceHasDepartment = CorrespondenceHasDepartment::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/correspondence-has-departments/'.$correspondenceHasDepartment->id,
            $editedCorrespondenceHasDepartment
        );

        $this->assertApiResponse($editedCorrespondenceHasDepartment);
    }

    /**
     * @test
     */
    public function test_delete_correspondence_has_department()
    {
        $correspondenceHasDepartment = CorrespondenceHasDepartment::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/correspondence-has-departments/'.$correspondenceHasDepartment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/correspondence-has-departments/'.$correspondenceHasDepartment->id
        );

        $this->response->assertStatus(404);
    }
}
