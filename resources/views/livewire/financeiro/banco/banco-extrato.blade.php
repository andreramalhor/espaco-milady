<div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Banco: {{ $banco->nome }} <small>({{ $banco->id }})</small></h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="form-group row">
          <label class="col-sm-1 col-form-label text-right">De:</label>
          <div class="col-sm-5">
            <input type="date" class="form-control form-control-sm" wire:model.live="inicio">
          </div>
          <label class="col-sm-1 col-form-label text-right">a:</label>
          <div class="col-sm-5">
            <input type="date" class="form-control form-control-sm" wire:model.live="final">
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-sm no-padding table-valign-middle projects" style="overflow-y: auto;"> <!-- Adicionando barra de rolagem vertical -->
        <thead class="table-dark">
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Data</th>
            <th class="text-center">Tipo</th>
            <th class="text-left">Descrição</th>
            <th class="text-right">Valor</th>
            <th class="text-right">Saldo confirmado</th>
            <th class="text-right">Saldo total</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-dark text-dark">
            <td><b>{{ \Carbon\Carbon::parse($inicio)->subDays(1)->format('d/m/Y') }}</b></td>
            <td><b></b></td>
            <td><b></b></td>
            <td><b>Saldo anterior</b></td>
            <td><b></b></td>
            <td class="text-right"><b>{{ number_format($saldo_inicial, 2, ',', '.') }}</b></td>
            <td class="text-right"><b>{{ number_format($saldo_inicial, 2, ',', '.') }}</b></td>
          </tr>
          @if(!is_null($extrato))
          
            @php($saldo_quita = $saldo_inicial)
            @php($saldo_total = $saldo_inicial)
          
            @foreach($extrato->groupBy('dt_quitacao') as $dia => $lancamentos_dia)
              @foreach($lancamentos_dia as $ciclo)
              <tr>
                <td>{{ $ciclo->id }}</td>
                <td>{{ is_null($ciclo->dt_quitacao) ? '' : \Carbon\Carbon::parse($ciclo->dt_quitacao)->format('d/m/Y') }}</td>
                <td class="text-center">
                  @if($ciclo->getTable() == 'fin_lancamentos' && $ciclo->tipo == 'R')
                    <small class="badge badge-success">{{ $ciclo->tipo }}</small>
                  @elseif($ciclo->getTable() == 'fin_lancamentos' && $ciclo->tipo == 'D')
                    <small class="badge badge-danger">{{ $ciclo->tipo }}</small>
                  @elseif($ciclo->getTable() == 'fin_lancamentos' && $ciclo->tipo == 'T')
                    <small class="badge badge-warning">{{ $ciclo->tipo }}</small>
                  @elseif($ciclo->getTable() == 'fin_recebimentos_cartoes')
                    <small class="badge badge-success">R</small>
                  @endif
                </td>
                <td>
                  <small>
                    @switch($ciclo->status)
                      @case('Confirmado')
                      <i class="fa-solid fa-circle text-green"></i>
                      @break
                      
                      @case('Em aberto')
                        <i class="fa-solid fa-circle text-indigo"></i>
                        @break
                        
                      @case('Pago')
                        <i class="fa-solid fa-circle text-purple"></i>
                        @break
                        
                      @case('Pendente')
                        <i class="fa-solid fa-circle text-red"></i>
                        @break
                        
                      @case('Planilha')
                        <i class="fa-solid fa-circle text-pink"></i>
                        @break
                        
                      @case('Validado')
                        <i class="fa-solid fa-circle text-blue"></i>
                        @break
                        
                      @case('Aguardando')
                        <i class="fa-solid fa-circle text-yellow"></i>
                        @break
                        
                      @case('Antecipado')
                        <i class="fa-solid fa-circle text-orange"></i>
                        @break
                        
                      @case('Recebido')
                        <i class="fa-solid fa-circle text-teal"></i>
                        @break

                    @endswitch
                    | 
                    {!! $ciclo->id_forma_pagamento == 1 ? '<i class="fa-solid fa-money-bill"></i>' : '<i class="fa-solid fa-money-check-dollar"></i>' !!} | 
                    
                    @if($ciclo->getTable() == 'fin_lancamentos')
                      {{ $ciclo->ueifnsjfwefnskd->forma }} - {{ $ciclo->ueifnsjfwefnskd->prazo }} - {{ $ciclo->ueifnsjfwefnskd->bandeira }} - {{ $ciclo->ueifnsjfwefnskd->parcela }}
                    @endif
                    
                    @if($ciclo->getTable() == 'fin_recebimentos_cartoes')
                      {{ $ciclo->gevmgwjvzgdexwm->forma }} - {{ $ciclo->gevmgwjvzgdexwm->prazo }} - {{ $ciclo->gevmgwjvzgdexwm->bandeira }} - {{ $ciclo->gevmgwjvzgdexwm->parcela }}
                    @endif 
                    | 
                    Vlr: {{ number_format($ciclo->vlr_real, 2, ',', '.') }} | 
                    Desc: {{ number_format($ciclo->prc_descontado, 2, ',', '.') }} | 
                    {!! $ciclo->id_lancamento == null ? '<i class="fa-solid fa-square"></i>' : $ciclo->id_lancamento !!} | 
                    {!! $ciclo->origem_lancamento == null ? '<i class="fa-solid fa-square"></i>' : $ciclo->origem_lancamento !!} | 
                    {!! $ciclo->id_caixa == null ? '<i class="fa-solid fa-square"></i>' : $ciclo->id_caixa !!} | 
                    {!! $ciclo->dt_prevista == null ? '<i class="fa-solid fa-square"></i>' : $ciclo->dt_prevista !!} | 
                    
                    @if($ciclo->getTable() == 'fin_recebimentos_cartoes')
                    <span class="float-end">{{ $ciclo->hthgoawwqzbxhdh->id_venda }}
                      <a wire:click="$dispatch('pdv-comanda-comandamostrar', { id: {{ $ciclo->hthgoawwqzbxhdh->id_venda }} })" class="btn btn-xs btn-default" data-bs-tooltip="tooltip" data-bs-title="visualizar" data-original-title="visualizar">
                        <small>
                          <i class="fas fa-search fa-fw"></i>
                        </small>
                      </a>
                    </span>
                    @endif
                  </small>
                </td>
                
                @if($ciclo->tipo == 'D')
                  @php($vlr_final = $ciclo->vlr_final * -1)
                @else
                  @php($vlr_final = $ciclo->vlr_final)
                @endif
                
                <td class="text-right {{ $vlr_final < 0 ? 'text-red' : 'text-green' }}">{{ number_format($vlr_final, 2, ',', '.') }}</td>
                
                @if($ciclo->status == 'Confirmado')
                  @php($saldo_quita = $saldo_quita + $vlr_final)
                  @php($saldo_total = $saldo_total + $vlr_final)
                @else
                  @php($saldo_total = $saldo_total + $vlr_final)
                @endif
                <td class="text-right">{{ number_format($saldo_quita, 2, ',', '.') }}</td>
                <td class="text-right">{{ number_format($saldo_total, 2, ',', '.') }}</td>
              </tr>
              @endforeach
              <tr class="table-dark text-dark">
                <td><b>{{ \Carbon\Carbon::parse($dia)->format('d/m/Y') }}</b></td>
                <td><b></b></td>
                <td><b></b></td>
                <td><b>Saldo do dia</b></td>
                <td><b></b></td>
                <td class="text-right"><b>{{ number_format($saldo_quita, 2, ',', '.') }}</b></td>
                <td class="text-right"><b>{{ number_format($saldo_total, 2, ',', '.') }}</b></td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
