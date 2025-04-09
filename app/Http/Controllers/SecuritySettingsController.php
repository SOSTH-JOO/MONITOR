<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecuritySetting;

class SecuritySettingsController extends Controller
{
    public function edit()
    {
        $settings = SecuritySetting::firstOrCreate([]);
        return view('security.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'password_history' => 'required|integer|min:1',
            'password_max_age' => 'required|integer|min:1',
            'password_min_length_normal' => 'required|integer|min:6',
            'password_min_length_admin' => 'required|integer|min:6',
            'password_complexity' => 'required|string',
            'account_lockout_threshold' => 'required|integer|min:1',
            'lockout_counter_period' => 'required|integer|min:1',
            'session_expiry_minutes' => 'required|integer|min:1',
            'avoid_simultaneous_sessions' => 'nullable|boolean',
        ]);

        $validated['avoid_simultaneous_sessions'] = $request->has('avoid_simultaneous_sessions');

        $settings = SecuritySetting::first();
        $settings->update($validated);

        return redirect()->back()->with('success', 'Paramètres de sécurité mis à jour avec succès.');
    }
}

