<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ItemsController;

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

 Route::get('/admin', [AdminController::class, 'login_page']);
Route::group(['prefix'=>'admin'], function(){  
    Route::get('/login/page', [AdminController::class, 'login_page']);
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::any('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix'=>'admin', 'middleware'=>'isAdmin'], function(){
    Route::get('/home', [HomeController::class, 'dashboard']); 
    Route::get('/books', [HomeController::class, 'book']);
    Route::post('/add-book',[HomeController::class, 'add_books'])->name('add.book');
    Route::get('book-delete/{id}', [HomeController::class, 'delete'])->name('book.delete');
    Route::get('book-edit/{id}', [HomeController::class, 'edit'])->name('book.edit');
    Route::post('book-update', [HomeController::class, 'update'])->name('book.update');
    Route::get('/add-book-form', function(){
        return view('admin/add-books');
    })->name('add');
});

#Client Routes

Route::group(['prefix'=>'client'], function(){
    Route::get('/login/page', [ClientController::class, 'login_page']);
    Route::post('/login', [ClientController::class, 'login'])->name('client.login');
    Route::post('/register', [ClientController::class, 'register'])->name('client.register');
    Route::any('/logout', [ClientController::class, 'logout'])->name('client.logout');
});

Route::group(['middleware'=>'isClient'], function(){
    Route::get('client-home', [ItemsController::class, 'index']);
    Route::get('/cart/{id}',[ItemsController::class, 'cart']);
    Route::get('/orders/{id}', [ItemsController::class, 'orders']);
    Route::post('/add-to-cart', [ItemsController::class, 'add_to_cart'])->name('add.to.cart');
    Route::get('/remove-from-cart/{id}', [ItemsController::class, 'remove_from_cart']);
});

 
Route::get('/', [ItemsController::class, 'index']);
Route::get('/item', [ItemsController::class, 'items']);
Route::get('/item/details/{id}', [ItemsController::class, 'details']);



