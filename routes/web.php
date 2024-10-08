<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;


Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/wallet', function () {
    return view('wallet');
})->name('wallet')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/signin', function () {
    return view('account-pages.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('account-pages.signup');
})->name('signup')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');



Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');
Route::get('/laravel-examples/users-management', [UserController::class, 'index'])->name('users-management')->middleware('auth');



Route::get('/usuarios', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/usuarios/criar', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/usuarios/update', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/usuarios/editar', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');


Route::get('/empresas', [CompanyController::class, 'index'])->name('companies.index')->middleware('auth');
Route::get('/empresas/criar', [CompanyController::class, 'create'])->name('companies.create')->middleware('auth');
Route::post('/empresas/salvar', [CompanyController::class, 'store'])->name('companies.store')->middleware('auth');
Route::get('/empresas/editar', [CompanyController::class, 'edit'])->name('companies.edit')->middleware('auth');
Route::delete('/empresas/deletar', [CompanyController::class, 'destroy'])->name('companies.destroy')->middleware('auth');
Route::put('/empresas/update', [CompanyController::class, 'update'])->name('companies.update')->middleware('auth');