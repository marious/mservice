<?php

use App\Http\Controllers\Api\BlogsController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\NewRegisterController;
use App\Http\Controllers\Api\OtpSendController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\ValidateHeadersMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(ValidateHeadersMiddleware::class)->prefix('v1')->group(function () {
    Route::post('register-request', [NewRegisterController::class, 'register']);

    Route::controller(OtpSendController::class)->prefix('otp')->group(function () {
        Route::post('send', 'send');
        Route::post('verify', 'verify');
        Route::post('resend', 'resend');
    });

    Route::prefix('auth')->group(function () {
        Route::controller(RegisterController::class)->group(function () {
            Route::post('register', 'register');
        });

        Route::controller(LoginController::class)->group(function () {
            Route::post('login', 'login');
            Route::post('logout', 'logout')->middleware('auth:sanctum');
        });

    });

    // Authed Routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('services')->group(function () {
            Route::controller(ServicesController::class)->group(function () {
                Route::get('/', 'index');
            });
        });
    });


    Route::prefix('news')->group(function () {
        Route::controller(BlogsController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{slug}', 'show');
        });
    });

    Route::get('home', [HomeController::class, 'index']);
});
