<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RegistroForm;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', RegistroForm::class)->name('registro');