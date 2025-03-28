<div class="row">
    <div class="col-md-12">
        <livewire:PDV.Caixa.CaixaListar />
    </div>
    <script>
        window.addEventListener('caixaUpdated', event => {
            console.log(event)
        });
    </script>
</div>
