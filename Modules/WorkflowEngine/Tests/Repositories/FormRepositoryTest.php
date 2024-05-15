<?php

namespace Modules\WorkflowEngine\Tests\Repositories;

use Modules\WorkflowEngine\Models\Form;
use Modules\WorkflowEngine\Repositories\FormRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Modules\WorkflowEngine\Tests\TestCase;
use Modules\WorkflowEngine\Tests\ApiTestTrait;

class FormRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected FormRepository $formRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->formRepo = app(FormRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_form()
    {
        $form = Form::factory()->make()->toArray();

        $createdForm = $this->formRepo->create($form);

        $createdForm = $createdForm->toArray();
        $this->assertArrayHasKey('id', $createdForm);
        $this->assertNotNull($createdForm['id'], 'Created Form must have id specified');
        $this->assertNotNull(Form::find($createdForm['id']), 'Form with given id must be in DB');
        $this->assertModelData($form, $createdForm);
    }

    /**
     * @test read
     */
    public function test_read_form()
    {
        $form = Form::factory()->create();

        $dbForm = $this->formRepo->find($form->id);

        $dbForm = $dbForm->toArray();
        $this->assertModelData($form->toArray(), $dbForm);
    }

    /**
     * @test update
     */
    public function test_update_form()
    {
        $form = Form::factory()->create();
        $fakeForm = Form::factory()->make()->toArray();

        $updatedForm = $this->formRepo->update($fakeForm, $form->id);

        $this->assertModelData($fakeForm, $updatedForm->toArray());
        $dbForm = $this->formRepo->find($form->id);
        $this->assertModelData($fakeForm, $dbForm->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_form()
    {
        $form = Form::factory()->create();

        $resp = $this->formRepo->delete($form->id);

        $this->assertTrue($resp);
        $this->assertNull(Form::find($form->id), 'Form should not exist in DB');
    }
}
