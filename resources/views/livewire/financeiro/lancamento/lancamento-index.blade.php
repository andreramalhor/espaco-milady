<div class="row">
    <div class="col-md-12">
        <livewire:Financeiro.Lancamento.LancamentoListar />
    </div>
    <script>
        window.addEventListener('lancamentoUpdated', event => {
            console.log(event)
        });
    </script>
</div>
