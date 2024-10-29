<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::group(['prefix'=>'dashboard'],function () {
    Route::resource('post', PostController::class);
    Route::resource('categories', CategoryController::class);

});


