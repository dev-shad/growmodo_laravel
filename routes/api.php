<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewRecordsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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
Route::get('users/list', [ViewRecordsController::class,'getList']);
Route::post('login', [ViewRecordsController::class,'index']);
Route::post('register', [ViewRecordsController::class,'create']);

//Route::group(['middleware' => ['auth:sanctum']], function() {
//  
//});



