<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\MemoHasDepartment;

class MemoHasDepartmentApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/memo-has-departments', $memoHasDepartment
        );

        $this->assertApiResponse($memoHasDepartment);
    }

    /**
     * @test
     */
    public function test_read_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/memo-has-departments/'.$memoHasDepartment->id
        );

        $this->assertApiResponse($memoHasDepartment->toArray());
    }

    /**
     * @test
     */
    public function test_update_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->create();
        $editedMemoHasDepartment = MemoHasDepartment::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/memo-has-departments/'.$memoHasDepartment->id,
            $editedMemoHasDepartment
        );

        $this->assertApiResponse($editedMemoHasDepartment);
    }

    /**
     * @test
     */
    public function test_delete_memo_has_department()
    {
        $memoHasDepartment = MemoHasDepartment::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/memo-has-departments/'.$memoHasDepartment->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/memo-has-departments/'.$memoHasDepartment->id
        );

        $this->response->assertStatus(404);
    }
}
