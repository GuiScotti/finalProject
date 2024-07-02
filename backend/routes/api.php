<?php

use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class,'login']);