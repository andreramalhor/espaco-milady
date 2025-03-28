<div class="row">
    <div class="col-md-12">
        <livewire:Comercial.Venda.VendaListar />
    </div>

    <script>
        window.addEventListener('vendaUpdated', event => {
            console.log(event)
        });
    </script>
</div>
