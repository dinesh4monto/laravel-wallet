<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\WalletController;
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

/**
 * Register User
 * endpoint: http://{domain}/api/auth/register
 * returns Bearer Token
 */
Route::post('/auth/register', [AuthController::class, 'register']);

/**
 * Login User
 * endpoint: http://{domain}/api/auth/login
 * returns Bearer Token
 */
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {

    /**
     * Add credit/balance to Wallet
     * endpoint: http://{domain}/api/wallet/add
     * returns Response
     */
    Route::post('/wallet/add', [WalletController::class, 'add']);

    /**
     * Pay from Wallet
     * endpoint: http://{domain}/api/wallet/pay
     * returns Response
     */
    Route::post('/wallet/pay', [WalletController::class, 'pay']);
});
