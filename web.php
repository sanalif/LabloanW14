<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Halaman login (GET)
Route::get('login', function () {
    return view('auth.login');
})->name('login');

// Proses login (POST)
Route::post('login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/items');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ]);
});

// Logout
Route::post('logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Route yang butuh autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');

    Route::post('/borrow/{item}', [LoanController::class, 'borrow'])->name('borrow');
    Route::post('/return/{loan}', [LoanController::class, 'returnItem'])->name('return');
});
