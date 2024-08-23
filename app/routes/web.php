<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrderController::class, 'showOrders'])->name('index');

Route::post('/change_status', [OrderController::class, 'changeStatus'])->name('changeStatus');
