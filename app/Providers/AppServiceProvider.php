<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
{
    // Vérification des utilisateurs dont le nombre d'échecs de connexion est supérieur à 3
    // ou dont la date du dernier login dépasse 30 jours
    $this->checkFailedLoginAndLastLogin();
}

protected function checkFailedLoginAndLastLogin()
{
    // Vérifier les utilisateurs avec plus de 3 tentatives échouées de connexion
    $usersFailedLogin = User::where('failed_login', '>', 3)->get();

    foreach ($usersFailedLogin as $user) {
        // Mettre à jour le statut de l'utilisateur à 0 (inactif) si échec de connexion supérieur à 3
        $user->update(['statut' => 0]);
    }

    // Vérifier les utilisateurs dont la date de dernier login dépasse 30 jours
    $usersLastLogin = User::where('last_login', '<', Carbon::now()->subDays(30))->get();

    foreach ($usersLastLogin as $user) {
        // Mettre à jour le statut de l'utilisateur à 2 (inactif pour longue absence)
        $user->update(['statut' => 2]);
    }
}
}
