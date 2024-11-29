<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PaymentController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/providers', [ProviderController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/payments', [PaymentController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index']);
});