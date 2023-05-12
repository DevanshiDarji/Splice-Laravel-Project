<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('custom-registration', [App\Http\Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::post('custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::middleware('auth:api')->group( function () {
    Route::get('/products', [App\Http\Controllers\CustomizedProductController::class, 'index']);
});
Route::post('/products', [App\Http\Controllers\CustomizedProductController::class, 'store']);