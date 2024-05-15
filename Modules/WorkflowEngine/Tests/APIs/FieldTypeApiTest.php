<?php

namespace Modules\WorkflowEngine\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;
use Modules\WorkflowEngine\Models\FieldType;

class FieldTypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_field_type()
    {
        $fieldType = FieldType::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/field-types', $fieldType
        );

        $this->assertApiResponse($fieldType);
    }

    /**
     * @test
     */
    public function test_read_field_type()
    {
        $fieldType = FieldType::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/field-types/'.$fieldType->id
        );

        $this->assertApiResponse($fieldType->toArray());
    }

    /**
     * @test
     */
    public function test_update_field_type()
    {
        $fieldType = FieldType::factory()->create();
        $editedFieldType = FieldType::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/field-types/'.$fieldType->id,
            $editedFieldType
        );

        $this->assertApiResponse($editedFieldType);
    }

    /**
     * @test
     */
    public function test_delete_field_type()
    {
        $fieldType = FieldType::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/field-types/'.$fieldType->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/field-types/'.$fieldType->id
        );

        $this->response->assertStatus(404);
    }
}
