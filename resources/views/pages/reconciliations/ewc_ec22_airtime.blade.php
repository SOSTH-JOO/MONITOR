@extends('layouts.app')

@section('title', 'EWC VS EC22 AIRTIME')

@section('content')
    <!-- ✅ Titre et description -->
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-700">📊 Statistiques de La réconciliation EWC VS EC22 AIRTIME</h1>
        <p class="text-gray-500">Analyse de la réconciliation au fil du temps</p>
    </div>

    <!-- ✅ Section Graphique (Balances ERS) -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-10">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">📊 Courbe EWC VS EC22 AIRTIME</h2>



        <!-- 🎯 Filtre par Date -->
<!-- 🎯 Filtrage par Date -->
<div class="flex flex-col md:flex-row items-center gap-4 mb-6">
    <div>
        <label for="startDate" class="block text-sm font-medium text-gray-700">Date de début</label>
        <input type="date" id="startDate" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
    </div>
    <div>
        <label for="endDate" class="block text-sm font-medium text-gray-700">Date de fin</label>
        <input type="date" id="endDate" class="mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
    </div>
    <a href="#"
   id="applyFilter"
   class="mt-5 inline-block px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-black font-semibold rounded-full shadow-md hover:from-indigo-700 hover:to-purple-700 hover:scale-105 transition duration-300 ease-in-out">
   ✅ Appliquer le filtre
</a>


</div>



        <!-- 🎨 Graphique -->
        <div class="relative w-full h-98 rounded-lg bg-gray-50 shadow-inner p-4">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- ✅ Section Tableau de données -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-10">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">📋 Données de la Courbe</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-gray-50 rounded-lg overflow-hidden shadow border border-gray-300">
                <thead class="bg-gradient-to-r from-blue-200 via-purple-200 to-pink-200 text-gray-700">
                    <tr class="text-sm font-medium divide-x divide-gray-300 border-b border-gray-300">
                        <th class="px-4 py-2 text-left border-r border-gray-300" rowspan="2">DATE</th>
                        <th class="px-4 py-2 text-left border-r border-gray-300" colspan="2">EWP</th>
                        <th class="px-4 py-2 text-left border-r border-gray-300" colspan="2">OCS</th>
                        <th class="px-4 py-2 text-left border-r border-gray-300" colspan="2">GAP</th>
                        <th class="px-4 py-2 text-left" rowspan="2">COMMENTS</th>
                    </tr>

                    <tr class="text-sm divide-x divide-gray-300 border-b border-gray-300">
                        <td class="px-4 py-2 text-left border-r border-gray-300" style="background-color:#D8FEFE;">TOTAL</td>
                        <td class="px-4 py-2 text-left border-r border-gray-300" style="background-color:#D8FEFE;">AMOUNT</td>
                        <td class="px-4 py-2 text-left border-r border-gray-300" style="background-color:#FDEEF3;">TOTAL</td>
                        <td class="px-4 py-2 text-left border-r border-gray-300" style="background-color:#FDEEF3;">AMOUNT</td>
                        <td class="px-4 py-2 text-left border-r border-gray-300">TOTAL</td>
                        <td class="px-4 py-2 text-left border-r border-gray-300">AMOUNT</td>
                    </tr>
                </thead>
                <tbody id="dataTableBody" class="text-sm text-gray-600 divide-y  divide-gray-200 ">
                    <!-- Lignes injectées par JS -->
                </tbody>
            </table>

        </div>
    </div>

    <!-- ✅ Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- ✅ Script personnalisé -->
    <script>
        const data = @json($data);

        if (!data || data.length === 0) {
            console.error("Aucune donnée trouvée pour générer la courbe.");
        } else {
            const dataTableBody = document.getElementById('dataTableBody');
            const ctx = document.getElementById('myChart').getContext('2d');
            let myChart;

            function renderChart(filteredData) {
                const labels = filteredData.map(item => item.dateid);
                const values = filteredData.map(item => parseFloat(item.gap_amount));

                if (myChart) myChart.destroy(); // Détruire l'ancien graphe

                myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Gap Amount',
                            data: values,
                            fill: false,
                            backgroundColor: 'rgba(99, 102, 241, 0.5)',
                            borderColor: 'rgba(99, 102, 241, 1)',
                            borderWidth: 2,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: true },
                            tooltip: {
                                backgroundColor: 'rgba(0,0,0,0.7)',
                                titleColor: '#fff',
                                bodyColor: '#eee',
                                callbacks: {
                                    label: function(context) {
                                        const label = context.dataset.label || '';
                                        const value = context.raw !== null ? context.raw.toLocaleString() + ' CFA' : '';
                                        return `${label}: ${value}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { color: '#4B5563' },
                                grid: { color: '#E5E7EB' }
                            },
                            x: {
                                ticks: { color: '#4B5563' },
                                grid: { display: false }
                            }
                        }
                    }
                });
            }

            function populateTable(filteredData) {
    dataTableBody.innerHTML = "";
    filteredData.forEach(item => {
        const row = document.createElement('tr');
        const gapTotal = parseFloat(item.gap_total);
        const gapAmount = parseFloat(item.gap_amount);
        let commentHTML = '';

        // Vérification si les deux valeurs sont à 0
        if (gapTotal === 0 && gapAmount === 0) {
            commentHTML = `<span style="color:green; font-weight:bold;">OKAY</span>`; // OKAY en vert
        } else {
            commentHTML = `<span style="color:red; font-weight:bold;">TO CHECKS</span>`; // TO CHECKS en rouge
        }

        row.innerHTML = `
            <td class="px-4 py-2 border-r border-gray-300">${item.dateid}</td>
            <td class="px-4 py-2 border-r border-gray-300">${item.ewp_total}</td>
            <td class="px-4 py-2 border-r border-gray-300">${item.ewp_amount}</td>
            <td class="px-4 py-2 border-r border-gray-300">${item.ocs_total}</td>
            <td class="px-4 py-2 border-r border-gray-300">${item.ocs_amount}</td>
            <td class="px-4 py-2 border-r border-gray-300">${item.gap_total}</td>
            <td class="px-4 py-2 border-r border-gray-300">${item.gap_amount}</td>
            <td class="px-4 py-2">${commentHTML}</td>
        `;
        dataTableBody.appendChild(row);
    });
}


            function filterData(startDate, endDate) {
                return data.filter(item => {
                    const itemDate = new Date(item.dateid);
                    return (!startDate || new Date(startDate) <= itemDate) &&
                           (!endDate || itemDate <= new Date(endDate));
                });
            }

            // ✅ Appliquer filtre manuel
            document.getElementById('applyFilter').addEventListener('click', () => {
                const start = document.getElementById('startDate').value;
                const end = document.getElementById('endDate').value;
                let filtered = filterData(start, end);

                // ✅ Trier les données filtrées par date croissante (ancienne → récente)
                filtered.sort((a, b) => new Date(a.dateid) - new Date(b.dateid));

                renderChart(filtered);
                populateTable(filtered);
            });

            // ✅ Par défaut : 5 dernières dates
            const sortedData = [...data].sort((a, b) => new Date(b.dateid) - new Date(a.dateid));
            const defaultData = sortedData.slice(0, 5).sort((a, b) => new Date(a.dateid) - new Date(b.dateid));
            renderChart(defaultData);
            populateTable(defaultData);
        }
    </script>




@endsection
