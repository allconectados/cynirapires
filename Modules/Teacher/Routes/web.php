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

Route::prefix('teacher')->group(function() {
    Route::get('/dashboard', 'TeacherController@index')->name('modules.teachers.dashboard');
    Route::get('/dashboard/anos', 'YearController@index')->name('teachers.years.index');
    Route::get('/dashboard/{year}/stages', 'StageController@index')->name('teachers.stages.index');
    Route::get('/dashboard/{year}/salas', 'StageController@index')->name('teachers.salas.index');

    Route::get('/dashboard/{year}/{stage}/series', 'SerieController@index')
        ->name('teachers.series.index');

    Route::get('/dashboard/{year}/{stage}/{serie}/periodos', 'PeriodController@index')
        ->name('teachers.periods.index');

    Route::get('/dashboard/{year}/{stage}/{serie}/{period}/rooms', 'RoomController@index')
        ->name('teachers.rooms.index');

    Route::get('/dashboard/{year}/{stage}/{serie}/{period}/{room}/students', 'StudentController@index')
        ->name('teachers.students.index');


    Route::get('/dashboard/{year}/{stage}/{serie}/{period}/{room}/{discipline}/show','RoomController@show')
        ->name('teacher.rooms.show');

});
