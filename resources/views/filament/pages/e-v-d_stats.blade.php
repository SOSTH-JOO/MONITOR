<x-filament-panels::page>

    {{-- Titre --}}
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📊 Statistiques de La reconciliation EVD statistiques</h1>
        <p class="text-gray-500">Analyse de la reconciliation au fil du temps</p>
    </div>



    {{-- Graphique à barres horizontales --}}
    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">📊  Balances ERS</h2>
        <canvas id="balanceChart" height="100"></canvas>
    </div>

    {{-- Tableau --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">🧾Tableau  des statistiques de EVD </h2>
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-gray-600 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-2">Calculated Time</th>
                    <th scope="col" class="px-4 py-2">Reseller Type</th>
                    <th scope="col" class="px-4 py-2">Nombre</th>
                    <th scope="col" class="px-4 py-2">Reseller Balance</th>
                    <th scope="col" class="px-4 py-2">Nombre 14/01/2025</th>
                    <th scope="col" class="px-4 py-2">Balance 14/01/2025</th>
                    <th scope="col" class="px-4 py-2">GAP Nombre</th>
                    <th scope="col" class="px-4 py-2">GAP Reseller Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">15</td>
                    <td class="px-4 py-2">Standard</td>
                    <td class="px-4 py-2">120</td>
                    <td class="px-4 py-2">5000</td>
                    <td class="px-4 py-2">110</td>
                    <td class="px-4 py-2">4800</td>
                    <td class="px-4 py-2">10</td>
                    <td class="px-4 py-2">200</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">20</td>
                    <td class="px-4 py-2">Premium</td>
                    <td class="px-4 py-2">80</td>
                    <td class="px-4 py-2">3000</td>
                    <td class="px-4 py-2">70</td>
                    <td class="px-4 py-2">2800</td>
                    <td class="px-4 py-2">10</td>
                    <td class="px-4 py-2">200</td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">30</td>
                    <td class="px-4 py-2">Elite</td>
                    <td class="px-4 py-2">150</td>
                    <td class="px-4 py-2">7000</td>
                    <td class="px-4 py-2">140</td>
                    <td class="px-4 py-2">6700</td>
                    <td class="px-4 py-2">10</td>
                    <td class="px-4 py-2">300</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Script ChartJS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Graphique à barres verticales
        const ctxBalance = document.getElementById('balanceChart').getContext('2d');
        const balanceChart = new Chart(ctxBalance, {
            type: 'bar',
            data: {
                labels: ['Standard', 'Premium', 'Elite','gob'], // Labels des types de revendeurs
                datasets: [{
                    label: 'Reseller Balance',
                    data: [5000, 3000, 7000 , 5000], // Données de la balance des revendeurs
                    backgroundColor: '#4CAF50',
                    borderColor: '#388E3C',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'x', // Barre verticale
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</x-filament-panels::page>
