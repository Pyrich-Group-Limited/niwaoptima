<?php

use Illuminate\Support\Facades\Route;
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

Route::prefix('unitmanager')->group(function() {
    Route::get('/', 'UnitManagerController@index');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('units')->group(function () {
        Route::resource('units', Modules\UnitManager\Http\Controllers\UnitController::class);
    //    Route::get('/dept/{departmentid}','UnitController@getUnitsByDepartment');
       Route::get('/staff/{departmentId}', 'UnitController@getUsersByDepartment');
       Route::get('/branches/{branchId}', 'UnitController@getUsersByBranch');
    });
    Route::get('/dept/{departmentid}','UnitController@getUnitsByDepartment');

    Route::prefix('unithead')->group(function () {
        Route::resource('unithead', Modules\UnitManager\Http\Controllers\UnitHeadController::class);
    });
    Route::prefix('region')->group(function () {
        Route::resource('region', Modules\UnitManager\Http\Controllers\RegionController::class);
    });
});