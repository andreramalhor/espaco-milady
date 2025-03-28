<div class="small-box bg-warning">
    <div class="inner">
        <h3>{{ $agendamentos_mes ?? 0 }} / {{ $agendamentos_total ?? 0 }}</h3>
        
        <p>Agendamentos Mês / Geral</p>
    </div>
    <div class="icon">
        <i class="ion ion-calendar"></i>
    </div>
    <a href="{{ route('atd.agendamentos') }}" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
</div>
