<div class="card">
  <div class="card-header">
      <h3 class="card-title">
          <i class="fas fa-calendar"></i>
          Agendamentos do mês
      </h3>
  </div>
  <div class="card-body">
      <canvas id="agenbdamentos_mes"></canvas>
  </div>
  <div class="card-footer clearfix">
      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
  </div>        
</div>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('agenbdamentos_mes').getContext('2d');
  
  const data = {
    labels: @json($dias),
    datasets: [
      {
        label: 'Concluídos',
        data: @json($agendamentos_confirmado),
        // stack: 'combined',
        type: 'line',
        borderColor: 'rgba(40, 167, 69, 1 )',
        backgroundColor: 'rgba(40, 167, 69, 0.5 )',
        fill: true,
        tension: 0.5
      },
      {
        label: 'Agendados',
        data: @json($agendamentos_agendado),
        // stack: 'combined',
        type: 'line',
        borderColor: 'rgba(255, 193, 7, 1 )',
        backgroundColor: 'rgba(255, 193, 7, 0.5 )',
        fill: true,
        tension: 0.5
      },
      {
        label: 'Cancelados',
        data: @json($agendamentos_faltou),
        // stack: 'combined',
        type: 'line',
        borderColor: 'rgba(220, 53, 69, 1 )',
        backgroundColor: 'rgba(220, 53, 69, 0.5 )',
        fill: true,
        tension: 0.5
      },
    ],
  };
  
  new Chart(ctx, {
    data: data,
    options: {
      responsive: true, // Permite que o gráfico se ajuste ao tamanho do container
      elements: {
        point: {
          radius: 3 // Remove os pontos
        }
      }
    },
    responsive: true,
  });

</script>
