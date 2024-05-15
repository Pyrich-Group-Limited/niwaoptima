<?php

namespace Modules\Leaves\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\Leaves\Tests\TestCase;
use Modules\Leaves\Tests\ApiTestTrait;
use Modules\Leaves\Models\leaves;

class leavesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_leaves()
    {
        $leaves = leaves::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/leaves', $leaves
        );

        $this->assertApiResponse($leaves);
    }

    /**
     * @test
     */
    public function test_read_leaves()
    {
        $leaves = leaves::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/leaves/'.$leaves->id
        );

        $this->assertApiResponse($leaves->toArray());
    }

    /**
     * @test
     */
    public function test_update_leaves()
    {
        $leaves = leaves::factory()->create();
        $editedleaves = leaves::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/leaves/'.$leaves->id,
            $editedleaves
        );

        $this->assertApiResponse($editedleaves);
    }

    /**
     * @test
     */
    public function test_delete_leaves()
    {
        $leaves = leaves::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/leaves/'.$leaves->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/leaves/'.$leaves->id
        );

        $this->response->assertStatus(404);
    }
}
