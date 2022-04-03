<?php

use Ayangzy\Contact\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('contact-us', [ContactController::class, 'index'])->name('index');

Route::post('contact', [ContactController::class, 'send'])->name('send');
