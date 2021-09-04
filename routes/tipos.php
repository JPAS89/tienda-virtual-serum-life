<?php

//index tipos de categoria 
Route::get('/tipos', 'TipoContoller@listartipos')->name('admintipos');

//Crear nuevos tipos de categoria
Route::get('/crearnuevotipo', 'TipoContoller@verasistentecrear')->name('verasistentecreartipo');

ROUTE::Post('/creartipo','TipoContoller@creartipo')->name('creartipo');

//Editar tipos de categoria
Route::get('/editartipo/{id}', 'TipoContoller@vervistaeditar')->name('vistaeditar');

route::Post('/editartipo','TipoContoller@editartipo')->name('editartipo');

//Eliminar tipos de categoria

Route::get('/eliminartipo/{id}', 'TipoContoller@eliminartipo')->name('eliminartipo');