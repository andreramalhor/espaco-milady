<div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Previsão de recebimento de cartões</h3>
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
            <th class="text-left">Tipo</th>
            <th class="text-left">Bandeira</th>
            <th class="text-right">Jan</th>
            <th class="text-right">Fev</th>
            <th class="text-right">Mar</th>
            <th class="text-right">Abr</th>
            <th class="text-right">Mai</th>
            <th class="text-right">Jun</th>
            <th class="text-right">Jul</th>
            <th class="text-right">Ago</th>
            <th class="text-right">Set</th>
            <th class="text-right">Out</th>
            <th class="text-right">Nov</th>
            <th class="text-right">Dez</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recebimentos->sortBy('gevmgwjvzgdexwm.forma')->groupBy('gevmgwjvzgdexwm.forma') as $forma => $lancamentos)
          <tr>
            <td class="textleft" rowspan="{{ $lancamentos->groupBy('gevmgwjvzgdexwm.bandeira')->count() }}">{{ $forma }}</td>
            @foreach($lancamentos->groupBy('gevmgwjvzgdexwm.bandeira') as $bandeira => $ciclo)
            <td class="text-left">{{ $bandeira }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '01', '01'), \Carbon\Carbon::create(null, '01', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '02', '01'), \Carbon\Carbon::create(null, '02', '28')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '03', '01'), \Carbon\Carbon::create(null, '03', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '04', '01'), \Carbon\Carbon::create(null, '04', '30')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '05', '01'), \Carbon\Carbon::create(null, '05', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '06', '01'), \Carbon\Carbon::create(null, '06', '30')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '07', '01'), \Carbon\Carbon::create(null, '07', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '08', '01'), \Carbon\Carbon::create(null, '08', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '09', '01'), \Carbon\Carbon::create(null, '09', '30')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '10', '01'), \Carbon\Carbon::create(null, '10', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '11', '01'), \Carbon\Carbon::create(null, '11', '30')])->sum('vlr_final'), 2, ',', '.') }}</td>
            <td class="text-right">{{ number_format($ciclo->whereBetween('dt_prevista', [\Carbon\Carbon::create(null, '12', '01'), \Carbon\Carbon::create(null, '12', '31')])->sum('vlr_final'), 2, ',', '.') }}</td>
          </tr>
            @endforeach
          @endforeach  
        </tbody>
      </table>
    </div>
  </div>
</div>
