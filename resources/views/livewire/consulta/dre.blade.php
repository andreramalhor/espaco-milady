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
                    <div class="form-group">
                        <label>Ano</label>
                        <select class="form-control form-control-sm" wire:model.live="ano">
                            <option value='2010'>2010</option>
                            <option value='2011'>2011</option>
                            <option value='2012'>2012</option>
                            <option value='2013'>2013</option>
                            <option value='2014'>2014</option>
                            <option value='2015'>2015</option>
                            <option value='2016'>2016</option>
                            <option value='2017'>2017</option>
                            <option value='2018'>2018</option>
                            <option value='2019'>2019</option>
                            <option value='2020'>2020</option>
                            <option value='2021'>2021</option>
                            <option value='2022'>2022</option>
                            <option value='2023'>2023</option>
                            <option value='2024'>2024</option>
                            <option value='2025'>2025</option>
                            <option value='2026'>2026</option>
                            <option value='2027'>2027</option>
                            <option value='2028'>2028</option>
                            <option value='2029'>2029</option>
                            <option value='2030'>2030</option>
                        </select>
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
                        
                        <th class="text-center">Jan</th>
                        <th class="text-center">Fev</th>
                        <th class="text-center">Mar</th>
                        <th class="text-center">Abr</th>
                        <th class="text-center">Mai</th>
                        <th class="text-center">Jun</th>
                        <th class="text-center">Jul</th>
                        <th class="text-center">Ago</th>
                        <th class="text-center">Set</th>
                        <th class="text-center">Out</th>
                        <th class="text-center">Nov</th>
                        <th class="text-center">Dez</th>
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
                                {{ $nivel_0->titulo }}
                            </td>
                            
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos>where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
                            @if(optional($lancamentos->where('id_conta', '=', $nivel_0->id )->first())->classe_conta == 2)
                            <td class="text-right text-red">
                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_0->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                            </td>
                            @endif
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
                                    {{ $nivel_1->titulo }}
                                </td>
                                
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos>where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos->where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos->where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
                                @if(optional($lancamentos->where('id_conta', '=', $nivel_1->id )->first())->classe_conta == 2)
                                <td class="text-right text-red">
                                    {{ number_format($lancamentos->where('id_conta', '=', $nivel_1->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                </td>
                                @endif
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
                                        {{ $nivel_2->titulo }}
                                    </td>
                                    
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 1)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 2)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 3)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 4)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 5)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 6)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 7)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 8)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 9)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 10)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 11)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
                                    @if(optional($lancamentos->where('id_conta', '=', $nivel_2->id )->first())->classe_conta == 2)
                                    <td class="text-right text-red">
                                        {{ number_format(\App\Models\Financeiro\Lancamento::whereMonth('dt_pagamento', 12)->whereYear('dt_pagamento', $ano)->where('id_conta', '=', $nivel_2->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                    </td>
                                    @endif
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
                                            {{ $nivel_3->titulo }}
                                        </td>
                                        
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
                                        @if(optional($lancamentos->where('id_conta', '=', $nivel_3->id )->first())->classe_conta == 2)
                                        <td class="text-right text-red">
                                            {{ number_format($lancamentos->where('id_conta', '=', $nivel_3->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                        </td>
                                        @endif
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
                                                {{ $nivel_4->titulo }}
                                            </td>
                                            
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                                    <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                            @if(optional($lancamentos->where('id_conta', '=', $nivel_4->id )->first())->classe_conta == 2)
                                            <td class="text-right text-red">
                                                {{ number_format($lancamentos->where('id_conta', '=', $nivel_4->id )->sum('vlr_final') * -1, 2, ',', '.') }}
                                            </td>
                                            @endif
                                                </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
                <tfoot>
                    <tr></tr>
                </tfoot>
            </table>
        </div>
        
        <div class="card-footer clearfix">
            <div class="float-right"></div>
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
