<?php

use App\Http\Controllers\Core\Services\OrderServices;
use App\Http\Controllers\Statics\AuthStatic;
use App\Http\Controllers\Statics\CurrencyStatic;
use App\Http\Controllers\Statics\PageStatic;
use App\Http\Controllers\Statics\PermissionStatic;
use App\Http\Controllers\Statics\PostStatic;
use App\Http\Controllers\Statics\SettingStatic;
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

// *** S T A T I C ***


// AUTH
Route::get('/register', [AuthStatic::class, 'register_form'])->name('register');
Route::post('/register_store', [AuthStatic::class, 'register'])->name('register_store');
Route::get('/login_form', [AuthStatic::class, 'login_form'])->name('login');
Route::post('/login_form', [AuthStatic::class, 'login'])->name('login_store');


Route::prefix('/dashboard')->group(function () {

    Route::get('/dashboard', [PageStatic::class])->name('dashboard');
    // PERMISSION
    Route::get('/role/create', [PermissionStatic::class, 'create_role_form']);
    Route::post('/role/create_role', [PermissionStatic::class, 'create_role'])->name('create_role');
    Route::post('/role/create_permission', [PermissionStatic::class, 'create_permission'])->name('create_permission');
    Route::post('/role/assign_permission_to_role', [PermissionStatic::class, 'assign_permission_to_role'])->name('assign_permission_to_role');

    // POST
    Route::get('/post', [PostStatic::class, 'get_posts']);
    Route::post('/post/delete/{id}', [PostStatic::class, 'delete_post'])->name('delete_post');
    Route::post('/post/update/{id}', [PostStatic::class, 'update_post'])->name('update_post');
    Route::post('/post', [PostStatic::class, 'store_post'])->name('store_post');

    // CURRENCY
    Route::post('/currency', [CurrencyStatic::class, 'create_currency'])->name('create_currency');
    Route::post('/currency/state/{id}', [CurrencyStatic::class, 'coin_availablity']);
    Route::get('/currency', [CurrencyStatic::class, 'get_currencies']);
    Route::get('/currency_data', [CurrencyStatic::class, 'coin_data']);
    Route::post('/currency/update/{id}', [CurrencyStatic::class, 'edit_currency']);
    Route::post('/currency/delete/{id}', [CurrencyStatic::class, 'delete_currency']);

    // SETTING
    Route::get('/setting/off', [SettingStatic::class, 'maintenance_off']);
    Route::post('/setting/on', [SettingStatic::class, 'maintenance_on']);

    // ORDER
    Route::get('/dashboard/orders', function () {
        return view('Admin.Orders.index');
    })->name('dashboard');
});

// USER ROUTES
Route::group([], function () {
    // profile
    Route::get('/dashboard/profile', function () {
        return view('Admin.Profile.index');
    })->name('dashboard');
    // order register
    Route::get('/order', [OrderServices::class, 'register_order_form']);
    Route::post('/order/verify_email', [OrderServices::class, 'verify_email'])->name('order_verify');
    Route::post('/order/choose_password', [OrderServices::class, 'choose_password'])->name('order_verify');
});

