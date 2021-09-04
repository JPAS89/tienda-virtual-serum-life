<?php
//crear productos
Route::post('/productos/enviaracrear', 'ProductoContoller@crearproducto')->name('crearproducto');

Route::get('producto/crear', 'ProductoContoller@vervistacrearproducto')->name('vervistacrearproducto');
//editar productos
Route::get('producto/editar/{id}', 'ProductoContoller@vistaEditarProducto')->name('vistaEditarProducto');

Route::post('producto/editarProducto', 'ProductoContoller@editarProducto')->name('editarProducto');
//administracion de productos 
Route::get('/productos', 'ProductoContoller@index')->name('adminProducto');

//eliminar productos 
Route::delete('/eliminarProducto/{id}', 'ProductoContoller@eliminarProducto')->name('eliminarProducto');

//productos bajo stock
Route::get('/productos/stockminimo', 'ProductoContoller@bajoStock')->name('bajostock');

Route::get('/listaPdf', 'ProductoContoller@bajoStockPdf')->name('bajostockPDF');

Route::post('producto/actualizarexistencias', 'ProductoContoller@editarExisteciaProducto')->name('actualizarExistencia');

Route::get('producto/editarcantidad/{id}', 'ProductoContoller@vistaEditarCantidadProducto')->name('vistaEditarCantidadProducto');
