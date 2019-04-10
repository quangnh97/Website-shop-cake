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

Route::get('/', function () {
    return view('welcome');
});

//
// Route::get('thongtin', function(){
//     echo "Quang cham chi";
// });
//
// Route::get('quang', 'Controller@showinfo');
//
// Route::get('hoten/{ten}/{sv?}', function($ten, $sv = null){
//     return "Ho va ten la:" . $ten . ' sinh vien ' . $sv;
// });
// // view
// Route::get('call-view', function() {
//     $hoten = "Tuan";
//     $view = "Ad";
//     return view('thongtin', compact('hoten','view'));
// });
//
// Route::get('trangchu', function(){
//
//   return view('layout.trangchu.demo');
// });
//
// View::share('title', 'Lap trinh laravel 5x');

Route::get('index', [
    'as' => 'trang--chu',
    'uses' => 'PageController@getIndex'
]);

Route::get('products/{type?}',[
    'as' => 'san-pham',
    'uses' => 'PageController@getProduct'
]);

Route::get('productDetail/{id}',[
    'as' => 'productDetail',
    'uses' => 'PageController@getProductDetail'
]);

Route::get('introduce',[
    'as' => 'introduce',
    'uses' => 'PageController@getIntroduce'
]);

Route::get('contacts',[
    'as' => 'contacts',
    'uses' => 'PageController@getContacts'
]);


Route::get('add-to-cart/{id}',[
    'as' => 'themgiohang',
    'uses' => 'PageController@getAddtoCart'


]);
