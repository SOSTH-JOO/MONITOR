<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use App\Models\SecuritySetting;

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
    // Récupérer les paramètres de sécurité
    $securitySetting = SecuritySetting::first(); // Adapter si nécessaire

    // Si les paramètres existent, on utilise les valeurs
    $lockoutThreshold = $securitySetting->account_lockout_threshold ?? 3; // Nombre de tentatives échouées avant verrouillage
    $lockoutPeriod = $securitySetting->lockout_counter_period ?? 30; // Période (en jours) pour vérifier la dernière tentative échouée

    // Vérifier les utilisateurs avec plus de tentatives échouées que le seuil défini
    $usersFailedLogin = User::where('failed_login', '>', $lockoutThreshold)->get();

    foreach ($usersFailedLogin as $user) {
        // Mettre à jour le statut de l'utilisateur à 0 (inactif) si échec de connexion supérieur au seuil
        $user->update(['statut' => 0]);
    }

    // Vérifier les utilisateurs dont la date de dernier login dépasse la période de verrouillage
    $usersLastLogin = User::where('last_login', '<', Carbon::now()->subDays($lockoutPeriod))->get();

    foreach ($usersLastLogin as $user) {
        // Mettre à jour le statut de l'utilisateur à 2 (inactif pour longue absence)
        $user->update(['statut' => 2]);
    }
}

}
