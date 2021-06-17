<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
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
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

    // todo add middleware to check if user is registered, removed for developement reasons
Route::prefix('/dashboard')->group(function () {
    // B L O G
    Route::post('/post', [PostController::class, 'create_post']);
    Route::delete('/post/{id}', [PostController::class, 'delete_post']);
    Route::get('/post/{p?}', [PostController::class, 'get_post']);
    Route::put('/post/{id}', [PostController::class, 'edit_post']);
    // P E R M I S S I O N 
    Route::post('/create_role',[PermissionController::class, 'create_role']);
    Route::post('/create_permission',[PermissionController::class, 'create_permission']);
    Route::post('/create_subadmin',[PermissionController::class, 'create_subadmin']);
    Route::get('/get_all_roles', [PermissionController::class, 'get_all_roles'])->middleware(['auth:api', 'permissionCheck:post a post']);
    
});
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});