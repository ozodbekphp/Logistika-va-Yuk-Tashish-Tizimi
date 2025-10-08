<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});


// Foydalanuvchilar uchun ro'yxatdan o'tish uchun Route
Route::post('/register', [AuthController::class, 'register']);
// Foydalanuvchilar uchun login qilish Route
Route::post('/login', [AuthController::class, 'login']);

Route::get('/user_all', [UserController::class, 'show_user_all']);
// ro'yxatdan o'tgan foydalanuvchilar profilini ko'rish va o'zgartish uchun route

Route::middleware('auth:sanctum')->group(function () {
    // Foydalanuvchini o'z profilini ko'rish uchun route
    Route::get('/profile', [UserController::class, 'index']);
    // Foydalanuvchi o'z malumotlarini yangilash uchun route
    Route::put('/profile/update/{id}', [UserController::class, 'update']);
    // Foydalanuvchi o'z akkountini o'chirish uchun route url
    Route::delete('/profile/delete', [UserController::class, 'delete']);



    // Foydalanuvchi yani Mijoz yuk elon berish uchun route
    Route::post('/shipment', [ShipmentController::class, 'store']);
    // Foydalanuvchi o'zi yuk elonini ko'rish uchun Route Url
    Route::get('/show/shipment', [ShipmentController::class, 'index']);
    // Foydalanuvchi o'z yukini yangilashi mumkin
    Route::put('/shipment/update/{id}', [ShipmentController::class, 'update']);


    // Admin uchun api route
    // Barcha Yuklarni ko'rish uchun api route
    Route::get('admin/all/shipments', [AdminController::class, 'index']);

    // Admin uchun kunlik va haftalik statistika
    Route::get('admin/statistika', [AdminReportController::class, 'index']);
});

