<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Passport Authentication Routes
Route::post('passport/register', [PassportAuthController::class, 'register']);
Route::post('passport/login', [PassportAuthController::class, 'login']);
Route::middleware('auth:api')->get('passport/user', [PassportAuthController::class, 'getUser']);
Route::middleware('auth:api')->post('passport/logout', [PassportAuthController::class, 'logout']);

// JWT Authentication Routes
Route::post('jwt/register', [JWTAuthController::class, 'register']);
Route::post('jwt/login', [JWTAuthController::class, 'login']);
Route::middleware('auth:jwt')->get('jwt/user', [JWTAuthController::class, 'getUser']);
Route::middleware('auth:jwt')->post('jwt/logout', [JWTAuthController::class, 'logout']);

// Passport-Protected Routes
Route::middleware('auth:api')->group(function () {
    Route::apiResource('passport/products', ProductController::class);
});

// JWT-Protected Routes
Route::middleware('auth:jwt')->group(function () {
    Route::apiResource('jwt/products', ProductController::class);
});

// sanctum Authentication Routes
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
         
Route::middleware('auth:api')->group(function () {
    Route::resource('pros', ProController::class);
});
