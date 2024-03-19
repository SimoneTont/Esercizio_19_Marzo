<?php

use Doctrine\Inflector\WordInflector;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello World!';
})->name('esercizio.index');

