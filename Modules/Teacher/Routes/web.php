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

//    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/target','RoomController@target')
//        ->name('teacher.rooms.target');

    // Notas do Primeiro Bimestre
    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/notas-primeiro-bimestre',
        'NotaPrimeiroBimestreController@index')
        ->name('teacher.notes.primeiro.bimestre.index');
    Route::post('/dashboard/notas-primeiro-bimestre/store', 'NotaPrimeiroBimestreController@store')
        ->name('teacher.notas.primeiro.bimestre.store');
    Route::put('/dashboard/notas-primeiro-bimestre/update/{id}', 'NotaPrimeiroBimestreController@update')
        ->name('teacher.notas.primeiro.bimestre.update');

    // Notas do Segundo Bimestre
    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/notas-segundo-bimestre',
        'NotaSegundoBimestreController@index')
        ->name('teacher.notes.segundo.bimestre.index');
    Route::post('/dashboard/notas-segundo-bimestre/store', 'NotaSegundoBimestreController@store')
        ->name('teacher.notas.segundo.bimestre.store');
    Route::put('/dashboard/notas-segundo-bimestre/update/{id}', 'NotaSegundoBimestreController@update')
        ->name('teacher.notas.segundo.bimestre.update');

    // Notas do Terceiro Bimestre
    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/notas-terceiro-bimestre',
        'NotaTerceiroBimestreController@index')
        ->name('teacher.notes.terceiro.bimestre.index');
    Route::post('/dashboard/notas-terceiro-bimestre/store', 'NotaTerceiroBimestreController@store')
        ->name('teacher.notas.terceiro.bimestre.store');
    Route::put('/dashboard/notas-terceiro-bimestre/update/{id}', 'NotaTerceiroBimestreController@update')
        ->name('teacher.notas.terceiro.bimestre.update');

    // Notas do Quarto Bimestre
    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/notas-quarto-bimestre',
        'NotaQuartoBimestreController@index')
        ->name('teacher.notes.quarto.bimestre.index');
    Route::post('/dashboard/notas-quarto-bimestre/store', 'NotaQuartoBimestreController@store')
        ->name('teacher.notas.quarto.bimestre.store');
    Route::put('/dashboard/notas-quarto-bimestre/update/{id}', 'NotaQuartoBimestreController@update')
        ->name('teacher.notas.quarto.bimestre.update');

    // Notas do Conceito Final
    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/notas-conceito-final',
        'NotaConceitoFinalController@index')
        ->name('teacher.notes.conceito.final.index');
    Route::post('/dashboard/notas-conceito-final/store', 'NotaConceitoFinalController@store')
        ->name('teacher.notas.conceito.final.store');
    Route::put('/dashboard/notas-conceito-final/update/{id}', 'NotaConceitoFinalController@update')
        ->name('teacher.notas.conceito.final.update');

//    Route::get('/dashboard/{year}/{stage}/{serie}/{room}/{discipline}/notas-bimestre','NotasBimestreRegularController@notaBimestre')
//        ->name('teacher.disciplines.notes');

//    // Multi insert
//    Route::post('/dashboard/notas/store','NotasBimestreRegularController@notaBimestreStore')
//        ->name('teacher.disciplines.notes.store');
//
//    // Multi update
//    Route::put('/dashboard/target/{id}/update','NotasBimestreRegularController@notaBimestreUpdate')
//        ->name('teacher.disciplines.notes.update');

});
