<x-filament::page>
    <div class="p-6 bg-white rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Grafik Kehadiran</h2>
        <canvas id="absensiChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('absensiChart').getContext('2d');
            const chartData = @json($this->chartData);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData),
                    datasets: [{
                        label: 'Jumlah Kehadiran',
                        data: Object.values(chartData),
                        backgroundColor: ['#4CAF50', '#FF9800', '#F44336', '#2196F3'],
                        borderColor: ['#388E3C', '#F57C00', '#D32F2F', '#1976D2'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: true }
                    }
                }
            });
        });
    </script>
</x-filament::page>