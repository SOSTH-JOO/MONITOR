<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash; // N'oubliez pas d'importer Hash

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'name',
        'tel',
        'email',
        'password',
        'password_change_at',
        'last_login',
        'last_activity',
        'failed_login',
        'statut',
        'service',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password_change_at' => 'datetime',
        'last_login' => 'datetime',
        'last_activity' => 'datetime',
        'actif' => 'boolean',
    ];

    // Utilisez cette méthode pour hasher automatiquement le mot de passe avant de le sauvegarder
    public function setPasswordAttribute($value)
    {
        // Si le mot de passe est fourni, on le hache
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }
}
