<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\FileController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/send-message', MessageController::class)->name('contact.send');
Route::get('/download', FileController::class)->name('file.download');

Volt::route('/login', 'login')->name('login');

Route::get('logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Volt::route('/messages', 'messages.index')->name('messages.index');
});
