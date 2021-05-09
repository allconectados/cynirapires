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


//ROTAS DE GESTÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admin/admins')->middleware(['auth'])->group(function () {
    Route::get('/', 'AdminController@index')->name('admins.admins.index');
    Route::get('/create', 'AdminController@create')->name('admins.admins.create');
    Route::post('/store', 'AdminController@store')->name('admins.admins.store');
    Route::delete('/destroy/{id}', 'AdminController@destroy')->name('admins.admins.destroy');

});

//ROTAS DE GESTÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admin/administrations')->middleware(['auth'])->group(function () {
    Route::get('/', 'AdministrationController@index')->name('admins.administrations.index');
    Route::post('/import', 'AdministrationController@import')->name('admins.administrations.import');
    Route::post('/store', 'AdministrationController@store')->name('admins.administrations.store');
    Route::delete('/destroy/{id}', 'AdministrationController@destroy')->name('admins.administrations.destroy');

});

//ROTAS DE COORDENAÇÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admin/coordinations')->middleware(['auth'])->group(function () {
    Route::get('/', 'CoordinationController@index')->name('admins.coordinations.index');
    Route::post('/import', 'CoordinationController@import')->name('admins.coordinations.import');
    Route::post('/store', 'CoordinationController@store')->name('admins.coordinations.store');
    Route::delete('/destroy/{id}', 'CoordinationController@destroy')->name('admins.coordinations.destroy');

});

//ROTAS DE PROATEC ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admin/proatecs')->middleware(['auth'])->group(function () {
    Route::get('/', 'ProatecController@index')->name('admins.proatecs.index');
    Route::post('/import', 'ProatecController@import')->name('admins.proatecs.import');
    Route::post('/store', 'ProatecController@store')->name('admins.proatecs.store');
    Route::delete('/destroy/{id}', 'ProatecController@destroy')->name('admins.proatecs.destroy');

});

//ROTAS DE SECRETARIA ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admin/secretaries')->middleware(['auth'])->group(function () {
    Route::get('/', 'SecretaryController@index')->name('admins.secretaries.index');
    Route::post('/import', 'SecretaryController@import')->name('admins.secretaries.import');
    Route::post('/store', 'SecretaryController@store')->name('admins.secretaries.store');
    Route::delete('/destroy/{id}', 'SecretaryController@destroy')->name('admins.secretaries.destroy');
});

//ROTAS DE PROFESSORES ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admin/teachers')->middleware(['auth'])->group(function () {
    Route::get('/', 'TeacherController@index')->name('admins.teachers.index');
    Route::post('/import', 'TeacherController@import')->name('admins.teachers.import');
    Route::post('/store', 'TeacherController@store')->name('admins.teachers.store');
    Route::get('/{id}/edit', 'TeacherController@edit')->name('admins.teachers.edit');
    Route::put('/update/disciplines/{id}', 'TeacherController@update')->name('admins.teachers.update');
    Route::get('/{id}/{discipline}/edit', 'TeacherController@discipline')->name('admins.teachers.discipline');
    Route::put('/update/rooms/{id}', 'TeacherController@updateRoom')->name('admins.teachers.updateRoom');
    Route::delete('/destroy/{id}', 'TeacherController@destroy')->name('admins.teachers.destroy');
});
