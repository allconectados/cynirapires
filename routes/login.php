<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])
    ->name('social.login');

Route::get('/login/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'redirectProviderCallback'])
    ->name('social.callback');

Auth::routes();

// Retorna dashboard de proatec do sistema
Route::get('/dashboard/proatecs', [App\Http\Controllers\DashboardProatecController::class, 'index'])
    ->name('dashboard.proatecs');

// Retorna dashboard de gestão do sistema
Route::get('/dashboard/administrations', [App\Http\Controllers\DashboardAdministrationController::class, 'index'])
    ->name('dashboard.administrations');

// Retorna dashboard de coordenação do sistema
Route::get('/dashboard/coordinations', [App\Http\Controllers\DashboardCoordinationController::class, 'index'])
    ->name('dashboard.coordinations');

// Retorna dashboard de secreatria do sistema
Route::get('/dashboard/secretaries', [App\Http\Controllers\DashboardSecretaryController::class, 'index'])
    ->name('dashboard.secretaries');

// Retorna dashboard de professores do sistema
Route::get('/dashboard/teachers', [App\Http\Controllers\DashboardTeacherController::class, 'index'])
    ->name('dashboard.teachers');

// Retorna dashboard de estudantes do sistema
Route::get('/dashboard/students', [App\Http\Controllers\DashboardStudentController::class, 'index'])
    ->name('dashboard.students');

// Retorna dashboard de visitantes do sistema
Route::get('/dashboard/visitants', [App\Http\Controllers\DashboardVisitantController::class, 'index'])
    ->name('dashboard.visitants');
