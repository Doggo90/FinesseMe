<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('page.index');
Route::post('/store', [MainController::class, 'store'])->name('page.store');
