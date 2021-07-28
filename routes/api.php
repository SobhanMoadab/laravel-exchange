<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Core\Services\AuthenticationServices;
// use App\Http\Controllers\Core\SettingController;
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
// A U T H E N T I C A T I O N
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/verify_order_email', [AuthController::class, 'verify_order_email']);

//TODO: add middleware to check if user is registered, removed for developement reasons
Route::get('/currency', [CurrencyController::class, 'get_currencies']);

Route::prefix('/dashboard')->middleware('auth:api')->group(function (): void {

    // T I C K E T 
    Route::get('/ticket', [TicketController::class, 'get_tickets']);



    // B L O G
    // Route::post('/post', [PostController::class, 'create_post'])->middleware(['auth:api', 'role_or_permission:post a blog']);
    // Route::delete('/post/{id}', [PostController::class, 'delete_post'])->middleware(['auth:api', 'role:SubAdmin']);
    Route::delete('/post/{id}', [PostController::class, 'delete_post']);
    Route::post('/post', [PostController::class, 'create_post']);
    Route::get('/post/{p?}', [PostController::class, 'get_post']);
    Route::put('/post/{id}', [PostController::class, 'edit_post']);
    // P E R M I S S I O N
    //TODO: add middleware after production
    // removed for dev reasons

    // Route::post('/assign_permission',[PermissionController::class, 'assign_permission_to_role'])->middleware(['auth:api', 'role:SuperAdmin']);
    // Route::post('/create_sub_admin',[PermissionController::class, 'create_sub_admin'])->middleware(['auth:api', 'role_or_permission:super-admin|CRUD']);
    // Route::post('/create_permission',[PermissionController::class, 'create_permission'])->middleware(['auth:api', 'role:SuperAdmin']);
    // Route::post('/revoke_permission',[PermissionController::class, 'revoke_permission_of_role'])->middleware(['auth:api', 'role:SuperAdmin']);
    Route::post('/assign_permission', [PermissionController::class, 'assign_permission_to_role']);
    Route::post('/create_sub_admin', [PermissionController::class, 'create_sub_admin']);
    Route::post('/create_permission', [PermissionController::class, 'create_permission']);
    Route::post('/revoke_permission', [PermissionController::class, 'revoke_permission_of_role']);
    Route::post('/create_role', [PermissionController::class, 'create_role']);
    Route::get('/get_all_roles', [PermissionController::class, 'get_all_roles']);
    // C U R R E N C Y
    // Route::post('/create_currency', [CurrencyController::class, 'create_currency']);
    // Route::put('/edit_currency/{id}', [CurrencyController::class, 'edit_currency']);
    // Route::delete('/delete_currency/{id}', [CurrencyController::class, 'delete_currency']);
    // Route::post('/coin_state/{id}', [CurrencyController::class, 'coin_availablity']);
    // S E T T I N G
    // Route::post('/down', [SettingController::class, 'maintenance_on'])->middleware('role:super-admin');
    // Route::get('/up', [SettingController::class, 'maintenance_off'])->middleware('role:super-admin');
});
// Route::get('/ws_market', [CurrencyController::class, 'ws_market']);
Route::get('/debug-sentry', function (): void {
    throw new Exception('My first Sentry error!');
});
