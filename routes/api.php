<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryDetailController;
use App\Http\Controllers\PJController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::group([
        'middleware' => 'auth:sanctum'
    ], function () {
        Route::get('/session', [AuthController::class, 'session']);
        Route::post('/signout', [AuthController::class, 'signout']);
    });
});

Route::group([
    'prefix' => 'user',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group([
    'prefix' => 'pj',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/', [PJController::class, 'index']);
    Route::get('/{id}', [PJController::class, 'show']);
    Route::post('/', [PJController::class, 'store']);
    Route::put('/{id}', [PJController::class, 'update']);
    Route::delete('/{id}', [PJController::class, 'destroy']);
});

Route::group([
    'prefix' => 'category',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::group([
    'prefix' => 'status',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/', [StatusController::class, 'index']);
    Route::get('/{id}', [StatusController::class, 'show']);
    Route::post('/', [StatusController::class, 'store']);
    Route::put('/{id}', [StatusController::class, 'update']);
    Route::delete('/{id}', [StatusController::class, 'destroy']);
});

Route::group([
    'prefix' => 'product',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});

Route::group([
    'prefix' => 'inv',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/', [InventoryController::class, 'index']);
    Route::get('/{id}', [InventoryController::class, 'show']);
    Route::post('/', [InventoryController::class, 'store']);
    Route::put('/{id}', [InventoryController::class, 'update']);
    Route::delete('/{id}', [InventoryController::class, 'destroy']);
});

Route::group([
    'prefix' => 'invdt',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/{hdid}', [InventoryDetailController::class, 'index']);
    Route::get('/{id}', [InventoryDetailController::class, 'show']);
    Route::post('/', [InventoryDetailController::class, 'store']);
    Route::put('/{id}', [InventoryDetailController::class, 'update']);
    Route::delete('/{id}', [InventoryDetailController::class, 'destroy']);
});

Route::group([
    'prefix' => 'dashboard',
    'middleware'=> 'auth:sanctum',
], function () {
    Route::get('/piechart', [DashboardController::class, 'pieData']);
    Route::get('/penempatan', [DashboardController::class, 'countPenempatan']);
});