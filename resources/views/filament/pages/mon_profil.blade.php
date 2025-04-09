<x-filament-panels::page>

        {{-- Titre avec animation --}}
        <div class="text-center space-y-2 animate-fade-up">
            <p class="text-lg text-gray-600">Gérez vos informations personnelles avec soin</p>
        </div>
                @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Formulaire avec animation --}}
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6 animate-fade-up animation-delay-200">
            @csrf
            @method('PUT')

            {{-- Nom complet --}}
            <div class="group transition duration-300 hover:scale-[1.01]">
                <label for="name" class="block text-sm font-semibold text-black mb-1">Nom complet</label>
                <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:border-[#FFCC00] transition-all duration-300" required>
            </div>

            {{-- Téléphone --}}
            <div class="group transition duration-300 hover:scale-[1.01]">
                <label for="tel" class="block text-sm font-semibold text-black mb-1">Téléphone</label>
                <input type="text" name="tel" id="tel" value="{{ old('tel', auth()->user()->tel) }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:border-[#FFCC00] transition-all duration-300">
            </div>

            {{-- Email --}}
            <div class="group transition duration-300 hover:scale-[1.01]">
                <label for="email" class="block text-sm font-semibold text-black mb-1">Adresse email</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:border-[#FFCC00] transition-all duration-300" required>
            </div>

            {{-- Service --}}
            <div class="group transition duration-300 hover:scale-[1.01]">
                <label for="service" class="block text-sm font-semibold text-black mb-1">Service</label>
                <input type="text" name="service" id="service" value="{{ old('service', auth()->user()->service) }}"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:border-[#FFCC00] transition-all duration-300">
            </div>


            {{-- Mot de passe --}}
            <div class="group transition duration-300 hover:scale-[1.01]">
                <span class="text-green-700">Je dois mettre les critere de MDP</span>
                <label for="password" class="block text-sm font-semibold text-black mb-1">Nouveau mot de passe</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:border-[#FFCC00] transition-all duration-300">
                <p class="text-xs text-gray-500 mt-2">Laissez vide si vous ne souhaitez pas le changer</p>
                <input type="password" name="password_confirmation" id="password_confirmation"
    class="w-full px-4 py-3 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FFCC00] focus:border-[#FFCC00] transition-all duration-300">

            </div>

            {{-- Bouton --}}
            <div class="text-right">
                <button type="submit"
                    class="inline-block px-8 py-3 bg-[#FFCC00] text-black font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    💾 Mettre à jour
                </button>
            </div>
        </form>

    {{-- Animations personnalisées avec Tailwind (si configuré) --}}
    <style>
        @keyframes fade-in {
            0% {opacity: 0; transform: translateY(10px);}
            100% {opacity: 1; transform: translateY(0);}
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out both;
        }
        .animate-fade-up {
            animation: fade-in 0.6s ease-out both;
        }
        .animation-delay-200 {
            animation-delay: 0.2s;
        }
    </style>
</x-filament-panels::page>
