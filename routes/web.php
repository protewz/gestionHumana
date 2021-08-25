<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\InventoriesController;

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

// Registro de la tabla empleados
Route::get('/api/employees/index', [EmployeesController::class, 'index']);
Route::get('/api/employees/getData', [EmployeesController::class, 'getData']);
Route::post('/api/employees/store', [EmployeesController::class, 'store']);
Route::put('/api/employees/update', [EmployeesController::class, 'update']);
Route::delete('/employees/delete', [EmployeesController::class, 'destroy']);

//Registros de la tabla capacitaciones "trainings"
Route::get('/api/trainings/index', [TrainingsController::class, 'index']);
Route::get('/api/trainings/getData', [TrainingsController::class, 'getData']);
Route::post('/api/trainings/store', [TrainingsController::class, 'store']);
Route::put('/api/trainings/update', [TrainingsController::class, 'update']);
Route::delete('//trainings//delete', [TrainingsController::class, 'destroy']);

//Registros de la tabla inventarios
Route::get('/api/inventories/index', [InventoriesController::class, 'index']);
Route::get('/api/inventories/getData', [InventoriesController::class, 'getData']);
Route::post('/api/inventories/store', [InventoriesController::class, 'store']);
Route::put('/api/inventories/update', [InventoriesController::class, 'update']);
Route::delete('/api/inventories/Tr/delete', [InventoriesController::class, 'destroy']);

