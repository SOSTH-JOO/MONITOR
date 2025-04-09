<x-filament-panels::page>

    {{-- Titre --}}
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📊 Statistiques de La reconciliation EVW vs EC22</h1>
        <p class="text-gray-500">Analyse de la reconciliation au fil du temps</p>
    </div>

    {{-- Courbe --}}
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <canvas id="securityChart" height="100"></canvas>
    </div>

    {{-- Tableau --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">🧾 Détails des Paramètres</h2>
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-600 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2">Paramètre</th>
                    <th scope="col" class="px-4 py-2">Valeur</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">Historique des mots de passe</td>
                    <td class="px-4 py-2">24</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Âge max du mot de passe</td>
                    <td class="px-4 py-2">30 jours</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Longueur min. (utilisateur)</td>
                    <td class="px-4 py-2">10 caractères</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Longueur min. (admin)</td>
                    <td class="px-4 py-2">14 caractères</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Seuil de verrouillage</td>
                    <td class="px-4 py-2">10 tentatives</td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Durée de verrouillage</td>
                    <td class="px-4 py-2">30 min</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Script ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('securityChart').getContext('2d');
        const securityChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Tentatives de connexion',
                    data: [5, 9, 7, 14, 6, 4],
                    borderColor: '#FACC15',
                    backgroundColor: 'rgba(250, 204, 21, 0.2)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointBackgroundColor: '#FACC15'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: true }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 2 }
                    }
                }
            }
        });
    </script>

</x-filament-panels::page>
