<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'ProductsController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/products','ProductsController');


Route::get('/add-to-cart/{id}', [
  'uses' => 'ShopController@addToCart',
  'as' => 'shop.addToCart']);

Route::get('/reduce/{id}', [
  'uses' => 'ShopController@reduceByOne',
  'as' => 'shop.reduceByOne']);

Route::get('/remove/{id}', [
  'uses' => 'ShopController@removeFromCart',
  'as' => 'shop.removeFromCart']);

Route::get('/emptycart', [
  'uses' => 'ShopController@emptyCart',
  'as' => 'shop.emptyCart']);

Route::get('/shopping-cart', [
  'uses' => 'ShopController@getCart',
  'as' => 'shop.shoppingCart']);

Route::get('/checkout', [
  'uses' => 'ShopController@getCheckout',
  'as' => 'shop.checkout',
  'middleware' => 'auth']);

Route::post('/checkout', [
  'uses' => 'ShopController@postCheckout',
  'as' => 'shop.checkout',
  'middleware' => 'auth']);

Route::get('/success', [
  'uses' => 'ShopController@getSuccess',
  'as' => 'shop.success',
  'middleware' => 'auth']);

Route::get('/user/profile', [
  'uses' => 'UserController@getProfile',
  'as' => 'user.profile',
  'middleware' => 'auth']);
