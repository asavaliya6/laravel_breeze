<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProController;
use App\Http\Controllers\RealuserController;
use App\Http\Controllers\RealpostController;
use App\Http\Controllers\RealroleController;

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

Route::post('/realuser', [RealuserController::class, 'store']);
Route::get('/realuser/{id}/phone', [RealuserController::class, 'getUserPhone']);
Route::get('/realphone/{id}/user', [RealuserController::class, 'getPhoneUser']);

Route::post('/realuser/{id}/realpost', [RealpostController::class, 'store']);
Route::get('/realuser/{id}/realposts', [RealpostController::class, 'getUserPosts']);
Route::get('/realpost/{id}/realuser', [RealpostController::class, 'getPostUser']);

Route::post('/realuser/{id}/assign-roles', [RealroleController::class, 'assignRoles']);
Route::get('/realuser/{id}/roles', [RealroleController::class, 'getUserRoles']);
Route::get('/realrole/{id}/users', [RealroleController::class, 'getRoleUsers']);