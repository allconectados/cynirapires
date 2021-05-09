<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Proatec\Http\Controllers\ProatecController;
use Modules\Administration\Http\Controllers\AdministrationController;
use Modules\Coordination\Http\Controllers\CoordinationController;
use Modules\Secretary\Http\Controllers\SecretaryController;
use Modules\Student\Http\Controllers\StudentController;
use Modules\Teacher\Http\Controllers\TeacherController;
use Modules\Visitant\Http\Controllers\VisitantController;

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

//ROTAS DE ADMIN ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/admins')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('modules.admins.index');

});

//ROTAS DE GESTÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/administrations')->middleware(['auth'])->group(function () {
    Route::get('/', [AdministrationController::class, 'index'])->name('modules.administrations.index');

});

//ROTAS DE COORDENAÇÃO ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/coordinations')->middleware(['auth'])->group(function () {
    Route::get('/', [CoordinationController::class, 'index'])->name('modules.coordinations.index');

});

//ROTAS DE PROATEC ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/proatecs')->middleware(['auth'])->group(function () {
    Route::get('/', [ProatecController::class, 'index'])->name('modules.proatecs.index');

});

//ROTAS DE SECRETARIA ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/secretaries')->middleware(['auth'])->group(function () {
    Route::get('/', [SecretaryController::class, 'index'])->name('modules.secretaries.index');

});

//ROTAS DE PROFESSORES ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/teachers')->middleware(['auth'])->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('modules.teachers.index');

});

//ROTAS DE PROFESSORES ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/students')->middleware(['auth'])->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('modules.students.index');

});

//ROTAS DE PROFESSORES ///////////////////////////////////////////////////////////////////////////////////
Route::prefix('painel/visitants')->middleware(['auth'])->group(function () {
    Route::get('/', [VisitantController::class, 'index'])->name('modules.visitants.index');

});