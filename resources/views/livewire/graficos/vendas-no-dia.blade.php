<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-dollar-sign"></i>
            Vendas do mês
        </h3> 
    </div>
    <div class="card-body">
        <canvas id="vendas_no_dia"></canvas>
    </div>
    <div class="card-footer clearfix">
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
    </div>        
</div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('vendas_no_dia');
    
    const data = {
        labels: @json($dias ),
        datasets: [{
            label: 'Vendas deste mês',
            data: @json($vendas),
            hoverOffset: 4,
            tension: 0.4
        }]
    };
    
    new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            interaction: {
                intersect: false,
            },
            scales: {
                y: {
                    beginAtZero: true,
                    display: true,
                    title: {
                        display: true,
                        text: 'Value'
                    },
                },
                x: {
                    display: true,
                    title: {
                        display: true
                    }
                },
            }
        }
    });
</script>
