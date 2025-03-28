<div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Browser Usage</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">
            <div class="chart-responsive"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="grafico-banco" width="400" height="200"></canvas>
          </div>
        </div>
        <div class="col-md-4">
          <ul class="chart-legend clearfix">
            <li><i class="far fa-circle text-danger"></i> Chrome</li>
            <li><i class="far fa-circle text-success"></i> IE</li>
            <li><i class="far fa-circle text-warning"></i> FireFox</li>
            <li><i class="far fa-circle text-info"></i> Safari</li>
            <li><i class="far fa-circle text-primary"></i> Opera</li>
            <li><i class="far fa-circle text-secondary"></i> Navigator</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('grafico-banco').getContext('2d');
  
  // Função para gerar cores aleatórias
  function gerarCorAleatoria() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgba(${r}, ${g}, ${b}, 0.6)`; // 0.6 é a transparência
  }
  
  // Gerar um array de cores aleatórias com base no número de labels
  const coresAleatorias = @json($labels).map(() => gerarCorAleatoria());
  
  const graficoBanco = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: @json($labels),
      datasets: [{
        label: 'Valores do Banco',
        data: @json($dados),
        backgroundColor: coresAleatorias, // Usar as cores aleatórias aqui
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
          position: 'top',
        },
      }
    },    
  });
</script>
