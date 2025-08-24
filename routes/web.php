<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NumberController;



Route::get('/' , [NumberController::class, 'showForm']);

Route::POST('/index', [NumberController::class , 'numberAnalyzer'])->name('index.number');
