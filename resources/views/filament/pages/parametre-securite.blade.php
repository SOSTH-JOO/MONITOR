<x-filament-panels::page>
    <form method="POST" action="{{ route('security-settings.update') }}">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <div>
                <label for="password_history" class="block text-sm font-medium text-gray-700">Historique des mots de passe</label>
                <input type="number" name="password_history" id="password_history" value="{{ old('password_history', $settings->password_history) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="1" required>
            </div>

            <div>
                <label for="password_max_age" class="block text-sm font-medium text-gray-700">Durée maximale du mot de passe (en jours)</label>
                <input type="number" name="password_max_age" id="password_max_age" value="{{ old('password_max_age', $settings->password_max_age) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="1" required>
            </div>

            <div>
                <label for="password_min_length_normal" class="block text-sm font-medium text-gray-700">Longueur minimale du mot de passe (utilisateur normal)</label>
                <input type="number" name="password_min_length_normal" id="password_min_length_normal" value="{{ old('password_min_length_normal', $settings->password_min_length_normal) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="6" required>
            </div>

            <div>
                <label for="password_min_length_admin" class="block text-sm font-medium text-gray-700">Longueur minimale du mot de passe (administrateur)</label>
                <input type="number" name="password_min_length_admin" id="password_min_length_admin" value="{{ old('password_min_length_admin', $settings->password_min_length_admin) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="6" required>
            </div>

            <div>
                <label for="password_complexity" class="block text-sm font-medium text-gray-700">Complexité du mot de passe</label>
                <input type="text" name="password_complexity" id="password_complexity" value="{{ old('password_complexity', $settings->password_complexity) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <div>
                <label for="account_lockout_threshold" class="block text-sm font-medium text-gray-700">Seuil de verrouillage du compte (tentatives échouées)</label>
                <input type="number" name="account_lockout_threshold" id="account_lockout_threshold" value="{{ old('account_lockout_threshold', $settings->account_lockout_threshold) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="1" required>
            </div>

            <div>
                <label for="lockout_counter_period" class="block text-sm font-medium text-gray-700">Période du compteur de verrouillage (en minutes)</label>
                <input type="number" name="lockout_counter_period" id="lockout_counter_period" value="{{ old('lockout_counter_period', $settings->lockout_counter_period) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="1" required>
            </div>

            <div>
                <label for="session_expiry_minutes" class="block text-sm font-medium text-gray-700">Expiration de session (en minutes)</label>
                <input type="number" name="session_expiry_minutes" id="session_expiry_minutes" value="{{ old('session_expiry_minutes', $settings->session_expiry_minutes) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" min="1" required>
            </div>

            <div>
                <label for="avoid_simultaneous_sessions" class="block text-sm font-medium text-gray-700">Eviter les sessions simultanées</label>
                <input type="checkbox" name="avoid_simultaneous_sessions" id="avoid_simultaneous_sessions" {{ old('avoid_simultaneous_sessions', $settings->avoid_simultaneous_sessions) ? 'checked' : '' }} class="mt-1">
            </div>

            <div class="mt-4">
                <button type="submit" class="inline-block px-6 py-2.5 text-white bg-blue-600 rounded-lg shadow-md focus:outline-none hover:bg-blue-700">
                    Mettre à jour les paramètres de sécurité
                </button>
            </div>
        </div>
    </form>
</x-filament-panels::page>
