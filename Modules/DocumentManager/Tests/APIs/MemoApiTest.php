<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\Memo;

class MemoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_memo()
    {
        $memo = Memo::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/memos', $memo
        );

        $this->assertApiResponse($memo);
    }

    /**
     * @test
     */
    public function test_read_memo()
    {
        $memo = Memo::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/memos/'.$memo->id
        );

        $this->assertApiResponse($memo->toArray());
    }

    /**
     * @test
     */
    public function test_update_memo()
    {
        $memo = Memo::factory()->create();
        $editedMemo = Memo::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/memos/'.$memo->id,
            $editedMemo
        );

        $this->assertApiResponse($editedMemo);
    }

    /**
     * @test
     */
    public function test_delete_memo()
    {
        $memo = Memo::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/memos/'.$memo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/memos/'.$memo->id
        );

        $this->response->assertStatus(404);
    }
}
