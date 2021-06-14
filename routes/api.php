<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// A U T H E N T I C A T I ON
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('/dashboard')->middleware('auth:api')->group(function () {
    // B L O G
    Route::post('/blog', [PostController::class, 'create_post']);
    Route::delete('/post/{id}', [PostController::class, 'delete_post']);
    Route::get('/post/{p?}', [PostController::class, 'get_post']);
    Route::put('/post/{id}', [PostController::class, 'edit_post']);

    
});
