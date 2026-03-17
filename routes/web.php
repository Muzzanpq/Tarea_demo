<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfertasController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('ofertas', OfertasController::class);