<?php

use Doctrine\Inflector\WordInflector;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('esercizio.index');

