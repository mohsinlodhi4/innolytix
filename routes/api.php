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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('clients', App\Http\Controllers\API\ClientsAPIController::class);

// Route::resource('vendors', App\Http\Controllers\API\VendorAPIController::class);



Route::resource('ledgers', App\Http\Controllers\API\LedgersAPIController::class);
