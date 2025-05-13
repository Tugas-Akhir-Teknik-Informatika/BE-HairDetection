<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OtpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::post('/otp/send', [OtpController::class, 'sendOtp']);
Route::post('/otp/verify', [OtpController::class, 'verifyOtp']);
// Route::post('/register', AuthController::class,'register');

// Route::post('/otp/send', [OtpController::class, 'sendOTP']);
// Route::post('/otp/verify', [OtpController::class, 'verifyOTP']);


// Route::get('/test-email', [TestMailController::class, 'send']);
