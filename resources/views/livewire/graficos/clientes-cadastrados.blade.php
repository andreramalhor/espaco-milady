<div class="small-box bg-success">
    <div class="inner">
        <h3>{{ $clientes_mes ?? 0 }} / {{ $clientes_total ?? 0 }}</h3>
        
        <p>Clientes Mês / Geral</p>
    </div>
    <div class="icon">
        <i class="ion ion-person-add"></i>
    </div>
    <a href="{{ route('atd.pessoas') }}" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
</div>
