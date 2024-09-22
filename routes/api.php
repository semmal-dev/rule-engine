<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
// Route::post('/register', function (Request $request) {
//     return "hai";
// });

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});
