<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
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
    return view('home');
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


Route::middleware(['auth', 'isUser'])->group(function () {

    // Dashboard Route
    Route::get('/dashboard', [TaskController::class, 'index'])->name('dashboard');

    // Task resource routes (excluding create, edit, and show)
    Route::resource('tasks', TaskController::class)->except(['create', 'edit', 'show']);
  
    
   // Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    // Profile Management Routes
    Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('password.update');
    Route::post('/validate-current-password', [UserController::class, 'validateCurrentPassword']);
    Route::post('/profile/{user}/delete-image', [UserController::class, 'deleteImage'])->name('profile.delete-image');
    //Notes Controller
    Route::post('/tasks/notes', [TaskNoteController::class, 'store'])->name('note.add');
    Route::get('/tasks/{task}/notes', [TaskNoteController::class, 'getNotes']);
    Route::delete('/tasks/notes/{note}', [TaskNoteController::class, 'destroy']);
    Route::get('/tasks/notes/{note}/edit', [TaskNoteController::class, 'edit'])->name('note.edit');
    Route::put('/tasks/notes/{note}', [TaskNoteController::class, 'update'])->name('note.update');
  //  Route::post('/tasks/{task}/delete-image', [TaskController::class, 'deleteImage'])->name('tasks.deleteImage');

});

Route::middleware(['auth', 'admin'])->group(function () {

                                 //ADMIN ROUTE
 Route::get('/admin/profile', [UserController::class, 'shows'])->name('profile.shows');
 Route::put('/admin/profile/update', [UserController::class, 'updates'])->name('profile.updates');
 Route::put('/admin/profile/password', [UserController::class, 'updatePasswords'])->name('password.updates');
 Route::post('/admin-validate-current-password', [UserController::class, 'validateCurrentPasswords']);
 //Route::get('/admin/dashboard', [TaskController::class, 'indexs'])->name('admin-dashboard');



 Route::get('/admin/task/{task}/notes', [TaskNoteController::class, 'getNote'])->name('admin.task.notes');

 Route::post('/admin/task-notes', [TaskNoteController::class, 'stores'])->name('admin.task.notes.store');
 Route::delete('/admin/tasks/notes/{note}', [TaskNoteController::class, 'destroys'])->name('admin.task.notes.destroy');
 Route::get('/admin/tasks/notes/{note}/edit', [TaskNoteController::class, 'edits'])->name('admin.note.edit');
 Route::put('/admin/tasks/notes/{note}', [TaskNoteController::class, 'updates'])->name('admin.note.update');


Route::get('/admin/tasks/dashboardss', [TaskController::class, 'indexs'])->name('admin.tasks.index');
 Route::put('/admin/tasks/{task}', [TaskController::class, 'updates'])->name('admin.tasks.update');
 Route::get('/admin/tasks/{task}', [TaskController::class, 'show'])->name('admin.tasks.show');
 Route::delete('/admin/tasks/{task}', [TaskController::class, 'destroys'])->name('admin.tasks.destroy');
 //Route::get('/tasks', [TaskController::class, 'allUsers'])->name('admin.all');
 Route::get('/admin-dashboard', [TaskController::class, 'getUsers'])->name('admin.get.users');
 
 Route::post('admin/users/{id}/toggle-status', [TaskController::class, 'toggleStatus'])->name('admin.users.toggle-status');

 Route::post('/tasks/{task}/reports', [ReportController::class, 'store'])->name('reports.store');
 Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
 Route::get('/tasks/{task}/reports', [ReportController::class, 'getNotes'])->name('reports.gets');
 Route::delete('/tasks/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
 Route::get('/reports/{report}/fetch', [ReportController::class, 'fetch'])->name('reports.fetch');
 Route::get('/admin/tasks', [TaskController::class, 'getTasks'])->name('admin.get.tasks');
// Route::post('/admin/tasks/{task}/delete-image', [TaskController::class, 'deleteImages'])->name('admin.tasks.deleteImage');
 Route::post('/admin/tasks', [TaskController::class, 'stores'])->name('admin.tasks.store');
 
});