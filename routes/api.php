<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\TaskNoteController;
use App\Http\Controllers\API\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/task-notes', [TaskNoteController::class, 'store']);
    Route::put('/task-notes/{id}', [TaskNoteController::class, 'update']);
    Route::delete('/task-notes/{id}', [TaskNoteController::class, 'destroy']);
    Route::get('/task-notes', [TaskNoteController::class, 'index']);
    
});


Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::put('/admin/tasks/{task}', [TaskController::class, 'updateTask']);
    Route::post('/admin/tasks', [TaskController::class, 'storeTask']);
    Route::delete('/admin/tasks/{task}', [TaskController::class, 'destroyTask']);
    Route::get('/admin/tasks', [TaskController::class, 'adminIndex']);
    
    Route::post('/admin/task-notes', [TaskNoteController::class, 'storeNote']);
    Route::put('/admin/task-notes/{id}', [TaskNoteController::class, 'updateNote']);
    Route::delete('/admin/task-notes/{id}', [TaskNoteController::class, 'destroyNote']);
    Route::get('/admin/task-notes', [TaskNoteController::class, 'adminIndex']);

    Route::post('/admin/tasks/{task}/reports', [ReportController::class, 'store']);
    Route::put('/admin/reports/{report}', [ReportController::class, 'update']);
    Route::delete('/admin/reports/{report}', [ReportController::class, 'destroy']);
    Route::get('/admin/reports', [ReportController::class, 'index']);

});
