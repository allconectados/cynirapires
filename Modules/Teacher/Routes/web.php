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

Route::prefix('teacher')->group(function () {
    Route::get('/dashboard', 'TeacherController@index')->name('modules.teachers.dashboard');

    Route::get('/dashboard/years', 'YearController@index')->name('teachers.years.index');

    Route::get('/dashboard/{year}/stages', 'StageController@index')->name('teachers.stages.index');

    Route::get('/dashboard/{year}/{stage}/series', 'SerieController@index')
        ->name('teachers.series.index');

    Route::get('/dashboard/{year}/{stage}/{serie}/rooms', 'RoomController@index')
        ->name('teachers.rooms.index');

    Route::get('/dashboard/{year}/salas', 'StageController@index')->name('teachers.salas.index');

    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/students', 'StudentController@index')
        ->name('teachers.students.index');

    // Notas do Primeiro Bimestre
    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/fechamento-bimestres',
        'NotasController@index')
        ->name('teacher.notas.bimestres.index');

    Route::put('/dashboard/notas-primeiro-bimestre/update/{id}', 'NotasController@update')
        ->name('teacher.notas.bimestres.update');
});
