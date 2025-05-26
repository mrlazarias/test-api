<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

Route::apiResource('places', PlaceController::class)->only([
    'index', 'show', 'store', 'update'
]); 