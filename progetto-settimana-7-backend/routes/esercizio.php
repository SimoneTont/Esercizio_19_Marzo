<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');//Prenota
Route::post('/bookings/approve/{booking}', [BookingController::class, 'approve'])->name('bookings.approve');//Approva la prenotazione
Route::post('/bookings/reject/{booking}', [BookingController::class, 'reject'])->name('bookings.reject');//Rifiuta la prenotazione
