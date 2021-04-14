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
Route::get('/', 'ItemController@index')->name('item.index');
Route::get('/item/{item}', 'ItemController@show')->name('item.show');
Route::put('/item/{item}/like', 'ItemController@like')->name('item.like');
Route::delete('/item/{item}/like', 'ItemController@unlike')->name('item.unlike');

// カート画面
Route::get('/cartitem', 'CartItemController@index')->name('cart.index');
Route::post('/cartitem', 'CartItemController@store')->name('cart.store');
Route::put('/cartitem/{cartItem}', 'CartItemController@update')->name('cart.update');
Route::delete('/cartitem/{cartItem}', 'CartItemController@destroy')->name('cart.destroy');

// 購入処理
Route::post('/solditem', 'SoldItemController@store')->name('soldItem.store');

// マイページ
Route::get('/mypage', 'UserController@show')->name('mypage.show');  //登録情報を表示
Route::post('/mypage', 'UserController@store')->name('mypage.store'); //登録情報を更新
Route::get('/mypage/like', 'UserController@like')->name('mypage.like'); // お気に入り
Route::get('/mypage/history', 'UserController@history')->name('mypage.history');  //購入履歴

//認証用ルート
Auth::routes(); 