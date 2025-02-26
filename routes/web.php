<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;

// Page d'accueil pour les utilisateurs non authentifiés
Route::get('/', function () {
    return view('home');
})->name('home');

// Routes d'authentification pour tous les utilisateurs
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Groupes protégés par authentification
Route::middleware('auth')->group(function () {

    // Routes de l'utilisateur connecté (tableau de bord utilisateur)
    Route::get('/dashboard', function () {
        // Vérification du rôle utilisateur ou admin
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.dashboard'); // Redirection vers le tableau de bord admin
        }

        return view('user.dashboard'); // Page du tableau de bord de l'utilisateur classique
    })->name('dashboard');

    // Routes pour les utilisateurs standard
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/profile', function() {
            return view('user.profile'); // Page de profil de l'utilisateur
        })->name('profile');
    });

    // Routes de l'administration protégées par rôle 'admin'
    Route::middleware('can:admin')->prefix('admin')->name('admin.')->group(function() {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/users', [UserController::class, 'user'])->name('users.index');
        Route::get('/users/{numero}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{numero}', [UserController::class, 'update'])->name('users.update');
    });

    // Route de déconnexion
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('home'); // Rediriger vers la page d'accueil après déconnexion
    })->name('logout');
});
