<div>
@if($etapa == 'data/agendamento')

<div class="row mb-2">
    <div class="col-sm-12 text-center">
        <h5 class="m-0"><strong>Escolha o horário</strong></h5>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="row">
            <button class="btn btn-primary float-right btn-block col-sm-1" wire:click="mudar_etapa( 'serviço/profissional' )"><i class="fa fa-arrow-left"></i></button>
        </div>
        <div class="row">
            <div class="col-sm-4 col-lg-2">
                <div class="description-block border-right">
                    <div class="widget-user-image p-3">
                        <img class="img-circle img-fluid elevation-1" src="{{ $profissional->src_foto }}" alt="{{ $profissional->apelido }}" style="max-width: 60%;">
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-lg-8">
                <div class="description-block border-right text-left">
                    <div class="p-3">    
                        <span class="description-text">{{ $servico->nome }}</span>
                        <h5 class="description-header">{{ $profissional->apelido }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-lg-2">
                <div class="description-block text-right">
                    <div class="p-3">
                        <h6 class="description-text">
                            <small>
                                @if($servico->mostrar_preco)
                                R$ {{ number_format($servico->vlr_venda, 2, ',', '.') }}
                                @else
                                Consulte o valor
                                @endif
                            </small>
                        </h6>
                        <span class="description-text">
                            {{ \Carbon\Carbon::createFromTimeString($servico->duracao)->format('H:i') }} hr
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-1">
        <div class="col-sm-12 col-lg-6 offset-lg-3 form-group row mb-1">
            <label class="col-sm-2 col-form-label text-center">dia</label>
            <div class="col-sm-10">
                <input type="date" min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" class="form-control form-control-sm text-center" wire:change="horarios( $event.target.value, '{{ $servico->duracao }}' )" wire:model.live="dt_agendamento">
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-valign-middle">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th>Escolha um horário:</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                @if( \Carbon\Carbon::parse($dt_agendamento)->dayOfWeek == 0 || \Carbon\Carbon::parse($dt_agendamento)->dayOfWeek == 1 )
                <tr class="text-center">
                    <td class="text-center" colspan="3">
                        Não estamos abertos nesse dia. Que tal agendar para outra data? :)
                    </td>
                </tr>
                
                @else
                
                @php($horas_diponiveis = 0)
                @foreach( $horariosDoDia as $hora )
                    @if( !\App\Models\Atendimento\Agendamento::whereDate('start', $dt_agendamento)->where('id_profexec', '=', $id_profissional)->get()->contains('start', $dt_agendamento.' '.$hora.':00') && $hora != "12:00" && $hora != "18:00" )
                    <tr class="text-center">
                        <td class="py-1 px-4"></td>
                        <td class="py-1 px-4">{{ $hora }}</td>
                        <td class="py-1 px-4" class="text-right">
                            <button class="btn btn-primary float-right btn-sm" wire:click="confirmar_horario('{{ $hora }}')"><i class="fa fa-arrow-right"></i></button>
                        </td>
                    </tr>
                    @php($horas_diponiveis += 1)
                    @endif
                @endforeach
                
                @if( $horas_diponiveis == 0 )
                <tr class="text-center">
                    <td class="text-center" colspan="3">
                        Esse profissional não possui mais horários disponíveis. :/
                    </td>
                </tr>
                @endif
                
                @endif
            </tbody>
        </table>
    </div>
</div>
@endif
</div>
