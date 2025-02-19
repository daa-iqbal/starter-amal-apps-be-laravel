<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// ----AUTHENTICATION---- //
Route::prefix('auth')->controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
});

// ----PROFILE---- //
Route::prefix('profile')->controller(App\Http\Controllers\ProfileController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'profile');
    Route::post('/', 'editprofile');
});

// ----USER---- //
Route::prefix('user')->controller(App\Http\Controllers\UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'index')->middleware('auth:sanctum', 'admin');
    Route::get('/{user:username}', 'show');
    Route::post('/', 'store')->middleware('auth:sanctum');
    Route::post('/{user}', 'update')->middleware('auth:sanctum');
    Route::delete('/{user}', 'destroy')->middleware('auth:sanctum');
});

// ----CHARITY---- //
Route::prefix('charity')->controller(App\Http\Controllers\CharityController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'index')->middleware('auth:sanctum', 'admin');
    Route::get('/{charity}', 'show');
    Route::post('/', 'store')->middleware('auth:sanctum');
    Route::put('/{charity}', 'update')->middleware('auth:sanctum');
    Route::delete('/{charity}', 'destroy')->middleware('auth:sanctum');
});

// ----PROGRESS---- //
Route::prefix('progress')->controller(App\Http\Controllers\ProgressController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'index')->middleware('auth:sanctum', 'admin');
    Route::post('/show', 'show')->middleware('auth:sanctum');
    Route::post('/', 'store')->middleware('auth:sanctum');
    Route::put('/{progress}', 'update')->middleware('auth:sanctum');
    Route::delete('/{progress}', 'destroy')->middleware('auth:sanctum');
});

// ----COACH---- //
Route::prefix('coach')->controller(App\Http\Controllers\CoachController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'index')->middleware('auth:sanctum', 'admin');
    Route::get('/show', 'show')->middleware('auth:sanctum');
    Route::post('/', 'store')->middleware('auth:sanctum');
    Route::put('/{coach}', 'update')->middleware('auth:sanctum');
    Route::delete('/{coach}', 'destroy')->middleware('auth:sanctum');
});

// ----PERFORMANCE---- //
Route::prefix('performance')->controller(App\Http\Controllers\PerformanceController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'index')->middleware('auth:sanctum', 'admin');
    Route::get('/{user:username}', 'show');
    Route::post('/', 'store')->middleware('auth:sanctum');
    Route::put('/{performance}', 'update')->middleware('auth:sanctum');
    Route::delete('/{performance}', 'destroy')->middleware('auth:sanctum');
});

// ----PERCENTAGE---- //
Route::prefix('percentage')->controller(App\Http\Controllers\PercentageController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/dashboard', 'index')->middleware('auth:sanctum', 'admin');
    Route::get('/{percentage}', 'show');
    Route::post('/', 'store')->middleware('auth:sanctum');
    Route::put('/{percentage}', 'update')->middleware('auth:sanctum');
    Route::delete('/{percentage}', 'destroy')->middleware('auth:sanctum');
});
