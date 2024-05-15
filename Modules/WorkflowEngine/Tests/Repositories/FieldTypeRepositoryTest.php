<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\FieldType;
use Modules\WorkflowEngine\Repositories\FieldTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class FieldTypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected FieldTypeRepository $fieldTypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->fieldTypeRepo = app(FieldTypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_field_type()
    {
        $fieldType = FieldType::factory()->make()->toArray();

        $createdFieldType = $this->fieldTypeRepo->create($fieldType);

        $createdFieldType = $createdFieldType->toArray();
        $this->assertArrayHasKey('id', $createdFieldType);
        $this->assertNotNull($createdFieldType['id'], 'Created FieldType must have id specified');
        $this->assertNotNull(FieldType::find($createdFieldType['id']), 'FieldType with given id must be in DB');
        $this->assertModelData($fieldType, $createdFieldType);
    }

    /**
     * @test read
     */
    public function test_read_field_type()
    {
        $fieldType = FieldType::factory()->create();

        $dbFieldType = $this->fieldTypeRepo->find($fieldType->id);

        $dbFieldType = $dbFieldType->toArray();
        $this->assertModelData($fieldType->toArray(), $dbFieldType);
    }

    /**
     * @test update
     */
    public function test_update_field_type()
    {
        $fieldType = FieldType::factory()->create();
        $fakeFieldType = FieldType::factory()->make()->toArray();

        $updatedFieldType = $this->fieldTypeRepo->update($fakeFieldType, $fieldType->id);

        $this->assertModelData($fakeFieldType, $updatedFieldType->toArray());
        $dbFieldType = $this->fieldTypeRepo->find($fieldType->id);
        $this->assertModelData($fakeFieldType, $dbFieldType->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_field_type()
    {
        $fieldType = FieldType::factory()->create();

        $resp = $this->fieldTypeRepo->delete($fieldType->id);

        $this->assertTrue($resp);
        $this->assertNull(FieldType::find($fieldType->id), 'FieldType should not exist in DB');
    }
}
