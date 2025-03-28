<div class="small-box bg-info">
    <div class="inner">
        <h3>{{ $servicos ?? 0 }} / {{ $produtos ?? 0 }}</h3>
        
        <p>Serviços / Produtoss</p>
    </div>
    <div class="icon">
        <i class="fas fa-box-open"></i>
    </div>
    <a href="{{ route('cat.servicos.index') }}" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
</div>
