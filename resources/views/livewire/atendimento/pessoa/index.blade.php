<div class="row">
    <div class="col-md-12">
        <livewire:Atendimento.Pessoa.PessoaListar />
    </div>
    <!-- include('livewire.financeiro.lancamento.adicionar') -->
    <!-- include('livewire.financeiro.lancamento.show') -->
    <!-- push('scripts') -->
    <script>
            window.addEventListener('pessoaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
