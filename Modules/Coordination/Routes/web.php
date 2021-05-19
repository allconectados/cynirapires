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

Route::prefix('coordination')->group(function () {
    Route::get('/dashboard', 'CoordinationController@index')->name('modules.coordinations.dashboard');

//    Route::get('/dashboard/conselho', 'ConselhoPrimeiroBimestreController@conselho')
//        ->name('coordinations.conselho');

//    Route::get('/dashboard/conselho-primeiro-bimestre/filter/combine/',
//        'ConselhoPrimeiroBimestreController@filterConselhoPrimeiroBimestre')
//        ->name('filterConselhoPrimeiroBimestre');

//    Route::get('/dashboard/conselho-primeiro-bimestre', 'ConselhoPrimeiroBimestreController@conselhoPrimeiroBimestre')
//        ->name('coordinations.conselho.primeiro.bimestre');
});


Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/years', 'YearController@index')->name('coordinations.years.index');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/{year}/stages', 'StageController@index')->name('coordinations.stages.index');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/series', 'SerieController@index')->name('coordinations.series.index');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/{serie}/rooms', 'RoomController@index')->name('coordinations.rooms.index');
    Route::get('/{year}/{stage}/{serie}/rooms/{room}/edit', 'RoomController@edit')->name('coordinations.rooms.edit');
    Route::get('/{year}/{stage}/{serie}/{room}/students',
        'RoomController@students')->name('coordinations.rooms.students');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {

    Route::get('/{year}/{stage}/{serie}/{room}/conselho','ConselhoController@conselho')
        ->name('coordinations.notas.conselho');

    Route::post('/{year}/{stage}/{serie}/{room}/conselho','ConselhoController@store')
        ->name('coordinations.notas.conselho.store');

    Route::get('/{year}/{stage}/{serie}/{room}/conselho/filter','ConselhoController@filterConselho')
        ->name('coordinations.notas.conselho.filter');

});
