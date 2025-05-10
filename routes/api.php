<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::get('/menu', [HomeController::class, 'index'])->name('home.index');
Route::get('/home', [HomeController::class, 'home'])->name('home.home');
Route::get('/features', [HomeController::class, 'features'])->name('home.features');
Route::get('/prices', [HomeController::class, 'prices'])->name('home.prices');
Route::get('/services', [HomeController::class, 'services'])->name('home.services');
Route::get('/portfolios', [HomeController::class, 'portfolios'])->name('home.portfolios');
Route::post('/send-form', [HomeController::class, 'form'])->name('home.form');

