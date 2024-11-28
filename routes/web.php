<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PacienteopController;
use App\Http\Controllers\OperativoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);

Route::get('/dashboard', function () {
    $user = Auth::user();

    $layout = match ($user->role) {
        User::ROLE_ADMIN => 'layouts.admin',
        User::ROLE_OPERATIVO => 'layouts.operativo',
        User::ROLE_PACIENTE => 'layouts.app',
        default => 'layouts.guest',
    };

    if (!$user) {
        return redirect('auth/login');
    }

    if ($user->role == User::ROLE_ADMIN) {
        return view('dashboarda');
    }
    if ($user->role == User::ROLE_OPERATIVO) {
        return view('dashboardo');
    }
    if ($user->role == User::ROLE_PACIENTE) {
        return view('dashboard');
    }
    return redirect('auth/logout');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', RoleMiddleware::class.':'.User::ROLE_OPERATIVO])->group(function () {
    Route::resource('pacienteops', PacienteopController::class);
});

Route::middleware(['auth', RoleMiddleware::class.':'.User::ROLE_ADMIN])->group(function () {
    Route::resource('pacientes', PacienteController::class);
    Route::resource('administradors', AdministradorController::class);
    Route::resource('operativos', OperativoController::class);
});



require __DIR__.'/auth.php';
