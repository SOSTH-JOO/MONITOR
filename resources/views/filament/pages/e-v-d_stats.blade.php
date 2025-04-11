<x-filament-panels::page>
$    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">📊 Statistiques de La reconciliation EVD statistiques</h1>
        <p class="text-gray-500">Analyse de la reconciliation au fil du temps</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">📊  Balances ERS</h2>
        <div style="width: 100%; height: 400px; position: relative;">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-10">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Données de la Courbe</h3>
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left">Point</th>
                    <th class="px-4 py-2 text-left">Valeur 1</th>
                    <th class="px-4 py-2 text-left">Valeur 2</th>
                </tr>
            </thead>
            <tbody id="dataTableBody">
                <!-- Les données seront insérées ici via JavaScript -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Récupérer les données passées depuis le contrôleur Filament
        const data = @json($data);

        // Vérification des données dans la console
        console.log(data);

        // Récupérer les séries de données
        const value1 = data.map(item => item.value1);
        const value2 = data.map(item => item.value2);
        const labels = data.map((_, index) => 'Point ' + (index + 1));

        // Remplir le tableau avec les données
        const dataTableBody = document.getElementById('dataTableBody');
        data.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="px-4 py-2">${index + 1}</td>
                <td class="px-4 py-2">${item.value1}</td>
                <td class="px-4 py-2">${item.value2}</td>
            `;
            dataTableBody.appendChild(row);
        });

        // Initialisation du graphique (diagramme à barres)
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Graphique en barres
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Valeur 2', // Le nom de la série pour les valeurs de value2
                        data: value2, // Données de value2
                        backgroundColor: 'rgba(75, 192, 192, 0.5)', // Couleur des barres
                        borderColor: 'rgba(75, 192, 192, 1)', // Bordure des barres
                        borderWidth: 1,
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true // Commencer l'axe Y à zéro
                    }
                }
            }
        });
    </script>
</x-filament-panels::page>
