<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tel' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'service' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // si tu veux confirmation
        ]);

        $user->name = $validated['name'];
        $user->tel = $validated['tel'];
        $user->email = $validated['email'];
        $user->service = $validated['service'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
}
