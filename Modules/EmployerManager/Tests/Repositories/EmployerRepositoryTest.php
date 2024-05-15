<?php

namespace Modules\EmployerManager\Tests\Repositories;

use Modules\EmployerManager\Models\Employer;
use Modules\EmployerManager\Repositories\EmployerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\EmployerManager\Tests\TestCase;
use Modules\EmployerManager\Tests\ApiTestTrait;

class EmployerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected EmployerRepository $employerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->employerRepo = app(EmployerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_employer()
    {
        $employer = Employer::factory()->make()->toArray();

        $createdEmployer = $this->employerRepo->create($employer);

        $createdEmployer = $createdEmployer->toArray();
        $this->assertArrayHasKey('id', $createdEmployer);
        $this->assertNotNull($createdEmployer['id'], 'Created Employer must have id specified');
        $this->assertNotNull(Employer::find($createdEmployer['id']), 'Employer with given id must be in DB');
        $this->assertModelData($employer, $createdEmployer);
    }

    /**
     * @test read
     */
    public function test_read_employer()
    {
        $employer = Employer::factory()->create();

        $dbEmployer = $this->employerRepo->find($employer->id);

        $dbEmployer = $dbEmployer->toArray();
        $this->assertModelData($employer->toArray(), $dbEmployer);
    }

    /**
     * @test update
     */
    public function test_update_employer()
    {
        $employer = Employer::factory()->create();
        $fakeEmployer = Employer::factory()->make()->toArray();

        $updatedEmployer = $this->employerRepo->update($fakeEmployer, $employer->id);

        $this->assertModelData($fakeEmployer, $updatedEmployer->toArray());
        $dbEmployer = $this->employerRepo->find($employer->id);
        $this->assertModelData($fakeEmployer, $dbEmployer->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_employer()
    {
        $employer = Employer::factory()->create();

        $resp = $this->employerRepo->delete($employer->id);

        $this->assertTrue($resp);
        $this->assertNull(Employer::find($employer->id), 'Employer should not exist in DB');
    }
}
