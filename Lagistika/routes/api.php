<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShipmentController;
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
    // Foydalanuvchini o'z profilini ko'rish uchun route
    Route::get('/profile', [UserController::class, 'index']);
    // Foydalanuvchi o'z malumotlarini yangilash uchun route
    Route::put('/profile_update/{id}', [UserController::class, 'update']);


    // Foydalanuvchi yani Mijoz yuk elon berish uchun route
    Route::post('/shipment', [ShipmentController::class, 'store']);


    Route::get('/show/shipment', [ShipmentController::class, 'index']);
});
