<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\MemoHasUser;

class MemoHasUserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/memo-has-users', $memoHasUser
        );

        $this->assertApiResponse($memoHasUser);
    }

    /**
     * @test
     */
    public function test_read_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/memo-has-users/'.$memoHasUser->id
        );

        $this->assertApiResponse($memoHasUser->toArray());
    }

    /**
     * @test
     */
    public function test_update_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->create();
        $editedMemoHasUser = MemoHasUser::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/memo-has-users/'.$memoHasUser->id,
            $editedMemoHasUser
        );

        $this->assertApiResponse($editedMemoHasUser);
    }

    /**
     * @test
     */
    public function test_delete_memo_has_user()
    {
        $memoHasUser = MemoHasUser::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/memo-has-users/'.$memoHasUser->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/memo-has-users/'.$memoHasUser->id
        );

        $this->response->assertStatus(404);
    }
}
