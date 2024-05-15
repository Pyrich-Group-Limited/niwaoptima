<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('workflowengine')->group(function () {
    Route::resource('field-types', Modules\WorkflowEngine\Http\Controllers\API\FieldTypeAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('actor-types', Modules\WorkflowEngine\Http\Controllers\API\ActorTypeAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('step-activities', Modules\WorkflowEngine\Http\Controllers\API\StepActivityAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('step-types', Modules\WorkflowEngine\Http\Controllers\API\StepTypeAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('workflow-types', Modules\WorkflowEngine\Http\Controllers\API\WorkflowTypeAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('actor-roles', Modules\WorkflowEngine\Http\Controllers\API\ActorRoleAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('forms', Modules\WorkflowEngine\Http\Controllers\API\FormAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('workflows', Modules\WorkflowEngine\Http\Controllers\API\WorkflowAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('workflow-instances', Modules\WorkflowEngine\Http\Controllers\API\WorkflowInstanceAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('form-fields', Modules\WorkflowEngine\Http\Controllers\API\FormFieldAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('workflow-steps', Modules\WorkflowEngine\Http\Controllers\API\WorkflowStepAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('workflow-activities', Modules\WorkflowEngine\Http\Controllers\API\WorkflowActivityAPIController::class)
        ->except(['create', 'edit']);
});
