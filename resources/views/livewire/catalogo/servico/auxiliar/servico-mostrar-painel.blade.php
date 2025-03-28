<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <div class="info-box-content">
                                <span class="info-box-text"><b>Estoque atual</b></span>
                                <span class="info-box-number">{{  number_format($servico->estoque_atual, 0, '', '.') }}</span>
                                <div class="progress m-0">
                                    <div class="progress-bar" style="width: {{ $this->estoque_perc }}%"></div>
                                </div>
                                <span class="progress-description">
                                    <small>
                                        {{ number_format($this->estoque_perc, 1, ',', '.') }}% do mínimo
                                    </small>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box bg-info">
                            <div class="info-box-content">
                                <span class="info-box-text"><b>Média vendas dia</b></span>
                                    <span class="info-box-number">
                                    {{-- number_format($servico->oasfeoauwdwbsas()->sum('qtd') / \Carbon\Carbon::parse($servico->qpwendeiowqnsas()->orderBy('dt_saida', 'asc')->first()->dt_saida)->diffInDays(\Carbon\Carbon::parse($servico->qpwendeiowqnsas()->orderBy('dt_saida', 'desc')->first()->dt_saida), 0, '', '.')) --}}
                                    </span>
                                <div class="progress m-0">
                                    <div class="progress-bar" style="width: 100%"></div>
                                </div>
                                <span class="progress-description">
                                    <small>
                                        {{-- number_format($servico->oasfeoauwdwbsas()->sum('qtd'), 0, '', '.') --}} venndas entre
                                        {{-- \Carbon\Carbon::parse($servico->qpwendeiowqnsas()->orderBy('dt_saida', 'asc')->first()->dt_saida)->format('d/m') --}} e 
                                        {{-- \Carbon\Carbon::parse($servico->qpwendeiowqnsas()->orderBy('dt_saida', 'desc')->first()->dt_saida)->format('d/m') --}}
                                    </small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>