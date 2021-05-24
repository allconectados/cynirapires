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

Route::prefix('painel')->group(function () {
    Route::get('/coordination', 'CoordinationController@index')->name('coordinations.coordinations.index');
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

    Route::get('/{year}/{stage}/{serie}/{room}/conselho', 'ConselhoController@index')
        ->name('coordinations.conselho.index');

    Route::put('/conselho/update/{id}', 'ConselhoController@update')->name('coordinations.conselho.update');

    Route::any('/{year}/{stage}/{serie}/{room}/conselho/filter', 'ConselhoController@filterStudent')
        ->name('coordinations.conselho.filter.student');

    Route::put('/conselho/status-bimestres/{id}/update', 'ConselhoController@statusBimestreUpdate')
        ->name('coordinations.conselho.status.bimestres');
});


//ROTAS DE PROFESSORES ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/coordination/teachers')->middleware(['auth'])->group(function () {
    Route::get('/', 'TeacherController@index')->name('coordinations.teachers.index');
    Route::post('/import', 'TeacherController@import')->name('coordinations.teachers.import');
    Route::post('/store', 'TeacherController@store')->name('coordinations.teachers.store');
    Route::get('/{id}/{discipline}/edit', 'TeacherController@discipline')->name('coordinations.teachers.discipline');
    Route::put('/update/rooms/{id}', 'TeacherController@updateRoom')->name('coordinations.teachers.updateRoom');
    Route::delete('/destroy/{id}', 'TeacherController@destroy')->name('coordinations.teachers.destroy');
});


//ROTAS DE STUDENTS /////////////////////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/coordination')->middleware(['auth'])->group(function () {
    Route::get('/students', 'StudentController@index')->name('coordinations.students.index');
    Route::get('/students/{id}/edit', 'StudentController@edit')->name('coordinations.students.edit');
    Route::post('/students/import', 'StudentController@import')->name('coordinations.students.import');
    Route::post('/students/store', 'StudentController@store')->name('coordinations.students.store');
    Route::put('/students/update/{id}', 'StudentController@update')->name('coordinations.students.update');
    Route::delete('/students/destroy/{id}', 'StudentController@destroy')->name('coordinations.students.destroy');
    Route::post('/destroy-students/', 'StudentController@destroyAll')->name('coordinations.students.destroyAll');
    Route::get('/room/{roomStudent}', 'StudentController@filterDataStudent')->name('filterStudent');
    Route::any('/students/form', 'StudentController@filterDataForm')->name('filterDataForm');
});
//ROTAS DE STUDENTS /////////////////////////////////////////////////////////////////////////////////////////////////


Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/years', 'YearController@index')->name('coordinations.years.index');
    Route::post('/years/store', 'YearController@store')->name('coordinations.years.store');
    Route::get('/years/{id}/edit', 'YearController@edit')->name('coordinations.years.edit');
    Route::put('/years/update/{id}', 'YearController@update')->name('coordinations.years.update');
    Route::delete('/years/destroy/{id}', 'YearController@destroy')->name('coordinations.years.destroy');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/{year}/stages', 'StageController@index')->name('coordinations.stages.index');
    Route::post('/stages/store', 'StageController@store')->name('coordinations.stages.store');
    Route::get('/stages/{id}/edit', 'StageController@edit')->name('coordinations.stages.edit');
    Route::put('/stages/update/{id}', 'StageController@update')->name('coordinations.stages.update');
    Route::delete('/stages/destroy/{id}', 'StageController@destroy')->name('coordinations.stages.destroy');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/series', 'SerieController@index')->name('coordinations.series.index');
    Route::post('/series/store', 'SerieController@store')->name('coordinations.series.store');
    Route::get('/series/{id}/edit', 'SerieController@edit')->name('coordinations.series.edit');
    Route::put('/series/update/{id}', 'SerieController@update')->name('coordinations.series.update');
    Route::delete('/series/destroy/{id}', 'SerieController@destroy')->name('coordinations.series.destroy');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/{year}/{stage}/{serie}/rooms', 'RoomController@index')->name('coordinations.rooms.index');
    Route::get('/{year}/{stage}/{serie}/{room}/students',
        'RoomController@students')->name('coordinations.rooms.students');
    Route::post('/rooms/import', 'RoomController@import')->name('coordinations.rooms.import');
    Route::post('/rooms/store', 'RoomController@store')->name('coordinations.rooms.store');
    Route::get('/{year}/{stage}/{serie}/rooms/{room}/edit', 'RoomController@edit')->name('coordinations.rooms.edit');
    Route::put('/rooms/update/{id}', 'RoomController@update')->name('coordinations.rooms.update');
    Route::delete('/rooms/destroy/{id}', 'RoomController@destroy')->name('coordinations.rooms.destroy');
    Route::post('/create-students-table-conselho/',
        'RoomController@createTableConselho')->name('coordinations.students.createTableConselho');
});

Route::prefix('painel/coordination')->middleware('auth')->group(function () {
    Route::get('/disciplines', 'DisciplineController@index')->name('coordinations.disciplines.index');
    Route::post('/disciplines/import', 'DisciplineController@import')->name('coordinations.disciplines.import');
    Route::post('/disciplines/store', 'DisciplineController@store')->name('coordinations.disciplines.store');
    Route::get('/disciplines/{id}/edit', 'DisciplineController@edit')->name('coordinations.disciplines.edit');
    Route::put('/disciplines/update/{id}', 'DisciplineController@update')->name('coordinations.disciplines.update');
    Route::delete('/disciplines/destroy/{id}',
        'DisciplineController@destroy')->name('coordinations.disciplines.destroy');
});