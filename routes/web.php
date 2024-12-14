<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ainet2025ppf', [FormController::class, 'getPpf'])->name('form.ppf');
Route::post('/ainet2025ppf', [FormController::class, 'storePpfs'])->name('form.ppf');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/Password', [ProfileController::class, 'Password'])->name('profile.changePassword');
    Route::get('/resetPassword/{id}', [UserController::class, 'resetPassword']);
    Route::put('/resetPassword/{id}', [UserController::class, 'sendResetUpdate'])->name('reset.password.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', UserController::class);
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/changePassword', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::put('/changePasswordUpdate', [ProfileController::class, 'changePasswordUpdate'])->name('user.changePasswordUpdate');

    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');

    Route::get('/user/status/{id}', [UserController::class, 'status'])->name('user.status');
    Route::get('/user/export', [UserController::class, 'export'])->name('user.export');

});

require __DIR__ . '/auth.php';
