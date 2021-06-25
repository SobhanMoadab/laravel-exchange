<?php

use App\Http\Controllers\Statics\AuthStatic;
use Illuminate\Support\Facades\Route;

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

// S T A T I C, WEB ROUTES
Route::get('/register_form', [AuthStatic::class, 'register_form']);
Route::post('/register_store', [AuthStatic::class, 'register'])->name('register');







Route::get('/admin', function () {
    return view('welcome');
});
Route::get('/admin/posts', function () {
    return view('welcome');
});
Route::get('/admin/posts/new-post', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('Home');
});
