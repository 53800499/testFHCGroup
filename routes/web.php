<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;

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
});
//
Route::get('/', [EmployerController::class, 'index'])->name('employers.index');
Route::get('/employer/create', [EmployerController::class, 'create'])->name('employers.create');

Route::get('/employerEdit/{id}', [EmployerController::class, 'edit'])->name('employers.edit');
Route::put('/employer/{id}', [EmployerController::class, 'update'])->name('employers.update');
Route::post('employers', [EmployerController::class, 'store'])->name('employers.store');
Route::delete('employer/{id}', [EmployerController::class, 'destroy'])->name ('employers.destroy');