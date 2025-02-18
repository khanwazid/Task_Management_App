<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskNoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home ');
});


Route::middleware('guest')->group(function () {
    // Registration Routes
    Route::prefix('register')->group(function () {
        Route::get('/', [UserController::class, 'create'])->name('register');
        Route::post('/', [UserController::class, 'register'])->name('register.store');
    });

    // Login Routes
    Route::prefix('login')->group(function () {
        Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
        Route::post('/', [UserController::class, 'login'])->name('login.authenticate');
    });
});

// Logout Route (accessible only to authenticated users)
Route::middleware('auth')->post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');

    // Task resource routes (excluding create, edit, and show)
    Route::resource('tasks', TaskController::class)->except(['create', 'edit', 'show']);

    // Profile Management Routes
    Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::post('/validate-current-password', [UserController::class, 'validateCurrentPassword']);

    //Notes Controller
    Route::post('/tasks/notes', [TaskNoteController::class, 'store'])->name('note.add');
    Route::get('/tasks/{task}/notes', [TaskNoteController::class, 'getNotes']);
    Route::delete('/tasks/notes/{note}', [TaskNoteController::class, 'destroy']);
    Route::get('/tasks/notes/{note}/edit', [TaskNoteController::class, 'edit'])->name('note.edit');
    Route::put('/tasks/notes/{note}', [TaskNoteController::class, 'update'])->name('note.update');
    
});
