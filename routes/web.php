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
Auth::routes();

Route::get('/', 'indexController@index');

Route::get('/productos', 'indexController@goToProductos');

Route::get('/faq', 'indexController@goToFaq');

Route::get('/contacto', 'indexController@goToContacto');

Route::get('/login', 'indexController@goToLogin')->middleware('guest');

Route::get('/register', 'indexController@goToRegister')->middleware('guest');

Route::get('/addproduct', 'ProductController@index')->middleware('typeOfUser:2');

Route::post('/addproduct', 'ProductController@store')->middleware('typeOfUser:2');

Route::get('/editproduct', 'ProductController@editproduct')->middleware('typeOfUser:2');

Route::patch('/updateproduct/{producto}', 'ProductController@update')->middleware('typeOfUser:2');

Route::get('/deleteproduct', 'ProductController@delete')->middleware('typeOfUser:2');

Route::delete('/deleteproduct/{producto}', 'ProductController@destroy')->middleware('typeOfUser:2');

Route::get('/addcategory', 'CategoryController@index')->middleware('typeOfUser:2');

Route::post('/addcategory', 'CategoryController@store')->middleware('typeOfUser:2');

Route::get('/editcategory', 'CategoryController@edit')->middleware('typeOfUser:2');

Route::patch('/editcategory/{categoria}', 'CategoryController@update')->middleware('typeOfUser:2');

Route::get('/removeCategory', 'CategoryController@removeCategory')->middleware('typeOfUser:2');

Route::delete('removeCategory/{categoria}', 'CategoryController@destroy')->middleware('typeOfUser:2');

Route::post('/buscadorproductos', 'ProductController@search');

Route::get('/carrito', 'ProductController@cart');

Route::get('/agregarCarrito/{id}', 'ProductController@agregarCarrito');

Route::get('/eliminarcarrito/{producto}', 'ProductController@eliminarcarrito');
