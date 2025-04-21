<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/public/vendors');
});
Route::get('/public', function () {
    return redirect('/public/vendors');
});
