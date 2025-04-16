
<?php

use App\Http\Controllers\BandCurveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReconciliationController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [HomeController::class, 'Chargement'])->name('Chargement');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::get('/404', [HomeController::class, 'Error404'])->name('404');
Route::get('/419', [HomeController::class, 'Error419'])->name('419');
Route::get('/403', [HomeController::class, 'Error403'])->name('403');

Route::middleware(['auth'])->group(function () {
    Route::get('/accueil', [HomeController::class, 'index'])->name('accueil');
    
    Route::get('/Ewc_Ecc22_airtime', [ReconciliationController::class, 'Ewc_Ecc22_airtime'])->name('Ewc_Ecc22_airtime');
    Route::get('/Ewc_Ecc22_bundle', [ReconciliationController::class, 'Ewc_Ecc22_bundle'])->name('Ewc_Ecc22_bundle');
    Route::get('/Evd_stats', [ReconciliationController::class, 'Evd_stats'])->name('Evd_stats');

    Route::get('/Bcsheets', [ServiceController::class, 'Bcsheets'])->name('Bcsheets');
    Route::get('/memos', [ServiceController::class, 'memos'])->name('memos');
    Route::get('/Incidents', [ServiceController::class, 'Incidents'])->name('Incidents');
    Route::get('/Xtratime', [ServiceController::class, 'Xtratime'])->name('Xtratime');
    Route::get('/SDP', [ServiceController::class, 'SDP'])->name('SDP');

    Route::get('/compte', [SettingsController::class, 'compte'])->name('compte');
    Route::get('/log', [SettingsController::class, 'log'])->name('log');
    Route::get('/settings_security', [SettingsController::class, 'settingssecurity'])->name('settings_security');
    Route::get('/Mon_profil', [AuthController::class, 'Mon_profil'])->name('Mon_profil');
});

Route::get('/new_password/{slug}', [AuthController::class, 'new_password'])->name('new.password');
Route::post('/new_password/{slug}', [AuthController::class, 'updatePassword'])->name('update.password');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login'); // ou autre route après déconnexion
})->name('logout');




require __DIR__.'/auth.php';
