<div class="card">
  <div class="card-header">
      <h3 class="card-title">
          <i class="fas fa-dollar-sign"></i>
          Fluxo de caixa diário
      </h3>
  </div>
  <div class="card-body">
      <canvas id="fluxo_de_caixa"></canvas>
  </div>
  <div class="card-footer clearfix">
      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
      <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
  </div>        
</div>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('fluxo_de_caixa').getContext('2d');
  
  const data = {
    labels: @json($dias),
    datasets: [
      {
        label: 'Pagamentos',
        data: @json($despesas),
        backgroundColor: 'rgba(220, 53, 73, 0.9 )',
        categoryPercentage: -0.1,
        barPercentage: 12,
        // stack: 'combined',
        // type: 'bar',
      },
      {
        label: 'Recebimentos',
        data: @json($receitas),
        backgroundColor: 'rgba(40, 167, 69, 0.9)',
        categoryPercentage: -0.1,
        barPercentage: 17.0,
        // stack: 'combined',
        // type: 'bar',
      },
    ],
  };
  
  new Chart(ctx, {
    type: 'bar',
    data: data,
    responsive: true,
    scales: {
      x: {
        title: {
          display: true,
          text: 'Dias'
        },
        stacked: false, // As barras não se somam
      },
      y: {
        title: {
          display: true,
          text: 'Valores',
        },
        beginAtZero: true,
      },
    },
    interaction: {
      mode: 'nearest', // Melhora a interação ao passar o mouse
      intersect: true
    },
  });
</script>
