<?php


//Llama al catalogo
Route::get('/catalogo', 'catalogoController@showCatalogo')->name('catalogo');

//Muestra el detalle del producto escogido
Route::get('/detalleProducto{id}', 'catalogoController@vistaDetalleProducto')->name('detalleProducto');

//buscar producto 
Route::get('/catalogo/buscarProducto', 'catalogoController@buscarProducto');