<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmprunteurRegisterController;
use App\Http\Controllers\TwoFactorController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::prefix('mot-de-passe-oublie')->name('password.')->middleware('guest')->group(function () {
    Route::get('/', [PasswordResetLinkController::class, 'create'])->name('request');
    Route::post('/', [PasswordResetLinkController::class, 'store'])->name('email');
    Route::view('/verification', 'forgot-password.check-email')->name('check-email');

    Route::get('/reinitialiser/{token}', [NewPasswordController::class, 'create'])->name('reset');
    Route::post('/reinitialiser', [NewPasswordController::class, 'store'])->name('store');
    Route::view('/terminer', 'forgot-password.password-changed')->name('changed');
});

Route::prefix('inscription')->name('register.')->middleware('guest')->group(function () {
    Route::get('/emprunteur', [EmprunteurRegisterController::class, 'showForm'])->name('emprunteur');
    Route::post('/emprunteur', [EmprunteurRegisterController::class, 'register'])->name('emprunteur.submit');

    Route::get('/investisseur', [EmprunteurRegisterController::class, 'showForm1'])->name('investisseur');
    Route::post('/investisseur', [EmprunteurRegisterController::class, 'register1'])->name('investisseur.submit');
});

Route::prefix('2fa')->name('2fa.')->middleware(['auth'])->group(function () {
    Route::get('/', [TwoFactorController::class, 'show'])->name('verify.form');
    Route::post('', [TwoFactorController::class, 'verify'])->name('verify');
    Route::post('/resend', [TwoFactorController::class, 'resend'])->name('resend');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('test.logout');

});
