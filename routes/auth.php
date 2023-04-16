<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::controller(LoginController::class)->group(function () {
    // Authentication Routes...
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    // Registration Routes...
    Route::get('registro', 'showRegistrationForm')->name('register');
    /* Route::post('registro', 'register'); */
});

Route::controller(ForgotPasswordController::class)->group(function () {
    // ForgotPassword Routes...
    Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
});

Route::controller(ResetPasswordController::class)->group(function () {
    // ForgotPassword Routes...
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
});