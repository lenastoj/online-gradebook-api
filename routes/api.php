<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GradebookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/home', [GradebookController::class, 'index']);
Route::get('/gradebooks/{id}', [GradebookController::class, 'show']);
Route::delete('/gradebooks/{id}', [GradebookController::class, 'destroy']);
Route::put('/gradebooks/{id}/edit', [GradebookController::class, 'update']);



Route::post('/students', [StudentController::class, 'store']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
Route::get('/students/{gradebookId}', [StudentController::class, 'showByGradebookId']);




Route::post('/comments', [CommentController::class, 'store']);
Route::delete('/comments/{id}', [CommentController::class, 'destroy']);
Route::get('/comments/{gradebookId}', [CommentController::class, 'showByGradebookId']);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/auth/me', [AuthController::class, 'active_user'])->middleware('auth');

Route::get('/my-gradebook/{userId}', [GradebookController::class, 'showByUserId']);
Route::post('/auth/refresh', [AuthController::class, 'refreshToken']);


Route::get('/teachers', [UserController::class, 'index']);
Route::get('/teachers/{id}', [UserController::class, 'show']);

Route::get('/gradebooks/create', [UserController::class, 'index']);
Route::post('/gradebooks/create', [GradebookController::class, 'store']);
