<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\AuthController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::group(['middleware'=>'auth:api'], function(){
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout',[AuthController::class, 'logout']);

    Route::post('/phones/search', [PhoneController::class, 'search']);
    Route::post('/phones', [PhoneController::class, 'store']);
    Route::get('/phones', [PhoneController::class, 'index']);
    Route::get('/phones/{phone}', [PhoneController::class, 'show']);
    Route::put('/phones/{phone}', [PhoneController::class, 'update']);
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy']);

});
