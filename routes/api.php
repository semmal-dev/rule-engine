<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VulnerabilityScanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('upload', [VulnerabilityScanController::class,'uploadDependencies'])->name('uploadDependencies');
});
