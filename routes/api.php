<?php

use App\Http\Controllers\UserController;
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
