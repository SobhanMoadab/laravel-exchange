<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
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
    Route::post('/blog', [BlogController::class, 'create_blog']);
    Route::delete('/blog/{id}', [BlogController::class, 'delete_blog']);
    Route::get('/blog/{p?}', [BlogController::class, 'get_blog']);
    Route::put('/blog/{id}', [BlogController::class, 'edit_blog']);

    
});
