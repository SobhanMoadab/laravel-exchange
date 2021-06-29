<?php

use App\Http\Controllers\Core\Services\OrderServices;
use App\Http\Controllers\Core\SettingServices;
use App\Http\Controllers\Statics\AuthStatic;
use App\Http\Controllers\Statics\CurrencyStatic;
use App\Http\Controllers\Statics\PermissionStatic;
use App\Http\Controllers\Statics\PostStatic;
use App\Http\Controllers\Statics\SettingStatic;
use Illuminate\Support\Facades\Route;
use Stripe\Service\OrderService;

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
    Route::post('/currency/state/{id}', [CurrencyStatic::class, 'coin_availablity']);
    // Route::get('/currency', [CurrencyStatic::class, 'get_currencies']);
    Route::get('/currency_data', [CurrencyStatic::class, 'coin_data']);
    Route::post('/currency/update/{id}', [CurrencyStatic::class, 'edit_currency']);
    Route::post('/currency/delete/{id}', [CurrencyStatic::class, 'delete_currency']);
    
    // SETTING
    Route::get('/setting/off', [SettingStatic::class, 'maintenance_off']);
    Route::post('/setting/on', [SettingStatic::class, 'maintenance_on']);

    // ORDER
    Route::get('/order', [OrderServices::class, 'register_order_form']);
    Route::post('/order/verify_email', [OrderServices::class, 'verify_email'])->name('order_verify');
    Route::post('/order/choose_password', [OrderServices::class, 'choose_password'])->name('order_verify');

});




// Admin Route
Route::get('/dashboard', function () {return view('Admin.Home');})->name('dashboard');
Route::get('/dashboard/currency', function () {return view('Admin.currency.index');})->name('dashboard');
Route::get('/dashboard/orders', function () {return view('Admin.Orders.index');})->name('dashboard');
Route::get('/dashboard/plugins', function () {return view('Admin.Plugins.index');})->name('dashboard');
Route::get('/dashboard/posts', function () {return view('Admin.Posts.index');})->name('dashboard');
Route::get('/dashboard/profile', function () {return view('Admin.Profile.index');})->name('dashboard');
Route::get('/dashboard/views/customcode', function () {return view('Admin.Views.CustomCode');})->name('dashboard');
Route::get('/dashboard/views/menu', function () {return view('Admin.Views.Menu');})->name('dashboard');
//User Route 
Route::get('/user', function () {return view('User.Home');})->name('dashboard');
Route::get('/user/order', function () {return view('User.Order');})->name('dashboard');
Route::get('/user/referrals', function () {return view('User.Referrals');})->name('dashboard');
Route::get('/user/setting', function () {return view('User.Setting');})->name('dashboard');
Route::get('/user/verify', function () {return view('User.Verifications');})->name('dashboard');
//Auth Route
Route::get('/test', function () { return view('User.Mail.verify',); });
Route::get('/login', function () {return view('auth.login');});
Route::get('/register', function () {return view('auth.register');});
//Client Route
Route::get('/', function () {return view('Client.Home');})->name('home');
Route::get('/wizard', function () {return view('Client.Wizard');})->name('home');
Route::get('/faq', function () {return view('Client.FAQ');})->name('home');
Route::get('/coontactus', function () {return view('Client.ContactUs');})->name('home');
Route::get('/feedback', function () {return view('Client.Feedback');})->name('home');
