<?php

use App\Http\Controllers\CsvController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/properties', PropertyController::class);
Route::post('/upload/csv', CsvController::class);