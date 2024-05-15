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

Route::prefix('shared')->group(function () {
    Route::resource('branches', Modules\Shared\Http\Controllers\API\BranchAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('departments', Modules\Shared\Http\Controllers\API\DepartmentAPIController::class)
        ->except(['create', 'edit']);
});
