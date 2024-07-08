<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FunnelController;



Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/forgotPassword', [ForgotPasswordController::class, 'forgotPassword'])->name('password.reset');

Route::get('/resetPasswordEmail/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/resetPassword/{token}', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth:sanctum')->get('/funnels', [FunnelController::class, 'index']);
Route::middleware('auth:sanctum')->get('/funnels/search', [FunnelController::class, 'search']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/funnel', [FunnelController::class, 'store']);
    Route::delete('/funnel/{id}', [FunnelController::class, 'destroy']);
});