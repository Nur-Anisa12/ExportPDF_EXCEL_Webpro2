<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaApi;
use App\Http\Controllers\JurusanApi;
use App\Http\Controllers\AuthController;

// Ini akan otomatis membuat rute index, show, store, update, dan destroy
Route::apiResource('mahasiswa', MahasiswaApi::class);
Route::apiResource('jurusan', JurusanApi::class);