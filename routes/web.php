<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmploiController;

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

Route::get('/a', function () {
    return view('welcome');
});
// Route des employers
Route::get('/', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/employer/create', [EmployerController::class, 'create'])->name('employers.create');

Route::get('/employerEdit/{id}', [EmployerController::class, 'edit'])->name('employers.edit');
Route::put('/employer/{id}', [EmployerController::class, 'update'])->name('employers.update');
Route::post('employers', [EmployerController::class, 'store'])->name('employers.store');
Route::delete('employer/{id}', [EmployerController::class, 'destroy'])->name ('employers.destroy');

// Route des emplois
Route::get('/emploisI', [EmploiController::class, 'index'])->name('emplois.index');
Route::get('/emplois/create', [EmploiController::class, 'create'])->name('emplois.create');

Route::get('/emploisEdit/{id}', [EmploiController::class, 'edit'])->name('emplois.edit');
Route::put('/emplois/{id}', [EmploiController::class, 'update'])->name('emplois.update');
Route::post('emplois', [EmploiController::class, 'store'])->name('emplois.store');
Route::delete('emplois/{id}', [EmploiController::class, 'destroy'])->name ('emplois.destroy');