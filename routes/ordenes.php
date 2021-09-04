<?php

//index lista de ordenes vista admin
Route::get('/listaOrdenes', 'ordenesController@listarOrdenes')->name('listaOrdenes');


Route::get('/detallePedido{id}', 'ordenesController@verDetallePedido')->name('detallePedido');

//index lista de ordenes vista usuario 
Route::get('/listaPedidos', 'ordenesController@listaPedidos')->name('listaPedidos'); 

//generada comprobante de pedido en pdf
Route::get('/PDFDownload{id}', 'ordenesController@ordenDetails')->name('ordenDetails');

//cambiar estado de orden
Route::POST('/confirmarEntrega{id}', 'ordenesController@confirmarEntrega')->name('confirmarEntrega');

//anular orden
Route::POST('/anularOrden{id}', 'ordenesController@anularOrden')->name('anularOrden');