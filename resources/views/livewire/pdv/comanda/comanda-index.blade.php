<div class="row">
    <div class="col-md-12">
        <livewire:PDV.Comanda.ComandaListar />
    </div>
    <script>
        window.addEventListener('comandaUpdated', event => {
            console.log(event)
        });
    </script>
</div>
