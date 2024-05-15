<?php

namespace Modules\DocumentManager\Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;
use Modules\DocumentManager\Models\DocumentVersion;

class DocumentVersionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_document_version()
    {
        $documentVersion = DocumentVersion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/document-versions', $documentVersion
        );

        $this->assertApiResponse($documentVersion);
    }

    /**
     * @test
     */
    public function test_read_document_version()
    {
        $documentVersion = DocumentVersion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/document-versions/'.$documentVersion->id
        );

        $this->assertApiResponse($documentVersion->toArray());
    }

    /**
     * @test
     */
    public function test_update_document_version()
    {
        $documentVersion = DocumentVersion::factory()->create();
        $editedDocumentVersion = DocumentVersion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/document-versions/'.$documentVersion->id,
            $editedDocumentVersion
        );

        $this->assertApiResponse($editedDocumentVersion);
    }

    /**
     * @test
     */
    public function test_delete_document_version()
    {
        $documentVersion = DocumentVersion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/document-versions/'.$documentVersion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/document-versions/'.$documentVersion->id
        );

        $this->response->assertStatus(404);
    }
}
