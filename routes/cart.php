<?php

 ////Rutas carrito de compras

 Route::get('/carList', 'CartController@cart')->name('carList');

 Route::post('/add', 'CartController@addProduct')->name('cart.add');
 
 Route::post('/update', 'CartController@update')->name('cart.update');
 
 Route::post('/remove', 'CartController@remove')->name('cart.remove');
 
 Route::post('/clear', 'CartController@clear')->name('cart.clear');

 Route::post('/createOrder','CartController@createOrder')->name('cart.createOrder');

