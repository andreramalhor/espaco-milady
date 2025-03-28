<div class="row">
    <div class="col-md-12">
        <livewire:Configuracao.Sistema.Permissao.PermissaoListar />
    </div>

    <script>
        window.addEventListener('permissaoUpdated', event => {
            console.log(event)
        });
    </script>
</div>
