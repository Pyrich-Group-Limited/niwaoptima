<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::prefix('workflowengine')->group(function () {
        Route::resource('fieldTypes', Modules\WorkflowEngine\Http\Controllers\FieldTypeController::class);
        Route::resource('actorTypes', Modules\WorkflowEngine\Http\Controllers\ActorTypeController::class);
        Route::resource('stepActivities', Modules\WorkflowEngine\Http\Controllers\StepActivityController::class);
        Route::resource('stepTypes', Modules\WorkflowEngine\Http\Controllers\StepTypeController::class);
        Route::resource('workflowTypes', Modules\WorkflowEngine\Http\Controllers\WorkflowTypeController::class);
        Route::resource('actorRoles', Modules\WorkflowEngine\Http\Controllers\ActorRoleController::class);
        Route::resource('forms', Modules\WorkflowEngine\Http\Controllers\FormController::class);
        Route::get('forms/create/formFields/{id}', [Modules\WorkflowEngine\Http\Controllers\FormController::class, 'createFormFields'])->name('forms.formFields.create');
        Route::post('forms/storeFormFields', [Modules\WorkflowEngine\Http\Controllers\FormController::class, 'storeFormFields'])->name('forms.formFields.store');
        Route::post('forms/createTable/{id}', [Modules\WorkflowEngine\Http\Controllers\FormController::class, 'createTable'])->name('forms.table.store');
        Route::resource('workflows', Modules\WorkflowEngine\Http\Controllers\WorkflowController::class);
        Route::resource('workflowInstances', Modules\WorkflowEngine\Http\Controllers\WorkflowInstanceController::class);
        Route::resource('formFields', Modules\WorkflowEngine\Http\Controllers\FormFieldController::class);
        Route::resource('workflowSteps', Modules\WorkflowEngine\Http\Controllers\WorkflowStepController::class);
        Route::resource('workflowActivities', Modules\WorkflowEngine\Http\Controllers\WorkflowActivityController::class);
    });
});
