<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Foydalanuvchilar uchun ro'yxatdan o'tish uchun Route
Route::post('/register', [AuthController::class, 'register']);
// Foydalanuvchilar uchun login qilish Route
Route::post('/login', [AuthController::class, 'login']);

Route::get('user_all', [UserController::class, 'show_user_all']);
// ro'yxatdan o'tgan foydalanuvchilar profilini ko'rish va o'zgartish uchun route
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UserController::class, 'index']);
    Route::put('/profile_update/{id}', [UserController::class, 'update']);
});
