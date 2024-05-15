<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\CorrespondenceHasUser;

class CorrespondenceHasUserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/correspondence-has-users', $correspondenceHasUser
        );

        $this->assertApiResponse($correspondenceHasUser);
    }

    /**
     * @test
     */
    public function test_read_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/correspondence-has-users/'.$correspondenceHasUser->id
        );

        $this->assertApiResponse($correspondenceHasUser->toArray());
    }

    /**
     * @test
     */
    public function test_update_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->create();
        $editedCorrespondenceHasUser = CorrespondenceHasUser::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/correspondence-has-users/'.$correspondenceHasUser->id,
            $editedCorrespondenceHasUser
        );

        $this->assertApiResponse($editedCorrespondenceHasUser);
    }

    /**
     * @test
     */
    public function test_delete_correspondence_has_user()
    {
        $correspondenceHasUser = CorrespondenceHasUser::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/correspondence-has-users/'.$correspondenceHasUser->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/correspondence-has-users/'.$correspondenceHasUser->id
        );

        $this->response->assertStatus(404);
    }
}
