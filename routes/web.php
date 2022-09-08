<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerSaya;

Route::get('/', [ControllerSaya::class, "index"]);
Route::get('/hapusdata/{idx}', [ControllerSaya::class, "hapusdata"]);

Route::post('/simpanmhs',[ControllerSaya::class,"simpanmhs"]);



// Route::get('/menu',[ControllerSaya::class,"menu"]);
// Route::post('/kembali',[ControllerSaya::class,"kembali"]);
