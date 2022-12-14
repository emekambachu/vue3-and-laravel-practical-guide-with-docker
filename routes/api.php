<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
   Route::get('/user', [AuthController::class, 'user']);
   Route::post('/logout', [AuthController::class, 'logout']);
   Route::put('/users/info', [AuthController::class, 'updateInfo']);
   Route::put('/users/password', [AuthController::class, 'updatePassword']);

   Route::get('/users', [UserController::class, 'index']);
   Route::post('/users', [UserController::class, 'store']);
   Route::get('/users/{id}', [UserController::class, 'show']);
   Route::put('/users/{id}', [UserController::class, 'update']);
   Route::delete('/users/{id}', [UserController::class, 'destroy']);

   Route::get('/permissions', [PermissionController::class, 'index']);

   Route::get('/roles', [RoleController::class, 'index']);
   Route::post('/roles', [RoleController::class, 'store']);

   Route::get('/products', [ProductController::class, 'index']);
   Route::post('/products', [ProductController::class, 'store']);
   Route::get('/products/{id}', [ProductController::class, 'show']);
   Route::put('/products/{id}', [ProductController::class, 'update']);
   Route::delete('/products/{id}', [ProductController::class, 'destroy']);

   Route::post('/image/upload', [ImageController::class, 'upload']);

   Route::get('/orders', [OrderController::class, 'index']);
   Route::get('/orders/{id}', [OrderController::class, 'show']);
   Route::post('/orders/export', [OrderController::class, 'export']);
   Route::get('/orders/items/chart', [OrderController::class, 'chart']);
});
