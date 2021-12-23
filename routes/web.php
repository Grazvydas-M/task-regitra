<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegitraController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VisitController;
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


Route::get('/', [ServiceController::class, 'index']);

Route::post('{service}/visits', [VisitController::class, 'store'])->name('visits.store');
Route::put('visits/{visit}', [VisitController::class, 'update'])->middleware(['auth'])->name('visits.update');

Route::get('/customers/{uuid}', [CustomerController::class, 'show'])->name('customers.show');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/departments', [DashboardController::class, 'departmentVisitsList'])->middleware(['auth'])->name('dashboard.departments');


require __DIR__ . '/auth.php';
