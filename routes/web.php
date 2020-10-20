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
Route::get('/','TestController@welcome');

Route::get('/prueba',function (){
    return 'Hola';
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');  //ver formulario
    

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
   
    Route::get('/products','ProductController@index');  //listado de productos
    Route::get('/products','ProductController@index');  //listado de productos
    Route::get('/products/create','ProductController@create');  //crear productos //formulario
    Route::post('/products','ProductController@store');  //crea ->guardar datos en la db
    Route::get('/products/{id}/edit','ProductController@edit');  //ver formulario
    Route::post('/products/{id}/edit','ProductController@update');  //crea ->guardar datos en la db
    
    Route::delete('/products/{id}','ProductController@destroy');  //form eliminar- eliminacion fisica

    Route::get('/products/{id}/images','ImageController@index');  //listado de imagenes
    Route::post('/products/{id}/images','ImageController@store');  //registrar imagenes
    Route::delete('/products/{id}/images','ImageController@destroy');  //eliminar imagen

    Route::get('/products/{id}/images/select/{image}','ImageController@select');  //Destacar imagen
});




//put patch delete