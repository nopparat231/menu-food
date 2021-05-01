<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    $menu = Menu::latest()->paginate(5);
        return view('welcome', compact('menu'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home',[HomeController::class, 'adminHome'])->name('admin.home')->middleware(('is_admin'));

Route::get('Select2' , [RestaurantController::class, 'index'])->name('select2');

Route::resource('menu', MenuController::class);

Route::resource('order',OrderController::class);

// Route::get('/home', [App\Http\Controllers\TodoController::class, 'index']);
// Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store']);
// Route::put('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'update']);
// Route::delete('/todos/{todo}', [App\Http\Controllers\TodoController::class, 'destroy']);