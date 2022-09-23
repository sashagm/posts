<?php

use Illuminate\Support\Facades\Route;


Route::get('/posts', [\Sashagm\Posts\Http\Controllers\PostController::class, 'index']);
