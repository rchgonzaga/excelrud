<?php

Route::auth();

Route::resource('import', 'Dashboard\ImportController', ['only' => ['index', 'show', 'create', 'store']]);
Route::resource('product', 'Dashboard\ProductController', ['only' => ['index', 'edit', 'update', 'destroy']]);
Route::resource('user', 'Dashboard\UserController', ['only' => ['edit', 'update']]);

Route::get('/', function () {
    return redirect()->route('import.index');
});
