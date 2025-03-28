<div class="row">
    <div class="col-md-12">
        <livewire:Catalogo.Saida.SaidaListar />
    </div>
    <!-- include('livewire.financeiro.lancamento.adicionar') -->
    <!-- include('livewire.financeiro.lancamento.show') -->
    <!-- push('scripts') -->
    <script>
            window.addEventListener('SaidaUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
