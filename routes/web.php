<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OtpVerificationController;
use App\Http\Controllers\ForgotPasswordController;


Route::middleware('guest')->group(function () {

    Route::get('/', function () {
    return redirect()->route('login.form');
});


    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
 
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/verify-otp', [OtpVerificationController::class, 'showVerifyForm'])->name('otp.form');
    Route::post('/verify-otp', [OtpVerificationController::class, 'verifyOtp'])->name('otp.verify');
    Route::post('/resend-otp', [OtpVerificationController::class, 'resendOtp'])->name('otp.resend');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetOtp'])->name('password.email');
    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

