<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('/', [ContactController::class, 'index']);


Route::get('/contacts/confirm', [ContactController::class, 'confirmView']);


Route::post('/contacts/confirm', [ContactController::class, 'confirm']);


Route::post('/contacts', [ContactController::class, 'store']);


Route::get('/thanks', function () {
    return view('thanks');
});


Route::middleware('auth')->group(
    function () {
        Route::get('/admin', [AuthController::class, 'admin']);
    }
);


Route::get('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
