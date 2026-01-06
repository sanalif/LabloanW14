<?php

use Illuminate\Support\Facades\Route;

Route::post('/borrow/{item}', [LoanController::class, 'borrow']);
Route::post('/return/{loan}', [LoanController::class, 'return']);

