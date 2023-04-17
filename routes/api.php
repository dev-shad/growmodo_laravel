<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ViewRecordsController;
use App\Http\Controllers\UserCrudController;
use Illuminate\Support\Facades\Route;


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

Route::post('login', [LoginController::class,'index']);
Route::put('register', [RegisterController::class,'create']);

Route::group(['middleware' => ['auth:sanctum']], function() {
  Route::get('users/list', [ViewRecordsController::class,'getList']);
  Route::delete('unsubscribe', [UserCrudController::class,'unsubscribe']);
});



