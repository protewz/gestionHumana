<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\RecordsController;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/api/employees/index',[EmployeesController::class,'index'])->name('emple');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/follows/index',[FollowsController::class,'index'])->name('segui');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/inventories/index',[InventoriesController::class,'index'])->name('inventario');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tools/index',[ToolsController::class,'index'])->name('prestamo');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/trainings/index',[TrainingsController::class,'index'])->name('capacitacion');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/dettrainings/index',[RecordsController::class,'index'])->name('registrocap');