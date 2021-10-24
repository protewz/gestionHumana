<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\CategoryprodsController;

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
Route::middleware(['auth:sanctum', 'verified'])->get('/api/employees/index2',[EmployeesController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/employees/registrar',[EmployeesController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/employees/actualizar',[EmployeesController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/Employees/eliminar',[EmployeesController::class, 'destroy']);



Route::middleware(['auth:sanctum', 'verified'])->get('/api/follows/index',[FollowsController::class,'index'])->name('segui');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/follows/index2',[FollowsController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/follows/registrar',[FollowsController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/follows/actualizar',[FollowsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/follows/eliminar',[FollowsController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/follows/getdata',[FollowsController::class, 'getdata']);



Route::middleware(['auth:sanctum', 'verified'])->get('/api/inventories/index',[InventoriesController::class,'index'])->name('inventario');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/inventories/index2',[InventoriesController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/inventories/registrar',[InventoriesController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/inventories/actualizar',[InventoriesController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/inventories/eliminar',[InventoriesController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/inventories/getdata',[InventoriesController::class, 'getdata']);


Route::middleware(['auth:sanctum', 'verified'])->get('/api/tools/index',[ToolsController::class,'index'])->name('prestamo');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tools/index2',[ToolsController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tools/registrar',[ToolsController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/tools/actualizar',[ToolsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tools/eliminar',[ToolsController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tools/getdata',[ToolsController::class, 'getdata']);


Route::middleware(['auth:sanctum', 'verified'])->get('/api/trainings/index',[TrainingsController::class,'index'])->name('capacitacion');
Route::middleware(['auth:sanctum', 'verified'])->get('/api/trainings/index2',[TrainingsController::class, 'index2']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/trainings/registrar',[TrainingsController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/trainings/actualizar',[TrainingsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/trainings/eliminar',[TrainingsController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/trainings/getdata',[TrainingsController::class, 'getdata']);


Route::middleware(['auth:sanctum', 'verified'])->get('/api/dettrainings/index',[RecordsController::class,'index'])->name('registrocap');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/dettrainings/registrar',[RecordsController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/dettrainings/actualizar',[RecordsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/dettrainings/eliminar',[RecordsController::class, 'destroy']);
Route::middleware(['auth:sanctum', 'verified'])->get('/api/dettrainings/getdata',[RecordsController::class, 'getdata']);