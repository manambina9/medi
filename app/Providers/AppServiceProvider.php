<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;  // Ajoute l'importation de Gate
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Définir une Gate pour vérifier si l'utilisateur est un admin
        Gate::define('admin', function ($user) {
            return $user->role == 'admin';  // Vérifie si l'utilisateur a le rôle admin
        });
    }
}
