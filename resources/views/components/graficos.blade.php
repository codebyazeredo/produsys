<div class="bg-white shadow-md rounded-lg p-4">
    <h3 class="text-gray-700 text-lg font-semibold mb-4">Gráficos de Movimentações</h3>

    <div class="w-full">
        <canvas id="graficoMovimentacoes"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('graficoMovimentacoes').getContext('2d');

    const data = {
        labels: @json($movimentacaoLabels),
        datasets: [{
            label: 'Movimentações',
            data: @json($movimentacaoData),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const graficoMovimentacoes = new Chart(ctx, config);
</script>
