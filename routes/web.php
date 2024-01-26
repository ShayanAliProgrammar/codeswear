<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/about', [UserController::class, 'about'])->name('about');

Route::get('/all-products', [ProductsController::class, 'allProducts'])->name('all-products');
Route::get('/product/{product}', [ProductsController::class, 'showProduct'])->name('show-product');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginAdmin'])->name('login-admin');

    Route::middleware('adminauth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        Route::get('/admin-change-info', [AdminController::class, 'adminChangeInfoPage'])->name('admin-change-info');

        Route::post('/admin-change-about', [AdminController::class, 'adminChangeInfo'])->name('change-about-info');

        Route::get('/categories', [AdminController::class, 'productCategoriesPage'])->name('admin-product-categories');

        Route::get('/categories/add', [AdminController::class, 'categoryAddPage'])->name('admin-category-add');

        Route::post('/category/add', [AdminController::class, 'categoryAdd'])->name('category-add');


        Route::get('/categories/edit/{category}', [AdminController::class, 'categoryEditPage'])->name('admin-category-edit');

        Route::post('/category/edit', [AdminController::class, 'categoryEdit'])->name('category-edit');

        Route::delete('/category/delete/{category}', [AdminController::class, 'categoryDelete'])->name('category-delete');


        Route::get('/products/add', [AdminController::class, 'productAddPage'])->name('admin-product-add');

        Route::post('/product/add', [AdminController::class, 'productAdd'])->name('product-add');

        Route::delete('/product/delete/{product}', [AdminController::class, 'productDelete'])->name('product-delete');

        Route::get('/products/edit/{product}', [AdminController::class, 'productEditPage'])->name('admin-product-edit');

        Route::post('/product/edit/{product}', [AdminController::class, 'productEdit'])->name('product-edit');


        Route::get('/products', [AdminController::class, 'productsPage'])->name('admin-products-all');
    });
});
