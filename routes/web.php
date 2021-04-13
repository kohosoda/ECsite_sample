<?php

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

// 商品一覧画面
Route::get('/', 'ItemController@index');
Route::get('/item/{item}', 'ItemController@show')->name('item.show');
Route::put('/item/{item}/like', 'ItemController@like')->name('item.like');
Route::delete('/item/{item}/like', 'ItemController@unlike')->name('item.unlike');

// カート画面
Route::get('/cartitem', 'CartItemController@index');
Route::post('/cartitem', 'CartItemController@store');
Route::put('/cartitem/{cartItem}', 'CartItemController@update');
Route::delete('/cartitem/{cartItem}', 'CartItemController@destroy');

// 購入処理
Route::post('/solditem', 'SoldItemController@store');

// マイページ
Route::get('/mypage', 'UserController@show')->name('users.show');
Route::post('/mypage', 'UserController@store')->name('users.store');

Route::get('/mypage/history', 'UserController@history')->name('users.history');
Route::get('/mypage/like', 'UserController@like')->name('users.like');

//認証用ルート
Auth::routes(); 