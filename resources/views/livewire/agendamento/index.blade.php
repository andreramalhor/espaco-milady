<div>
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h4 class="m-0">Agendamento online</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="offset-2 col-sm-8 col-12">
                    
                    <livewire:Atendimento.AgendamentoConsultar :agendamentos="$agendamentos" />
                    
                    @include('livewire.agendamento.etapa_1_servico')

                    @include('livewire.agendamento.etapa_2_data')

                    @include('livewire.agendamento.etapa_3_cliente')

                    @include('livewire.agendamento.etapa_4_final')
                    
                </div>                        
            </div>
        </div>
    </div>
</div>
