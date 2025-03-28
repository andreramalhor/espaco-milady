<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <livewire:Financeiro.Comissoes.FinComissoesAbertas />
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <livewire:Financeiro.Comissoes.FinComissoesPagas />
    </div>

    <script>
        window.addEventListener('comissoesUpdated', event => {
            console.log(event)
        });
    </script>
</div>
