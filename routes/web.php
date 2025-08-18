<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name(name:'home'); // прописываем имя для использования на странице

Route::get('/hardware-catalog', \App\Livewire\HardwareCatalog::class);

Route::get('/actions', function () {
    return view('actions');
});
