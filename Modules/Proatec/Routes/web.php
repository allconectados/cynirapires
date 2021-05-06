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

use Illuminate\Support\Facades\Route;
use Modules\Proatec\Http\Controllers\DisciplineController;
use Modules\Proatec\Http\Controllers\ProatecController;
use Modules\Proatec\Http\Controllers\RoomController;
use Modules\Proatec\Http\Controllers\StageController;
use Modules\Proatec\Http\Controllers\YearController;

Route::prefix('proatec')->group(function () {
    Route::get('/dashboard', 'ProatecController@index')->name('modules.proatecs.dashboard');
});

//ROTAS DE GESTÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('proatec/dashboard/administrations')->middleware(['auth'])->group(function () {
    Route::get('/', [ProatecController::class, 'indexAdministration'])->name('modules.administrations.index');
    Route::post('/', [ProatecController::class, 'importAdministration'])->name('modules.administrations.import');
    Route::post('/store', [ProatecController::class, 'storeAdministration'])->name('modules.administrations.store');
    Route::delete('/destroy/{id}',
        [ProatecController::class, 'destroyAdministration'])->name('modules.administrations.destroy');

});

//ROTAS DE COORDENAÇÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('proatec/dashboard/coordinations')->middleware(['auth'])->group(function () {
    Route::get('/', [ProatecController::class, 'indexCoordination'])->name('modules.coordinations.index');
    Route::post('/', [ProatecController::class, 'importCoordination'])->name('modules.coordinations.import');
    Route::post('/store', [ProatecController::class, 'storeCoordination'])->name('modules.coordinations.store');
    Route::delete('/destroy/{id}',
        [ProatecController::class, 'destroyCoordination'])->name('modules.coordinations.destroy');

});

//ROTAS DE PROATEC ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('proatec/dashboard/proatecs')->middleware(['auth'])->group(function () {
    Route::get('/', [ProatecController::class, 'indexProatec'])->name('modules.proatecs.index');
    Route::post('/store', [ProatecController::class, 'storeProatec'])->name('modules.proatecs.store');
    Route::delete('/destroy/{id}', [ProatecController::class, 'destroyProatec'])->name('modules.proatecs.destroy');

});

//ROTAS DE SECRETARIA ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('proatec/dashboard/secretaries')->middleware(['auth'])->group(function () {
    Route::get('/', [ProatecController::class, 'indexSecretary'])->name('modules.secretaries.index');
    Route::post('/', [ProatecController::class, 'importSecretary'])->name('modules.secretaries.import');
    Route::post('/store', [ProatecController::class, 'storeSecretary'])->name('modules.secretaries.store');
    Route::delete('/destroy/{id}', [ProatecController::class, 'destroySecretary'])->name('modules.secretaries.destroy');
});

//ROTAS DE PROFESSORES ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('proatec/dashboard/teachers')->middleware(['auth'])->group(function () {
    Route::get('/', [ProatecController::class, 'indexTeacher'])->name('modules.teachers.index');
    Route::post('/', [ProatecController::class, 'importTeacher'])->name('modules.teachers.import');
    Route::post('/store', [ProatecController::class, 'storeTeacher'])->name('modules.teachers.store');
    Route::get('/{id}/edit', [ProatecController::class, 'editTeacher'])->name('modules.teachers.edit');
    Route::put('/update/{id}', [ProatecController::class, 'updateTeacher'])->name('modules.teachers.update');
    Route::delete('/destroy/{id}', [ProatecController::class, 'destroyTeacher'])->name('modules.teachers.destroy');
});

Route::prefix('proatec/dashboard/years')->middleware('auth')->group(function () {
    Route::get('/', [YearController::class, 'index'])->name('modules.years.index');
    Route::post('/store', [YearController::class, 'store'])->name('modules.years.store');
    Route::get('/{id}/edit', [YearController::class, 'edit'])->name('modules.years.edit');
    Route::put('/update/{id}', [YearController::class, 'update'])->name('modules.years.update');
    Route::delete('/destroy/{id}', [YearController::class, 'destroy'])->name('modules.years.destroy');
});
Route::prefix('proatec/dashboard/stages')->middleware('auth')->group(function () {
    Route::get('/', [StageController::class, 'index'])->name('modules.stages.index');
    Route::post('/store', [StageController::class, 'store'])->name('modules.stages.store');
    Route::get('/{id}/edit', [StageController::class, 'edit'])->name('modules.stages.edit');
    Route::put('/update/{id}', [StageController::class, 'update'])->name('modules.stages.update');
    Route::delete('/destroy/{id}', [StageController::class, 'destroy'])->name('modules.stages.destroy');
});
Route::prefix('proatec/dashboard/rooms')->middleware('auth')->group(function () {
    Route::get('/', [RoomController::class, 'index'])->name('modules.rooms.index');
    Route::post('/store', [RoomController::class, 'store'])->name('modules.rooms.store');
    Route::get('/{id}/edit', [RoomController::class, 'edit'])->name('modules.rooms.edit');
    Route::put('/update/{id}', [RoomController::class, 'update'])->name('modules.rooms.update');
    Route::delete('/destroy/{id}', [RoomController::class, 'destroy'])->name('modules.rooms.destroy');
});
Route::prefix('proatec/dashboard/disciplines')->middleware('auth')->group(function () {
    Route::get('/', [DisciplineController::class, 'index'])->name('modules.disciplines.index');
    Route::post('/', [DisciplineController::class, 'importDiscipline'])->name('modules.disciplines.import');
    Route::post('/store', [DisciplineController::class, 'store'])->name('modules.disciplines.store');
    Route::get('/{id}/edit', [DisciplineController::class, 'edit'])->name('modules.disciplines.edit');
    Route::put('/update/{id}', [DisciplineController::class, 'update'])->name('modules.disciplines.update');
    Route::delete('/destroy/{id}', [DisciplineController::class, 'destroy'])->name('modules.disciplines.destroy');
});
