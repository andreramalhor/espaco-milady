<div class="row">
    <div class="col-md-12">
        <livewire:Configuracao.FormaPagamentos.FormaPagamentosListar />
    </div>

    <script>
        window.addEventListener('forma_de_pagamentoUpdated', event => {
            console.log(event)
        });
    </script>
</div>
