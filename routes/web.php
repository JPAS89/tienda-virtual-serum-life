<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoContoller;

/*
|--------------------------------------------------------------------------
| Web Ruoutes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','catalogoController@showCatalogo')->name('catalogo');


Route::get('/about', function () {
    return view('about');
});

Route::get('/miCuenta', function () {
    return view('auth.userInfo');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'HomeController@indexadmin')->name('admin');



Route::group(['prefix' => 'admin'], function(){
   require (__DIR__ . '/tipos.php');
   require (__DIR__ . '/productos.php');
});

Route::group(['prefix' => 'admin','user'], function(){
    require (__DIR__ . '/catalogo.php');
    require (__DIR__ . '/user.php');
    require (__DIR__ . '/cart.php');
    require (__DIR__ . '/ordenes.php');
 });

