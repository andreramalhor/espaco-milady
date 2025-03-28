<div>
    <div class="row">
        <div class="col-sm-4 col-12">
            <livewire:presence-channel />
        </div>
        
        <div class="col-sm-4 col-12">
            <livewire:private-channel />
        </div>
        
        <div class="col-sm-4 col-12">
            <livewire:public-channel />
        </div>
        @if(Auth::user()->id == 2)
        
        @endif
        
        <div class="col-sm-6 col-12">

            {{-- 
                <x-Financeiro.Banco.BancosGrafico />
            --}}

            <x-Atendimento.Pessoa.Aniversariantes />
            
        </div>
            

{{-- 
        <div class="col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Saldo para hoje</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="info-box shadow-none">
                                <span class="info-box-icon bg-light"><i class="fas fa-calendar"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">À Receber hoje <small>(agendamentos)</small></span>
                                    @php
                                        $agendamentos = \App\Models\Atendimento\Agendamento::whereDate('start', \Carbon\Carbon::today())->sum('valor');
                                    @endphp
                                    <span class="info-box-number">{{ number_format($agendamentos, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="info-box shadow-none">
                                <span class="info-box-icon bg-light"><i class="fas fa-dollar-sign"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Recebidos</span>
                                    @php
                                        $recebidos = \App\Models\PDV\VendaDetalhe::whereDate('created_at', \Carbon\Carbon::today())->sum('vlr_final');
                                    @endphp
                                    <span class="info-box-number">{{ number_format($recebidos, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    
        <div class="col-sm-6 col-12">
            @livewire('Graficos.VendasDia')
        </div>
    
        <div class="col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Total Cadastros</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            @livewire('Graficos.CadastradosAgendamentos')
                        </div>
                        <div class="col-sm-6 col-12">
                            @livewire('Graficos.CadastradosServicoProduto')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            @livewire('Graficos.CadastradosParceiros')
                        </div>
                        <div class="col-sm-6 col-12">
                            @livewire('Graficos.CadastradosClientes')
                        </div>
                    </div>
                </div>
            </div>
        </div>
 --}}
    </div>
</div>
