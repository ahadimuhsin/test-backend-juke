<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/', [EmployeeController::class, 'store'])->name('employee.store');
Route::get("edit/{id}", [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put("/{id}", [EmployeeController::class, 'update'])->name('employee.update');
Route::delete("/{id}", [EmployeeController::class, 'destroy'])->name('employee.destroy');

