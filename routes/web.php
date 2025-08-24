<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name(name:'home'); // прописываем имя для использования на странице

Route::get('/hardware-catalog', \App\Livewire\HardwareCatalog::class)->name('catalog');

// Route::get('/actions', function () {
//     return view('actions');
// });

// маршруты указывают на компоненты
Route::get('/actions',\App\Livewire\Action\ActionsExample::class)->name('actions_url');
Route::get('/create-user',\App\Livewire\Action\UserCreate::class)->name('create-user_url');