<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/documentmanager', function (Request $request) {
    return $request->user();
});

Route::prefix('documentmanager')->group(function () {
    Route::resource('folders', Modules\DocumentManager\Http\Controllers\API\FolderAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('documents', Modules\DocumentManager\Http\Controllers\API\DocumentAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('document-versions', Modules\DocumentManager\Http\Controllers\API\DocumentVersionAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('memos', Modules\DocumentManager\Http\Controllers\API\MemoAPIController::class)
        ->except(['create', 'edit']);


    Route::resource('correspondences', Modules\DocumentManager\Http\Controllers\API\CorrespondenceAPIController::class)
        ->except(['create', 'edit']);

    // Route::resource('correspondence-has-users', Modules\DocumentManager\Http\Controllers\API\CorrespondenceHasUserAPIController::class)
    //     ->except(['create', 'edit']);

//     Route::resource('correspondence-has-departments', Modules\DocumentManager\Http\Controllers\API\CorrespondenceHasDepartmentAPIController::class)
//         ->except(['create', 'edit']);
});
