<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Relatorio de Comissões</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Relatórios</a></li>
                        <li class="breadcrumb-item">Vendas</li>
                        <li class="breadcrumb-item active">Comissões</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="overlay d-none" wire:loading.class.remove="d-none">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">Comissões</h3>
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
                                        </select>
                                        <div class="input-group-append">
                                            <spam class="btn btn-sm btn-warning">
                                                <i class="far fa-calendar-alt"></i>
                                            </spam>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-head-fixed text-nowrap no-padding">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-left table-dark">Profissional</th>
                                        <th class="text-right table-dark" width="8%">Jan</th>
                                        <th class="text-right table-dark" width="8%">Fev</th>
                                        <th class="text-right table-dark" width="8%">Mar</th>
                                        <th class="text-right table-dark" width="8%">Abr</th>
                                        <th class="text-right table-dark" width="8%">Mai</th>
                                        <th class="text-right table-dark" width="8%">Jun</th>
                                        <th class="text-right table-dark" width="8%">Jul</th>
                                        <th class="text-right table-dark" width="8%">Ago</th>
                                        <th class="text-right table-dark" width="8%">Set</th>
                                        <th class="text-right table-dark" width="8%">Out</th>
                                        <th class="text-right table-dark" width="8%">Nov</th>
                                        <th class="text-right table-dark" width="8%">Dez</th>
                                        <th class="text-right table-dark" width="8%">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comissoes->groupby('id_pessoa') as $profissional => $comissao)
                                    <tr class="{{ $comissao->first()->xeypqgkmimzvknq->kjahdkwkbewtoip->contains('nome', 'Parceiro') ? 'table-success' : 'table-danger' }}">
                                        <td>{{ $comissao->first()->xeypqgkmimzvknq->apelido }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 1)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 2)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 3)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 4)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 5)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 6)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 7)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 8)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 9)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 10)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 11)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%">{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->where('month', '=', 12)->sum('valor'), 2, ',', '.') }}</td>
                                        <td class="text-right" width="8%"><b>{{ number_format( $comissoes->where('id_pessoa', '=', $profissional)->sum('valor'), 2, ',', '.') }}</b></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 1)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 2)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 3)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 4)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 5)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 6)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 7)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 8)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 9)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 10)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 11)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%">{{ number_format( $comissoes->where('month', '=', 12)->sum('valor'), 2, ',', '.') }}</th>
                                        <th class="text-right" width="8%"><b>{{ number_format( $comissoes->sum('valor'), 2, ',', '.') }}</b></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="pagination pagination-sm float-right" style="height: 32px;">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>
