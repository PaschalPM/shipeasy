<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\WarehouseTransactionController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->prefix('/auth')->name('auth.')->group(function(){
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth:sanctum');
});

Route::controller(ShippingController::class)->group(function(){
    Route::get('/payment-inquiry', 'getShippingCost')->name('payment-inquiry');
    Route::get('/track/{tracking_number}', 'trackItem')->name('track-item');
});

Route::apiResource('accounts', AccountController::class);
Route::apiResource('items', ItemController::class);
Route::apiResource('warehouse-transactions', WarehouseTransactionController::class);