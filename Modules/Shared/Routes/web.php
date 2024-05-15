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

Route::middleware(['auth'])->group(function () {
    Route::prefix('shared')->group(function () {
        Route::resource('branches', Modules\Shared\Http\Controllers\BranchController::class);
        Route::get('branches/departments/get/{id}', [Modules\Shared\Http\Controllers\BranchController::class, 'departments'])->name('branches.departments.get');
        Route::resource('departments', Modules\Shared\Http\Controllers\DepartmentController::class);
    });
});
