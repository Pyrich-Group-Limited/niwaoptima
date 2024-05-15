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

Route::prefix('employermanager')->group(function() {
    Route::get('/', 'EmployerManagerController@index');
});

Route::get('certificate/{certificateId}/details', 'EmployerController@displayCertificateDetails')->name('certificate.details');
Route::get('certificate/{certificateId}/approve', 'EmployerController@approveCertificate')->name('certificate.approve');
Route::get('certificates', 'EmployerController@certificates')->name('certificates');

Route::resource('employers', Modules\EmployerManager\Http\Controllers\EmployerController::class);

Route::post('/upload/employer', [Modules\EmployerManager\Http\Controllers\EmployerController::class,'uploadEmployer'])->name('upload.employer');
Route::get('/bulk/employer/upload', [Modules\EmployerManager\Http\Controllers\EmployerController::class,'bulkEmployerUpload'])->name('bulk.employer.upload');

Route::get('employer/employees/{id}', 'EmployerController@employees')->name('employer.employees');
Route::resource('employees', Modules\EmployerManager\Http\Controllers\EmployeeController::class);

Route::get('employer/create-employees/{id}', 'EmployeeController@createEmployee')->name('employer.create-employees');
