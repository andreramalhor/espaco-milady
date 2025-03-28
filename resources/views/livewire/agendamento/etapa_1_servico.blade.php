<div>
@if($etapa == 'serviço/profissional')

    <div class="row mb-2">
        <div class="col-sm-12 text-center">
            <h5 class="m-0"><strong>Escolha o serviço</strong></h5>
        </div>
    </div>

    @foreach( $servicos as $servico )
    <div class="card">
        <div class="card-header border-0">
            <h2 class="card-title">{{ $servico->nome }}</h2>
            <div class="card-tools">
                <small class="text-muted">
                    @if($servico->mostrar_preco)
                    R$ {{ number_format($servico->vlr_venda, 2, ',', '.') }}
                    @else
                    Consulte
                    @endif
                </small>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="col-sm-12 col-lg-6 offset-lg-3 form-group row mb-1">
                <label class="col-sm-2 col-form-label text-center">com</label>
                <div class="col-sm-10">
                    <select class="form-control form-control-sm
    {{--
                    @if(!isset($profissionais[$servico->id]))
                    is-invalid
                    @endif
    --}}
                    " wire:change="profissional_selecionado( '{{ $servico->id }}',  $event.target.value )">
                        <option>Escolha o profissional</option>
                        @foreach ( $servico->smenhgskqwmdjwe as $profissional)
                        <option value="{{ $profissional->id_profexec }}">{{ $profissional->fwpokkeoewfeojd->apelido }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix p-2">
            <button class="btn btn-primary float-right btn-block col-sm-2 col-lg-1
            @if(!isset($profissionais[$servico->id]))
            disabled
            @endif
            " wire:click="confirmar_servico('{{ $servico->id }}')"><i class="fa fa-arrow-right"></i></button>
        </div>
    </div>
    @endforeach
@endif
</div>