<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Livewire\HomePage::class)->name('home');
Route::get('lots', \App\Livewire\LotIndexPage::class)->name('lot.index');
Route::get('lots/{lot}', \App\Livewire\LotShowPage::class)->name('lot.show');
Route::get('/terms-and-conditions', \App\Livewire\TermsConditionsPage::class)->name('terms-conditions');

Route::middleware('guest')->group(function () {
    Route::get('login', \App\Livewire\LoginPage::class)->name('login');
    Route::get('register', \App\Livewire\RegisterPage::class)->name('register');
    Route::get('forget-password', \App\Livewire\ForgotPasswordPage::class)->name('password.request');
    Route::get('reset-password/{token}', \App\Livewire\ResetPasswordPage::class)->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.'
    ], function () {
        Route::get('lots', \App\Livewire\Admin\LotIndexPage::class)->name('lot.index');
        Route::get('lots/create', \App\Livewire\Admin\LotCreatePage::class)->name('lot.create');
        Route::get('lots/{lot}/edit', \App\Livewire\Admin\LotEditPage::class)->name('lot.edit');
        Route::get('lots/{lot}', \App\Livewire\Admin\LotShowPage::class)->name('lot.show');
    });

});


