<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\OperativoController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role == 1) {
        return view('dashboarda');
    }
    if (Auth::user()->role == 2) {
        return view('dashboardo');
    }
    if (Auth::user()->role == 3) {
        return view('dashboard');
    }
    else return redirect('auth/logout');
}
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::middleware([RoleMiddleware::class, User::ROLE_ADMIN])->group(function () {
    Route::resource('pacientes', PacienteController::class)->middleware('auth');
    Route::resource('administrador', AdministradorController::class)->middleware('auth');
    Route::resource('operativo', OperativoController::class)->middleware('auth');
});

Route::middleware([RoleMiddleware::class, User::ROLE_OPERATIVO])->group(function () {
    Route::resource('pacientes', PacienteController::class)->middleware('auth');
});

require __DIR__.'/auth.php';
