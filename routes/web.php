<?php

use App\Events\PriceList;
use App\Http\Controllers\Core\Services\Admin\LogStatic;
use App\Http\Controllers\Core\Services\LogServices;
use App\Http\Controllers\Core\Services\OrderServices;
use App\Http\Controllers\Core\Services\PriceServices;
use App\Http\Controllers\Statics\Admin\AuthStatic;
use App\Http\Controllers\Statics\Admin\CurrencyStatic;
use App\Http\Controllers\Statics\Admin\OrderStatic;
use App\Http\Controllers\Statics\Admin\PageStatic;
use App\Http\Controllers\Statics\Admin\PermissionStatic;
use App\Http\Controllers\Statics\Admin\PostStatic;
use App\Http\Controllers\Statics\Admin\User\ProfileStatic;
use App\Http\Controllers\Statics\Admin\SettingStatic;
use App\Http\Controllers\Statics\Admin\TicketStatic as ticketadmin;
use App\Http\Controllers\Statics\User\TicketStatic as ticketuser;
use Composer\DependencyResolver\Request;
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

Route::get('/', function () {
    return view('Client.Home');
});

// AUTH
Route::get('/register', [AuthStatic::class, 'register_form'])->name('register');
Route::post('/register', [AuthStatic::class, 'register'])->name('register_store');
Route::get('/login', [AuthStatic::class, 'login_form'])->name('login');
Route::post('/login', [AuthStatic::class, 'login'])->name('login_store');

Route::get('/order', [OrderStatic::class, 'register_order_form']);

Route::get('/dashboard', function () {
    return view('Admin.Home');
});
Route::prefix('/dashboard')->middleware('auth')->group(function () {


    Route::get('/dashboard', [PageStatic::class])->name('dashboard');
    // ORDER
    Route::get('/order', [OrderStatic::class, 'register_order_form']);
    Route::post('/order', [OrderStatic::class, 'register_order'])->name('register_order');

    // PERMISSION
    Route::get('/roles', [PermissionStatic::class, 'get_all_roles_form']);
    Route::get('/roles/create', [PermissionStatic::class, 'create_role_form'])->name('create_role_form');
    // Route::get('/permissions', [PermissionStatic::class, 'create_role_form']);
    // Route::get('/permissions/create', [PermissionStatic::class, 'create_role_form']);

    Route::post('/roles/create_role', [PermissionStatic::class, 'create_role'])->name('create_role');
    Route::post('/permissions/create', [PermissionStatic::class, 'create_permission'])->name('create_permission');
    Route::post('/roles/assign_permission_to_role', [PermissionStatic::class, 'assign_permission_to_role'])->name('assign_permission_to_role');

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
    Route::get('/setting/maintenance/off', [SettingStatic::class, 'maintenance_off']);
    Route::post('/setting/maintenance/on', [SettingStatic::class, 'maintenance_on']);

    // PAGES
    Route::get('/pages', [PageStatic::class, 'create']);
    Route::post('/pages', [PageStatic::class, 'store'])->name('store_page');

    // Logs
    // route bellow will be turned to methode Post , get methode will be used to show form
    Route::get('/logs/delete/{days}', [LogServices::class, 'truncate_log']);

    // Route::post('', [LogStatic::class, '']);

    // Ticket
    Route::get('/ticket', [ticketadmin::class, 'index']);
    Route::get('/ticket/{id}', [ticketadmin::class, 'show'])->name('show_ticket');
    Route::post('/ticket', [ticketadmin::class, 'store'])->name('store_ticket');
});

// USER ROUTES
Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileStatic::class, 'index'])->name('dashboard');
    // order register
Route::post('/order/verify_email', [OrderServices::class, 'verify_email'])->name('order_verify');
    Route::post('/order/choose_password', [OrderServices::class, 'choose_password'])->name('order_verify');

    // ticket
    Route::get('/ticket', [ticketuser::class, 'index']);
    Route::get('/ticket/create', [ticketuser::class, 'create']);
    Route::get('/ticket/{id}', [ticketuser::class, 'show']);
    Route::delete('/ticket/{id}', [ticketuser::class, 'delete'])->name('user_delete_ticket');
    Route::get('/ticket/{id}', [ticketuser::class, 'show'])->name('user_show_ticket');
    Route::post('/ticket', [ticketuser::class, 'store'])->name('user_store_ticket');

});

// Route::get('/broadcast', function (PriceServices $price, Request $request) {
//     $result = $price->get_all_prices($request);
//     $result = json_encode($result);
//     $result = json_decode($result);
// //    broadcast(new PriceList($result->currencies, $request));

//     PriceList::dispatch($result->currencies, $request);
// });
Route::get('/price', function (PriceServices $price_service) {
    $currency_list = $price_service->get_currencies();
    event(new PriceList($currency_list));
});
Route::get('/price/{id}', function (PriceServices $price_service, $id) {
    $coin = $price_service->get_currency_by_id($id);
    // event(new PriceList($coin));
    return $coin;
});



Route::get('/pre', function(){
    return view('Client.singlepost');
});
