<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DefaultController::class, 'index']);
Route::get('teste', [DefaultController::class, 'teste']);
Route::get('teste2', [DefaultController::class, 'teste2']);
Route::get('/teste3', [DefaultController::class, 'teste2']);

