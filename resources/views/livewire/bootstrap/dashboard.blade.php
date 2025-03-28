<div>

    <h5>
        <b>Welcome:</b>
    </h5>
    
    <h5>
        {{ auth()->user()->nome }}
    </h5>
    
    <div class="row">
        @canany(['Administrador do sitema'])
            @livewire('Graficos.CadastradosClientes')
            @livewire('Graficos.CadastradosAgendamentos')
            @livewire('Graficos.CadastradosServicoProduto')
            @livewire('Graficos.CadastradosParceiros')
        @endcanany
    </div>
    
    <div class="row">
        @canany(['Administrador do sitema'])
            <x-Atendimento.Pessoa.Aniversariantes />
        @endcanany
    
        @canany(['Administrador do sitema'])
            <x-Atendimento.Agendamento.ProximosAgendamentos />
        @endcanany

        @canany(['Administrador do sitema'])
            @livewire('Graficos.Agendamentos')
        @endcanany    
    </div>

</div>
