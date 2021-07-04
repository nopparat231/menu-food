<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Menu;
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
//Route::get('/', [LoginController::class ,'login']);
Route::get('/', [MenuController::class ,'index']);

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware(('is_admin'));

Route::get('Select2', [RestaurantController::class, 'index'])->name('select2');

Route::resource('menu', MenuController::class);
Route::get('/restaurant/{id}', [MenuController::class, 'findd']);

Route::get('MyOrders', [OrdersController::class, 'index']);
Route::post('/add-to-orders', [OrdersController::class, 'create']);
Route::post('/update-orders/{id}', [OrdersController::class, 'update']);

Route::get('/Cart',[AddToCartController::class, 'index']);

Route::post('add-to-cart', [AddToCartController::class, 'addtocart']);
Route::post('update-to-cart',[AddToCartController::class, 'updatetocart']);

Route::get('/load-cart-data', [AddToCartController::class, 'cartloadbyajax']);
Route::delete('delete-from-cart',[AddToCartController::class, 'deletefromcart']);
Route::get('clear-cart',[AddToCartController::class, 'clearcart']);



// Route::get('/home', [App\Http\Controllers\TodoController::class, 'index']);
// Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);
// Route::put('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
// Route::delete('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);