<?php

use App\Http\Controllers\crudController;
use Illuminate\Support\Facades\Route;


Route::get('/',[crudController::class,'index'])->name('home');
Route::get('/create',[crudController::class,'create'])->name('create');
Route::post('/insert',[crudController::class,'insert'])->name('insert');
Route::get('user/{id}/edit',[crudController::class,'edit'])->name('edit');
Route::put('user/{id}/update',[crudController::class,'update'])->name('update');
Route::delete('user/{id}/delete',[crudController::class,'destroy'])->name('destroy');