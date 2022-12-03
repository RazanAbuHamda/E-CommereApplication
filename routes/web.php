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

//Stores Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('index','App\Http\Controllers\DashboardControllers\DashController@index');
Route::get('create/store','App\Http\Controllers\DashboardControllers\StoreContoller@create');
Route::post('store/data', 'App\Http\Controllers\DashboardControllers\StoreContoller@store');
Route::get('store/index', 'App\Http\Controllers\DashboardControllers\StoreContoller@index');
Route::PUT('store/update/{id}', 'App\Http\Controllers\DashboardControllers\StoreContoller@update');
Route::get('store/edit/{id}', 'App\Http\Controllers\DashboardControllers\StoreContoller@edit');
Route::post('store/delete/{id}', 'App\Http\Controllers\DashboardControllers\StoreContoller@destroy');
Route::post('store/restore/{id}', 'App\Http\Controllers\DashboardControllers\StoreContoller@restore');
Route::get('navDelete', 'App\Http\Controllers\DashboardControllers\StoreContoller@delStore');
Route::get('navEdit', 'App\Http\Controllers\DashboardControllers\StoreContoller@edStoreNav');

//products Routes
Route::get('product/index', 'App\Http\Controllers\DashboardControllers\ProductController@index');
Route::get('create/product','App\Http\Controllers\DashboardControllers\ProductController@create');
Route::post('product/data', 'App\Http\Controllers\DashboardControllers\ProductController@store');
Route::post('product/delete/{id}', 'App\Http\Controllers\DashboardControllers\ProductController@destroy');
Route::get('productsDelete', 'App\Http\Controllers\DashboardControllers\ProductController@delProduct');
Route::post('product/restore/{id}', 'App\Http\Controllers\DashboardControllers\ProductController@restore');
Route::PUT('product/update/{id}', 'App\Http\Controllers\DashboardControllers\ProductController@update');
Route::get('product/edit/{id}', 'App\Http\Controllers\DashboardControllers\ProductController@edit');
Route::get('navEditProduct', 'App\Http\Controllers\DashboardControllers\ProductController@edProductNav');

//purchase Routes
Route::post('website/addTransaction/{id}', 'App\Http\Controllers\WebsiteController@addTransaction');
Route::get('list/Transaction', 'App\Http\Controllers\DashboardControllers\PurshaseTransactionsController@index');


//website routes
Route::get('website/index', 'App\Http\Controllers\WebsiteController@index');
Route::get('website/storeProducts/{id}', 'App\Http\Controllers\WebsiteController@showStoreProducts');

