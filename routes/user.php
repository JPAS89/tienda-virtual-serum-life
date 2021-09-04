<?php

Route::get('/editarUsuario', 'userController@vistaEditarUsuario')->name('vistaEditarUsuario');

Route::post('/editarUsuario', 'userController@actualizarUsuario')->name('actualizarUsuario');

Route::get('/listaUsuarios', 'userController@userList')->name('listaUsuarios');

//Muestra el detalle del usuario escogido
Route::get('/detalleUsuario{id}', 'userController@vistaDetalleUsuario')->name('detalleUsuario');
