<?php

use App\Http\Controllers\ViloyatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

Route::get('/', function () {
    return view('welcome');
});


Route::fallback(function () {
    return response()
        ->view('errors.404', [], 404);
});

// Route::get('/hisobot' , [ViloyatController::class , 'exel_hisobot']);
Route::get('/viloyatlar/report', [ViloyatController::class, 'generateAll']);
