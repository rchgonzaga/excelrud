<?php

Route::auth();

Route::resource('import', 'Dashboard\ImportController');
Route::resource('product', 'Dashboard\ProductController');
Route::resource('user', 'Dashboard\UserController');

Route::get('/', function () {
    return redirect()->route('import.index');
});
