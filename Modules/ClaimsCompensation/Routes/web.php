<?php
use Illuminate\Support\Facades\Route;
use Modules\ClaimsCompensation\Http\Controllers\AccidentClaimController;
use Modules\ClaimsCompensation\Http\Controllers\DeathClaimController;
use Modules\ClaimsCompensation\Http\Controllers\DiseaseClaimController;
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

Route::prefix('claimscompensation')->group(function() {
    Route::get('/', 'ClaimsCompensationController@index');
    Route::post('/','ClaimsCompensationController@searchpage')->name('ecs_number');
    Route::get('/searchpage','ClaimsCompensationController@showsearchpage')->name('searchpage');
});

Route::middleware(['auth'])->group(function () {
    
    Route::resource('claim/accident', AccidentClaimController::class);
    Route::resource('claim/death', DeathClaimController::class);
    Route::resource('claim/disease', DiseaseClaimController::class);
    Route::get('/claim/death/{id}', [DeathClaimController::class, 'show'])->name('death.claims.show');
    Route::get('/claim/disease/{id}', [DiseaseClaimController::class, 'show'])->name('disease.claims.show');
    Route::get('/claim/accident/{id}', [AccidentClaimController::class, 'show'])->name('accident.claims.show');


    Route::prefix('claimscompensation')->group(function () {
        Route::resource('claimscompensation', Modules\ClaimsCompensation\Http\Controllers\ClaimsCompensationController::class);
    });
});
