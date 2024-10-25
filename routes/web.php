<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;

Route::resource('post', PostController::class);
