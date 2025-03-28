<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Relatorio de Vendas</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Relatórios</a></li>
                        <li class="breadcrumb-item">Estoque</li>
                        <li class="breadcrumb-item active">Sitação</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="overlay d-none" wire:loading.class.remove="d-none">
                            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                        </div> 
                        <div class="card-header">
                            <h3 class="card-title">Relatórios do estoque</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Comissões
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de comissões. Filtro por tipo, situação, nome, telefone, e-mail e período.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{ route('rel.vendas.comissoes') }}">Clique aqui <i class="fa-solid fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Aniversariantes
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de aniversariantes. Filtro por data, situação cadastral, cidade e estado.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            Clique aqui <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Funcionários
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de funcionários. Filtro por nome, telefone/celular, email, cidade, estado, campos extras e período.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            Clique aqui <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Fornecedores
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de fornecedores. Filtro por tipo, situação, nome, telefone, e-mail e período.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            Clique aqui <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Transportadoras
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de transportadoras. Filtro por tipo, situação, nome, telefone, e-mail e período.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            Clique aqui <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Produtos
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de produtos. Filtro por grupo, situação, nome, código e particularidade.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            Clique aqui <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Serviços
                                            </h3>
                                        </div>
                                        <div class="card-body clearfix">
                                            <p>
                                                Relatório de serviços. Filtro por nome e por código.
                                            </p>
                                        </div>
                                        <div class="card-footer text-center">
                                            Clique aqui <i class="fa-solid fa-arrow-circle-right"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-card-footer clearfix">
                            float-right
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>       
</div>
