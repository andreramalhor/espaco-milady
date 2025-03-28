<div class="row">
    <div class="col-md-12">
        <livewire:Configuracao.Sistema.Usuario.BBBBListar />
    </div>
    <!-- include('livewire.financeiro.lancamento.adicionar') -->
    <!-- include('livewire.financeiro.lancamento.show') -->
    <!-- push('scripts') -->
    <script>
            window.addEventListener('usuarioDeleted', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
