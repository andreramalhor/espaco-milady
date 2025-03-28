<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-apponitment"></i>
            Agendamentos do mês
        </h3> 
    </div>
    <div class="card-body">
        <canvas id="agendamentos_por_dia"></canvas>
    </div>
    <div class="card-footer clearfix">
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
    </div>        
</div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('agendamentos_por_dia');

  const data = {
      labels: @json($qtd_servicos->keys()->take(5)),
        datasets: [{
            label: 'My First Dataset',
            data: @json($qtd_servicos->values()->take(5)),
            hoverOffset: 4
        }]
    };

    new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
