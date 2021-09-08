<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\TrainingsController;





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



// metodos de tabla empleados
Route::get('/api/employees/index',[EmployeesController::class,'index']); 
Route::get('/api/employees/getData',[EmployeesController::class,'getData']);
Route::post('/api/employees/store',[EmployeesController::class,'store']); 
Route::put('/api/employees/update',[EmployeesController::class,'update']);
Route::delete('/api/employees/delete',[EmployeesController::class,'destroy']);

// metodos de la tabla Follows
Route::get('/api/follows/index',[FollowsController::class,'index']);
Route::get('/api/follows/getData',[FollowsController::class,'getData']);
Route::post('/api/follows/store',[FollowsController::class,'store']); 
Route::put('/api/follows/update',[FollowsController::class,'update']);
Route::delete('/api/follows/delete',[FollowsController::class,'destroy']);

// metodos de la tabla Inventories
Route::get('/api/inventories/index',[InventoriesController::class,'index']); 
Route::get('/api/inventories/getData',[InventoriesController::class,'getData']);
Route::post('/api/inventories/store',[InventoriesController::class,'store']); 
Route::put('/api/inventories/update',[InventoriesController::class,'update']);
Route::delete('/api/inventories/delete',[InventoriesController::class,'destroy']);

// metodos de la tabla Records
Route::get('/api/records/index',[RecordsController::class,'index']); 
Route::get('/api/records/getData',[RecordsController::class,'getData']);
Route::post('/api/records/store',[RecordsController::class,'store']); 
Route::put('/api/records/update',[RecordsController::class,'update']);
Route::delete('/api/records/delete',[RecordsController::class,'destroy']);

// metodos de la tabla Tools
Route::get('/api/tools/index',[ToolsController::class,'index']); 
Route::get('/api/tools/getData',[ToolsController::class,'getData']);
Route::post('/api/tools/store',[ToolsController::class,'store']); 
Route::put('/api/tools/update',[ToolsController::class,'update']);
Route::delete('/api/tools/delete',[ToolsController::class,'destroy']);

// metodos de la tabla Trainings
Route::get('/api/trainings/index',[TrainingsController::class,'index']); 
Route::get('/api/trainings/getData',[TrainingsController::class,'getData']);
Route::post('/api/trainings/store',[TrainingsController::class,'store']); 
Route::put('/api/trainings/update',[TrainingsController::class,'update']);
Route::delete('/api/trainings/delete',[TrainingsController::class,'destroy']);


