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

Route::prefix('painel/admin')->middleware('auth')->group(function () {
    Route::get('/years', 'YearController@index')->name('admins.years.index');
    Route::post('/years/store', 'YearController@store')->name('admins.years.store');
    Route::get('/years/{id}/edit', 'YearController@edit')->name('admins.years.edit');
    Route::put('/years/update/{id}','YearController@update')->name('admins.years.update');
    Route::delete('/years/destroy/{id}', 'YearController@destroy')->name('admins.years.destroy');
});

Route::prefix('painel/admin')->middleware('auth')->group(function () {
    Route::get('/{year}/stages', 'StageController@index')->name('admins.stages.index');
    Route::post('/stages/store', 'StageController@store')->name('admins.stages.store');
    Route::get('/stages/{id}/edit', 'StageController@edit')->name('admins.stages.edit');
    Route::put('/stages/update/{id}','StageController@update')->name('admins.stages.update');
    Route::delete('/stages/destroy/{id}', 'StageController@destroy')->name('admins.stages.destroy');
});

Route::prefix('painel/admin')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/series', 'SerieController@index')->name('admins.series.index');
    Route::post('/series/store', 'SerieController@store')->name('admins.series.store');
    Route::get('/series/{id}/edit', 'SerieController@edit')->name('admins.series.edit');
    Route::put('/series/update/{id}','SerieController@update')->name('admins.series.update');
    Route::delete('/series/destroy/{id}', 'SerieController@destroy')->name('admins.series.destroy');
});

Route::prefix('painel/admin')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/{serie}/periods', 'PeriodController@index')->name('admins.periods.index');
    Route::post('/periods/store', 'PeriodController@store')->name('admins.periods.store');
    Route::get('/periods/{id}/edit', 'PeriodController@edit')->name('admins.periods.edit');
    Route::put('/periods/update/{id}','PeriodController@update')->name('admins.periods.update');
    Route::delete('/periods/destroy/{id}', 'PeriodController@destroy')->name('admins.periods.destroy');
});

Route::prefix('painel/admin')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/{serie}/rooms', 'RoomController@index')->name('admins.rooms.index');
    Route::get('/{year}/{stage}/{serie}/{room}/students', 'RoomController@students')->name('admins.rooms.students');
    Route::post('/rooms/import', 'RoomController@import')->name('admins.rooms.import');
    Route::post('/rooms/store', 'RoomController@store')->name('admins.rooms.store');
    Route::get('/{year}/{stage}/{serie}/rooms/{room}/edit', 'RoomController@edit')->name('admins.rooms.edit');
    Route::put('/rooms/update/{id}','RoomController@update')->name('admins.rooms.update');
    Route::delete('/rooms/destroy/{id}', 'RoomController@destroy')->name('admins.rooms.destroy');
});

Route::prefix('painel/admin')->middleware('auth')->group(function () {
    Route::get('/disciplines', 'DisciplineController@index')->name('admins.disciplines.index');
    Route::post('/disciplines/import', 'DisciplineController@import')->name('admins.disciplines.import');
    Route::post('/disciplines/store', 'DisciplineController@store')->name('admins.disciplines.store');
    Route::get('/disciplines/{id}/edit', 'DisciplineController@edit')->name('admins.disciplines.edit');
    Route::put('/disciplines/update/{id}','DisciplineController@update')->name('admins.disciplines.update');
    Route::delete('/disciplines/destroy/{id}', 'DisciplineController@destroy')->name('admins.disciplines.destroy');
});