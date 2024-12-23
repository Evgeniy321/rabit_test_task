<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MessageController::class,'index'])->name('index');
Route::get('/create', [MessageController::class,'create'])->name('create');
Route::post('/message', [MessageController::class,'store'])->name('store');
Route::get('/delete', [MessageController::class,'delete'])->name('delete');
Route::delete('/destory/{message}', [MessageController::class,'destory'])->name('destory');
