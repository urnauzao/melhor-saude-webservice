<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\ServicoController;

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
// Route::get('/', [DefaultController::class, 'index']);


Route::prefix('clinica')->group(function () {
    Route::get('/', [ClinicaController::class, 'index']);
    Route::get('/all', [ClinicaController::class, 'all']);
    // Route::get('/model', [ClinicaController::class, 'create']);
    Route::post('/new', [ClinicaController::class, 'store']);
    Route::get('/show/{clinica}', [ClinicaController::class, 'show']);
});

Route::prefix('servico')->group(function () {
    Route::get('/', [ServicoController::class, 'index']);
    // Route::get('/all', [ServicoController::class, 'all']);
    // Route::get('/model', [ServicoController::class, 'create']);
    Route::post('/new', [ServicoController::class, 'store']);
    Route::get('/show', [ServicoController::class, 'show']);
    Route::get('/showWithClinicas/{id?}', [ServicoController::class, 'showWithClinicas']);
});

Route::prefix('medico')->group(function () {
    Route::get('/', [MedicoController::class, 'index']);
    Route::get('/all', [MedicoController::class, 'all']);
    Route::get('/clinica/{id}', [MedicoController::class, 'byClinica']);
    Route::post('/new', [MedicoController::class, 'store']);
    Route::get('/show/{id}', [MedicoController::class, 'show']);
});



