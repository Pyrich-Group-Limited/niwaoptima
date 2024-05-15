<?php

namespace Modules\DocumentManager\Tests\Repositories;

use Modules\DocumentManager\Models\DocumentVersion;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\DocumentManager\Tests\TestCase;
use Modules\DocumentManager\Tests\ApiTestTrait;

class DocumentVersionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected DocumentVersionRepository $documentVersionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->documentVersionRepo = app(DocumentVersionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_document_version()
    {
        $documentVersion = DocumentVersion::factory()->make()->toArray();

        $createdDocumentVersion = $this->documentVersionRepo->create($documentVersion);

        $createdDocumentVersion = $createdDocumentVersion->toArray();
        $this->assertArrayHasKey('id', $createdDocumentVersion);
        $this->assertNotNull($createdDocumentVersion['id'], 'Created DocumentVersion must have id specified');
        $this->assertNotNull(DocumentVersion::find($createdDocumentVersion['id']), 'DocumentVersion with given id must be in DB');
        $this->assertModelData($documentVersion, $createdDocumentVersion);
    }

    /**
     * @test read
     */
    public function test_read_document_version()
    {
        $documentVersion = DocumentVersion::factory()->create();

        $dbDocumentVersion = $this->documentVersionRepo->find($documentVersion->id);

        $dbDocumentVersion = $dbDocumentVersion->toArray();
        $this->assertModelData($documentVersion->toArray(), $dbDocumentVersion);
    }

    /**
     * @test update
     */
    public function test_update_document_version()
    {
        $documentVersion = DocumentVersion::factory()->create();
        $fakeDocumentVersion = DocumentVersion::factory()->make()->toArray();

        $updatedDocumentVersion = $this->documentVersionRepo->update($fakeDocumentVersion, $documentVersion->id);

        $this->assertModelData($fakeDocumentVersion, $updatedDocumentVersion->toArray());
        $dbDocumentVersion = $this->documentVersionRepo->find($documentVersion->id);
        $this->assertModelData($fakeDocumentVersion, $dbDocumentVersion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_document_version()
    {
        $documentVersion = DocumentVersion::factory()->create();

        $resp = $this->documentVersionRepo->delete($documentVersion->id);

        $this->assertTrue($resp);
        $this->assertNull(DocumentVersion::find($documentVersion->id), 'DocumentVersion should not exist in DB');
    }
}
