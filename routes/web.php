<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TrialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::post('/trial', [TrialController::class, 'store'])->name('trial.store');

Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    
    // Try to redirect back, but fallback to home if it fails
    $previousUrl = url()->previous();
    if ($previousUrl && $previousUrl !== url()->current()) {
        return redirect($previousUrl);
    }
    
    return redirect()->route('home');
})->name('language.switch');

// Admin Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin.auth');

