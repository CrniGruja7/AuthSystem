<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => ['api','auth:api']
], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/create', [PostController::class, 'store']);
    Route::put('/update/{id}', [PostController::class, 'update']);
    Route::delete('/delete/{post}', [PostController::class, 'destroy']);
});