<?php

namespace Modules\EmployerManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\EmployerManager\Tests\TestCase;
use Modules\EmployerManager\Tests\ApiTestTrait;
use Modules\EmployerManager\Models\Employer;

class EmployerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_employer()
    {
        $employer = Employer::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/employers', $employer
        );

        $this->assertApiResponse($employer);
    }

    /**
     * @test
     */
    public function test_read_employer()
    {
        $employer = Employer::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/employers/'.$employer->id
        );

        $this->assertApiResponse($employer->toArray());
    }

    /**
     * @test
     */
    public function test_update_employer()
    {
        $employer = Employer::factory()->create();
        $editedEmployer = Employer::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/employers/'.$employer->id,
            $editedEmployer
        );

        $this->assertApiResponse($editedEmployer);
    }

    /**
     * @test
     */
    public function test_delete_employer()
    {
        $employer = Employer::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/employers/'.$employer->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/employers/'.$employer->id
        );

        $this->response->assertStatus(404);
    }
}
