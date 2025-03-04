<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {
    Route::post('register', [\App\Http\Controllers\API\Auth\RegisterController::class, 'register']);
    Route::post('forgot-password', [\App\Http\Controllers\API\Auth\ForgotPasswordController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('reset-password', [\App\Http\Controllers\API\Auth\ResetPasswordController::class, 'resetPassword'])->name('password.reset');
    Route::post('login', [\App\Http\Controllers\API\Auth\LoginController::class, 'login']);

    Route::middleware(['auth:sanctum'])->group( function () {
        Route::post('devices', [\App\Http\Controllers\API\Devices\DeviceController::class, 'store']);
        Route::get('devices', [\App\Http\Controllers\API\Devices\DeviceController::class, 'index']);
        Route::put('devices/{id}', [\App\Http\Controllers\API\Devices\DeviceController::class, 'update']);
        Route::post('sensor-data', [\App\Http\Controllers\API\SensorDatas\SensorDataController::class, 'store']);
        Route::get('devices/{deviceId}/latest-status', [\App\Http\Controllers\API\SensorDatas\SensorDataController::class, 'latestStatus']);
        Route::get('devices/{deviceId}/historical-status', [\App\Http\Controllers\API\SensorDatas\SensorDataController::class, 'historicalStatus']);
    });


});

