<div class="row">
    <div class="col-md-12">
        <livewire:Configuracao.PlanoContas.PlanoContasListar />
    </div>

    <script>
        window.addEventListener('plano_de_contaUpdated', event => {
            console.log(event)
        });
    </script>
</div>
