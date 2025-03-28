<div>
    <div class="card">
        <div class="overlay d-none" wire:loading.class.remove="d-none">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
        <div class="card-header">
            <h3 class="card-title">Demonstrativo</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fa fa-filter"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h6>Filtros</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <label>Período</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm datepicker" wire:model.live="periodo">
                                <div class="input-group-append">
                                  <button type="submit"  class="btn btn-sm btn-warning">
                                    <i class="far fa-calendar-alt"></i>
                                  </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-responsive p-0">
            <table class="table table-sm table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="text-left">Conta</th>
                        <th class="text-left">Título</th>
                        <th class="text-left">soma</th>
                        <th class="text-left">imprime</th>
                        <th class="text-left">tem_lancamento</th>
                        <th class="text-left">classe_conta</th>
                        <th class="text-left">Quantidade<br>Lançamentos</th>
                        <th class="text-right">Valor</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach($contas_contabeis->sortBy('id')->where('nivel', '=', 0) as $nivel_0)
                        <tr>
                            <td>{{ $nivel_0->nova_conta }}</td>
                            <td>
                                @switch($nivel_0->nivel)
                                    @case(1)
                                    &emsp;
                                    &emsp;
                                    @break
                                    @case(2)
                                    &emsp;&emsp;
                                    &emsp;&emsp;
                                    @break
                                    @case(3)
                                    &emsp;&emsp;&emsp;
                                    &emsp;&emsp;&emsp;
                                    @break
                                    @case(4)
                                    &emsp;&emsp;&emsp;&emsp;
                                    &emsp;&emsp;&emsp;&emsp;
                                    @break
                                    @case(5)
                                    &emsp;&emsp;&emsp;&emsp;&emsp;
                                    &emsp;&emsp;&emsp;&emsp;&emsp;
                                    @break
                                    @case(6)
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                    @break
                                @endswitch
                                {{ $nivel_0->titulo }}</td>
                            <td>{{ $nivel_0->soma }}</td>
                            <td>{{ $nivel_0->imprime }}</td>
                            <td>{{ $nivel_0->tem_lancamento }}</td>
                            <td>{{ optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta }}</td>
                            <td>{{ $lancamentos->where('id_conta', '=', $nivel_0->id )->count() }}</td>
                            <td class="text-right text-red">
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                @endif
                            </td>
                        </tr>
                        @foreach($nivel_0->sasjiqelrhwkejs as $nivel_1)
                            <tr>
                                <td>{{ $nivel_1->nova_conta }}</td>
                                <td>
                                    @switch($nivel_1->nivel)
                                        @case(1)
                                        &emsp;
                                        &emsp;
                                        @break
                                        @case(2)
                                        &emsp;&emsp;
                                        &emsp;&emsp;
                                        @break
                                        @case(3)
                                        &emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;
                                        @break
                                        @case(4)
                                        &emsp;&emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;&emsp;
                                        @break
                                        @case(5)
                                        &emsp;&emsp;&emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;&emsp;&emsp;
                                        @break
                                        @case(6)
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                        @break
                                    @endswitch
                                    {{ $nivel_1->titulo }}</td>
                                <td>{{ $nivel_1->soma }}</td>
                                <td>{{ $nivel_1->imprime }}</td>
                                <td>{{ $nivel_1->tem_lancamento }}</td>
                                <td>{{ optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta }}</td>
                                <td>{{ $lancamentos->where('id_conta', '=', $nivel_1->id )->count() }}</td>
                                <td class="text-right text-red">
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                    {{ number_format($lancamentos->where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    @endif
                                </td>
                            </tr>
                            @foreach($nivel_1->sasjiqelrhwkejs as $nivel_2)
                                <tr>
                                    <td>{{ $nivel_2->nova_conta }}</td>
                                    <td>
                                        @switch($nivel_2->nivel)
                                            @case(1)
                                            &emsp;
                                            &emsp;
                                            @break
                                            @case(2)
                                            &emsp;&emsp;
                                            &emsp;&emsp;
                                            @break
                                            @case(3)
                                            &emsp;&emsp;&emsp;
                                            &emsp;&emsp;&emsp;
                                            @break
                                            @case(4)
                                            &emsp;&emsp;&emsp;&emsp;
                                            &emsp;&emsp;&emsp;&emsp;
                                            @break
                                            @case(5)
                                            &emsp;&emsp;&emsp;&emsp;&emsp;
                                            &emsp;&emsp;&emsp;&emsp;&emsp;
                                            @break
                                            @case(6)
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            @break
                                        @endswitch
                                        {{ $nivel_2->titulo }}</td>
                                    <td>{{ $nivel_2->soma }}</td>
                                    <td>{{ $nivel_2->imprime }}</td>
                                    <td>{{ $nivel_2->tem_lancamento }}</td>
                                    <td>{{ optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta }}</td>
                                    <td>{{ $lancamentos->where('id_conta', '=', $nivel_2->id )->count() }}</td>
                                    <td class="text-right text-red">
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                        {{ number_format($lancamentos->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        @endif
                                    </td>
                                </tr>
                                @foreach($nivel_2->sasjiqelrhwkejs as $nivel_3)
                                    <tr>
                                        <td>{{ $nivel_3->nova_conta }}</td>
                                        <td>
                                            @switch($nivel_3->nivel)
                                                @case(1)
                                                &emsp;
                                                &emsp;
                                                @break
                                                @case(2)
                                                &emsp;&emsp;
                                                &emsp;&emsp;
                                                @break
                                                @case(3)
                                                &emsp;&emsp;&emsp;
                                                &emsp;&emsp;&emsp;
                                                @break
                                                @case(4)
                                                &emsp;&emsp;&emsp;&emsp;
                                                &emsp;&emsp;&emsp;&emsp;
                                                @break
                                                @case(5)
                                                &emsp;&emsp;&emsp;&emsp;&emsp;
                                                &emsp;&emsp;&emsp;&emsp;&emsp;
                                                @break
                                                @case(6)
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                @break
                                            @endswitch
                                            {{ $nivel_3->titulo }}</td>
                                        <td>{{ $nivel_3->soma }}</td>
                                        <td>{{ $nivel_3->imprime }}</td>
                                        <td>{{ $nivel_3->tem_lancamento }}</td>
                                        <td>{{ optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta }}</td>
                                        <td>{{ $lancamentos->where('id_conta', '=', $nivel_3->id )->count() }}</td>
                                        <td class="text-right text-red">
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            @endif
                                        </td>
                                    </tr>
                                    @foreach($nivel_3->sasjiqelrhwkejs as $nivel_4)
                                        <tr>
                                            <td>{{ $nivel_4->nova_conta }}</td>
                                            <td>
                                                @switch($nivel_4->nivel)
                                                    @case(1)
                                                    &emsp;
                                                    &emsp;
                                                    @break
                                                    @case(2)
                                                    &emsp;&emsp;
                                                    &emsp;&emsp;
                                                    @break
                                                    @case(3)
                                                    &emsp;&emsp;&emsp;
                                                    &emsp;&emsp;&emsp;
                                                    @break
                                                    @case(4)
                                                    &emsp;&emsp;&emsp;&emsp;
                                                    &emsp;&emsp;&emsp;&emsp;
                                                    @break
                                                    @case(5)
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;
                                                    @break
                                                    @case(6)
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                                    @break
                                                @endswitch
                                                {{ $nivel_4->titulo }}</td>
                                            <td>{{ $nivel_4->soma }}</td>
                                            <td>{{ $nivel_4->imprime }}</td>
                                            <td>{{ $nivel_4->tem_lancamento }}</td>
                                            <td>{{ optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta }}</td>
                                            <td>{{ $lancamentos->where('id_conta', '=', $nivel_4->id )->count() }}</td>
                                            <td class="text-right text-red">
                                                @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                       
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="card-footer clearfix">
            <div class="float-right">

            </div>
        </div>
    </div>    
</div>

@section('js')
<script type="text/javascript">
  $('.datepicker').daterangepicker({
    format: "DD/MM/YYYY",
    opens: 'left',
    alwaysShowCalendars: true,
    autoclose: true,
    autoApply: true,
    locale: {
      "customRangeLabel": "Selecionar intervalo",
      "format": "DD/MM/YYYY",
      "separator": " - ",
      "applyLabel": "Aplicar",
      "cancelLabel": "Cancelar",
      "daysOfWeek": [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],
      "monthNames": [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
    },
    firstDay: 1,
    ranges: {
      'Hoje': [moment(), moment()],
      'Ontem': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 dias': [moment().subtract(6, 'days'), moment()],
      'Últimos 30 dias': [moment().subtract(29, 'days'), moment()],
      'Este mês': [moment().startOf('month'), moment().endOf('month')],
      'Mês anterior': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
  }, function(start, end)
  {
    Livewire.dispatch('asdadasdasd', { start: start, end: end })
  });
</script>
@endsection
