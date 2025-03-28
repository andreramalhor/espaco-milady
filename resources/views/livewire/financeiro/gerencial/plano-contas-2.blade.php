<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DRE</h3>
                <div class="card-tools">
                    <div class="form-group" style="margin-bottom: 0px">
                        <div class="input-group">
                            <select class="form-control form-control-sm" wire:model.live="ano">
                                <option value=2015> 2015</option>
                                <option value=2016> 2016</option>
                                <option value=2017> 2017</option>
                                <option value=2018> 2018</option>
                                <option value=2019> 2019</option>
                                <option value=2020> 2020</option>
                                <option value=2021> 2021</option>
                                <option value=2022> 2022</option>
                                <option value=2023> 2023</option>
                                <option value=2024> 2024</option>
                                <option value=2025> 2025</option>
                                <option value=2026> 2026</option>
                                <option value=2027> 2027</option>
                            </select>
                            <div class="input-group-append"><a class="btn btn-sm btn-warning" wire:click="listar"><i class="far fa-calendar-alt"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Contal</th>
                            <th>Conta Contabil</th>
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
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contas_contabeis->sortBy('nova_conta') as $conta_contabil)
                            <tr class="
                            @switch($conta_contabil->nivel)
                                @case(0)
                                    table-primary
                                    @break
                                @case(1)
                                    table-secondary
                                    @break
                                @case(2)
                                    table-success
                                    @break
                                @case(3)
                                    table-info
                                    @break
                                @case(4)
                                    table-light
                                    @break
                                @case(5)
                                    table-warning
                                    @break
                            @endswitch
                            ">
                                <td><span>{{ $conta_contabil->nova_conta }}</span></td>
                                <td>
                                    <span>
                                    @for($i = 0; $i < $conta_contabil->nivel; $i++)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    @endfor
                                    {{ $conta_contabil->titulo }}
                                    </span>
                                </td>
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='1' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='2' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='3' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='4' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='5' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='6' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='7' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='8' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='9' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='10' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='11' /></td> 
                                <td class="text-right"><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' mes='12' /></td> 
                                <td class="text-right"><b><x-contabilidade.dre.saldo-conta :idconta='$conta_contabil->id' :ano='$ano' /></b></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
