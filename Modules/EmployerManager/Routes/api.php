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

Route::middleware('auth:api')->get('/employermanager', function (Request $request) {
    return $request->user();
});

Route::resource('employers', Modules\EmployerManager\Http\Controllers\API\EmployerAPIController::class)
    ->except(['create', 'edit']);

Route::resource('employees', Modules\EmployerManager\Http\Controllers\API\EmployeeAPIController::class)
    ->except(['create', 'edit']);