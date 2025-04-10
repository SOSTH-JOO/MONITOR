<x-filament-panels::page>
    <div class="p-6 space-y-6">



        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-xl transition duration-300 transform motion-safe:animate-fade-slide-up delay-[100ms]">
                <h2 class="text-xl font-bold text-gray-800">MEMO OCS</h2>
                <p class="text-gray-600 mb-2">Souhiatez vous ajouter un Memo OCS.</p>
                <a href="#" class="inline-block px-4 py-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">Ajouter</a>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-xl transition duration-300 transform motion-safe:animate-fade-slide-up delay-[200ms]">
                <h2 class="text-xl font-bold text-gray-800">Suivi EC22</h2>
                <p class="text-gray-600 mb-2">Analyse des données EC22 en temps réel.</p>
                <a href="#" class="inline-block px-4 py-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">Voir plus</a>
            </div>

            <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-xl transition duration-300 transform motion-safe:animate-fade-slide-up delay-[300ms]">
                <h2 class="text-xl font-bold text-gray-800">EWC vs EC22</h2>
                <p class="text-gray-600 mb-2">Comparer les résultats EWC et EC22.</p>
                <a href="#" class="inline-block px-4 py-2 bg-yellow-400 text-black font-semibold rounded hover:bg-yellow-500">Comparer</a>
            </div>

        </div>

        <div class="text-center text-sm text-gray-500 mt-10 motion-safe:animate-fade-in">
            © {{ date('Y') }} MTN Côte d’Ivoire – Tous droits réservés.
        </div>
    </div>
</x-filament-panels::page>
