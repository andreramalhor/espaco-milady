<div class="row">
    <div class="col-md-12">
        <livewire:Configuracao.Comissoes.ComissoesListar />
    </div>

    <script>
        window.addEventListener('comissoesUpdated', event => {
            console.log(event)
        });
    </script>
</div>
