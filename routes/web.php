<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/orders', 'OrderController@orders')->name('orders');
    });
});
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
});
Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    Route::group(
        [
            'middleware' => 'basket_not_empty',

        ],
        function () {
            Route::get('/', 'BasketController@basket')->name('basket');
            Route::get('/place', 'BasketController@orderPlace')->name('orderPlace');
            Route::post('/confirm', 'BasketController@basketConfirm')->name('basket-confirm');
            Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
        }
    );
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/welcome', 'MainController@welcome')->name('welcome');
Route::get('/', 'MainController@index')->name('index');
Route::get('/categories', 'MainController@categories')->name('categories');

// Route::get('/hotdeals','MainController@hotDeals')->name('hot-deals');
Route::get('/{category}', 'MainController@category')->name('category');
Route::get('/{category}/{product}', 'MainController@product')->name('product');