<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');

Route::get('/events/{event:slug}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event:slug}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event:slug}', [EventController::class, 'destroy'])->name('events.destroy');


Route::get('/about', [AboutController::class, 'index'])->name('about.index');
