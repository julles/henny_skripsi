<?php
Route::get('/', function () {
    return redirect('login');
});

Route::group(['middleware' => "auth"], function () {
    Route::controller('satuan', 'SatuanController');
    Route::controller('barang', 'BarangController');
    Route::controller('konsumen', 'KonsumenController');
});

Route::auth();

Route::get('/home', 'HomeController@index');
