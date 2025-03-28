<div class="row">
    <div class="col-md-12">
        <livewire:Catalogo.Produto.ProdutoListar />
    </div>
    <!-- include('livewire.financeiro.lancamento.adicionar') -->
    <!-- include('livewire.financeiro.lancamento.show') -->
    <!-- push('scripts') -->
    <script>
            window.addEventListener('produtoUpdated', event => {
                console.log(event)
            });

        </script>
    <!-- endpush -->
</div>
