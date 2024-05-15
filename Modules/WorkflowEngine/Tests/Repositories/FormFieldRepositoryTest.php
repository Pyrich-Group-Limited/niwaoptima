<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\FormField;
use Modules\WorkflowEngine\Repositories\FormFieldRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class FormFieldRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected FormFieldRepository $formFieldRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->formFieldRepo = app(FormFieldRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_form_field()
    {
        $formField = FormField::factory()->make()->toArray();

        $createdFormField = $this->formFieldRepo->create($formField);

        $createdFormField = $createdFormField->toArray();
        $this->assertArrayHasKey('id', $createdFormField);
        $this->assertNotNull($createdFormField['id'], 'Created FormField must have id specified');
        $this->assertNotNull(FormField::find($createdFormField['id']), 'FormField with given id must be in DB');
        $this->assertModelData($formField, $createdFormField);
    }

    /**
     * @test read
     */
    public function test_read_form_field()
    {
        $formField = FormField::factory()->create();

        $dbFormField = $this->formFieldRepo->find($formField->id);

        $dbFormField = $dbFormField->toArray();
        $this->assertModelData($formField->toArray(), $dbFormField);
    }

    /**
     * @test update
     */
    public function test_update_form_field()
    {
        $formField = FormField::factory()->create();
        $fakeFormField = FormField::factory()->make()->toArray();

        $updatedFormField = $this->formFieldRepo->update($fakeFormField, $formField->id);

        $this->assertModelData($fakeFormField, $updatedFormField->toArray());
        $dbFormField = $this->formFieldRepo->find($formField->id);
        $this->assertModelData($fakeFormField, $dbFormField->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_form_field()
    {
        $formField = FormField::factory()->create();

        $resp = $this->formFieldRepo->delete($formField->id);

        $this->assertTrue($resp);
        $this->assertNull(FormField::find($formField->id), 'FormField should not exist in DB');
    }
}
