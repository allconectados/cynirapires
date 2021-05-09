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
    Route::get('/{email}/disciplines', 'DisciplineController@index')->name('modules.teachers.disciplines.index');
    Route::get('/{email}/discipline/{id}', 'DisciplineController@edit')->name('modules.teachers.disciplines.edit');
    Route::get('/{email}/{discipline}/rooms', 'TeacherController@rooms')->name('modules.teachers.rooms');
});
