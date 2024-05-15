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

use Modules\Procurement\Http\Controllers\ProcurementController;

Route::resource('procurement', ProcurementController::class);
Route::prefix('procurements')->group(function () {
    Route::get('/supervisor', 'ProcurementController@supervisor')->name('unit.proc');

   Route::post('/supervisor/{id}','ProcurementController@supervisorupdate')->name('unitp.save');

    Route::get('/departmental', 'ProcurementController@hodprocurement')->name('hod.proc');
    Route::post('/departmental/{id}', 'ProcurementController@deptupdate')->name('hodp.save');


    Route::get('/legalProc', 'ProcurementController@legal')->name('legal.proc');
    Route::get('/legal/{id}','ProcurementController@legaledit')->name('legal.edit');
    Route::post('/legal/{id}','ProcurementController@legalupdate')->name('legalp.update');

    Route::get('/auditproc', 'ProcurementController@audit')->name('audit.proc');
    Route::get('/auditproc/{id}', 'ProcurementController@auditedit')->name('audit.edit');
    Route::post('/auditproc/{id}', 'ProcurementController@auditupdate')->name('auditp.save');

    Route::get('md','ProcurementController@md')->name('md.proc');
    Route::get('md/{id}','ProcurementController@mdedit')->name('mded.proc');
    Route::post('md/{id}','ProcurementController@mdupdate')->name('mded.save');

    Route::get('fin','ProcurementController@fin')->name('fin.proc');
    Route::get('fin{id}','ProcurementController@fined')->name('fined.proc');
    Route::post('fin{id}','ProcurementController@finupdate')->name('fined.save');

    Route::get('/departmental/{id}','ProcurementController@hodedit')->name('hod.edit');
    Route::get('{id}', 'ProcurementController@unitedit')->name('unithead');
});












