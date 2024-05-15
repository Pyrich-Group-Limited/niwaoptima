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
    Route::prefix('approval')->group(function () {
        Route::get('/', 'ApprovalController@index');
        Route::get('type/{type}/flow/create', [Modules\Approval\Http\Controllers\FlowController::class, 'create'])->name('flow.create');
        Route::get('type/{type}/flow/edit', [Modules\Approval\Http\Controllers\FlowController::class, 'edit'])->name('flow.edit');
        Route::post('type/{type}/flow', [Modules\Approval\Http\Controllers\FlowController::class, 'store'])->name('flow.store');
        /*         Route::resource('type/{type}/flow', Modules\Approval\Http\Controllers\FlowController::class);*/
        Route::resource('type', Modules\Approval\Http\Controllers\TypeController::class);
        Route::resource('request', Modules\Approval\Http\Controllers\RequestController::class);
        Route::resource('appraisal', Modules\Approval\Http\Controllers\AppraisalController::class);
    });
});
