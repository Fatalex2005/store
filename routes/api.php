<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Регистрация
Route::post('/register' , [UserController::class, 'create' ]);
//Авторизация
Route::post('/login' , [AuthController::class, 'login' ]);
//Просмотр категорий товаров
Route::get('/categories' , [CategoryController::class, 'index']);
//Просмотр товаров определенной категории
Route::get('/category/{id}' , [ProductController::class, 'showMany']);
//Просмотр конкретного товара
Route::get('/product/{id}' , [ProductController::class, 'show']);
//Просмотр всех товаров
Route::get('/products', [ProductController::class, 'index']);
//Просмотр способов оплаты
Route::get('/payment', [OrderController::class, 'payment']);

//Функционал авторизированного пользователя
Route::middleware('auth:api')->group(function () {
    //Выход
    Route::get('/logout', [AuthController::class, 'logout']);
    //Просмотр профиля текущего пользователя
    Route::get('/profile', [UserController::class, 'this']);
    //Добавления товара в корзину
    Route::post('/product/{id}', [CartController::class, 'addToCart']);
    //Просмотр корзины текущего пользователя
    Route::get('/cart', [CartController::class, 'index']);
    //Оформление заказа
    Route::post('/checkout', [OrderController::class, 'checkout']);
    //Редактирование корзины текущего пользователя
    Route::patch('/cart', [CartController::class, 'update']);
    //Редактирование профиля текущего пользователя
    Route::patch('/profile', [UserController::class, 'updateProfile']);
    //Удалеления товара из корзины
    Route::delete('/cart/product/{id}', [CartController::class, 'delete']);
    //Просмотр всех заказов текущего пользователя
    Route::get('/orders', [OrderController::class, 'index']);
    //Просмотр всех купленных товаров
    Route::get('/compound', [UserController::class, 'compound']);
});
//Функционал администратора
Route::middleware('auth:api', 'role:1')->group(function () {
    //Создание категории
    Route::post('/admin/category/create', [AdminController::class, 'createCategory']);
    //Создание товара
    Route::post('/admin/product/create', [AdminController::class, 'createProduct']);
    //Редактирование категории
    Route::patch('/admin/category/{id}/edit', [AdminController::class, 'updateCategory']);
    //Редактирование товара
    Route::post('/admin/product/{id}/edit', [AdminController::class, 'updateProduct']);
    //Редактирование заказа
    Route::post('/admin/order/{id}/edit', [AdminController::class, 'updateOrder']);
    //Удаление категории
    Route::delete('/admin/category/{id}/delete', [AdminController::class, 'deleteCategory']);
    //Удаление товара
    Route::delete('/admin/product/{id}/delete', [AdminController::class, 'deleteProduct']);
});

