<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pizza/{id}', [App\Http\Controllers\FrontController::class, 'show'])->name('pizza.show');

Route::group(['middleware' => 'auth', 'admin'], function(){
    Route::get('/pizza', [App\Http\Controllers\PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/create', [App\Http\Controllers\PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/store', [App\Http\Controllers\PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/{id}/edit', [App\Http\Controllers\PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/{id}/update', [App\Http\Controllers\PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/{id}/delete', [App\Http\Controllers\PizzaController::class, 'destroy'])->name('pizza.destroy');

    // order
    Route::get('/user/order', [App\Http\Controllers\UserOrderController::class, 'index'])->name('user.order');
    Route::post('/user/{id}/status', [App\Http\Controllers\UserOrderController::class, 'changeStatus'])->name('order.status');
});



