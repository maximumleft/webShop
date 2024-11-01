<?php

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'users'], function () {
    Route::get('/show/{user}', [UserController::class, 'show']);
    Route::post('/create', [UserController::class, 'create']);
    Route::patch('/update/{user}', [UserController::class, 'update']);
    Route::delete('/delete/{user}', [UserController::class, 'delete']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/show/{product}', [ProductController::class, 'show']);
    Route::post('/create', [ProductController::class, 'create']);
    Route::patch('/update/{product}', [ProductController::class, 'update']);
    Route::delete('/delete/{product}', [ProductController::class, 'delete']);
});
