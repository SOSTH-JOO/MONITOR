@extends('layouts.app')

@section('title', 'EVD STATS')

@section('content')
<div class="text-center mb-6">
    <h1 class="text-3xl font-bold text-gray-700"> Statistiques de La réconciliation EVD</h1>
    <p class="text-gray-500">Analyse de la réconciliation au fil du temps</p>
</div>

<div class="bg-white rounded-xl shadow-md p-6 mb-10">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Balances ERS</h2>

    <div id="filter" class="mb-6">
        <h3 class="text-lg font-semibold text-gray-600 cursor-pointer hover:text-indigo-600 transition" id="toggleFilter">
            Sélectionner des Reseller Types à afficher
            <span id="toggleIcon" class="ml-2 text-sm">🔽</span>
        </h3>

        <div id="filtersContainer" class="flex flex-wrap mt-4 gap-4 mb-4">
            <!-- Injecté dynamiquement -->
        </div>
    </div>

    <div class="relative w-full h-80 rounded-lg bg-gray-50 shadow-inner p-4">
        <canvas id="myChart" class="w-full h-full"></canvas>
    </div>
</div>

<div class="bg-white rounded-xl shadow-md p-6 mb-10">
    <h3 class="text-xl font-semibold mb-4 text-gray-800"> Données de la Courbe</h3>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto bg-gray-50 rounded-lg overflow-hidden shadow">
            <thead class="bg-gradient-to-r from-blue-200 via-purple-200 to-pink-200 text-gray-700">
                <tr class="text-sm font-medium">
                    <th class="px-4 py-2 text-left">Calculated Time</th>
                    <th class="px-4 py-2 text-left">Reseller Type</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Balance</th>
                    <th class="px-4 py-2 text-left">Nombre 14/01/2025</th>
                    <th class="px-4 py-2 text-left">Balance 14/01/2025</th>
                    <th class="px-4 py-2 text-left">Gap Nombre</th>
                    <th class="px-4 py-2 text-left">Gap Reseller Balance</th>
                </tr>
            </thead>
            <tbody id="dataTableBody" class="text-sm text-gray-600">
                @foreach($data as $item)
                    <tr>
                        <td class="px-4 py-2">{{ $item->calculatedtime }}</td>
                        <td class="px-4 py-2">{{ $item->resellertype }}</td>
                        <td class="px-4 py-2">{{ $item->nbre }}</td>
                        <td class="px-4 py-2">{{ $item->bal }}</td>
                        <td class="px-4 py-2">{{ $item->nbre14 }}</td>
                        <td class="px-4 py-2">{{ $item->bal14 }}</td>
                        <td class="px-4 py-2">{{ $item->gap }}</td>
                        <td class="px-4 py-2">{{ $item->gapbal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const data = @json($data);
    const labels = data.map(item => item.resellertype);
    const balances = data.map(item => item.bal);

    const uniqueResellerTypes = [...new Set(labels)];
    const filtersContainer = document.getElementById('filtersContainer');
    const chartCtx = document.getElementById('myChart').getContext('2d');

    uniqueResellerTypes.forEach(type => {
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.id = type;
        checkbox.checked = true;
        checkbox.classList.add('form-checkbox', 'h-5', 'w-5', 'text-indigo-500');

        const label = document.createElement('label');
        label.setAttribute('for', type);
        label.innerText = type;
        label.classList.add('ml-2', 'text-sm', 'text-gray-700');

        const div = document.createElement('div');
        div.classList.add('flex', 'items-center');
        div.appendChild(checkbox);
        div.appendChild(label);

        filtersContainer.appendChild(div);

        checkbox.addEventListener('change', updateChart);
    });

    let myChart = new Chart(chartCtx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Balance',
                data: balances,
                backgroundColor: 'rgba(99, 102, 241, 0.5)',
                borderColor: 'rgba(99, 102, 241, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.7)',
                    titleColor: '#fff',
                    bodyColor: '#eee'
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

    function updateChart() {
        const selected = uniqueResellerTypes.filter(type => document.getElementById(type).checked);
        const filtered = data.filter(item => selected.includes(item.resellertype));

        myChart.data.labels = filtered.map(item => item.resellertype);
        myChart.data.datasets[0].data = filtered.map(item => item.bal);
        myChart.update();
    }

    document.getElementById('toggleFilter').addEventListener('click', () => {
        const container = document.getElementById('filtersContainer');
        const icon = document.getElementById('toggleIcon');
        container.classList.toggle('hidden');
        icon.textContent = container.classList.contains('hidden') ? '🔽' : '🔼';
    });
</script>
@endsection
