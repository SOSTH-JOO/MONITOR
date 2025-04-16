<?php

    // app/Models/SecuritySetting.php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class SecuritySetting extends Model
    {
        use HasFactory;

        protected $fillable = [
            'password_history',
            'password_max_age',
            'password_min_length_normal',
            'password_min_length_admin',
            'password_complexity',
            'account_lockout_threshold',
            'lockout_counter_period',
            'session_expiry_minutes',
            'avoid_simultaneous_sessions',
        ];
    }
