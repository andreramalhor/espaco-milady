<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="m-0 p-0">Dados da empresa</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item">Sistema</li>
                        <li class="breadcrumb-item">Empresa</li>
                        <li class="breadcrumb-item active">Dados da empresa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#geral" data-bs-toggle="tab">Geral</a></li>
                                <li class="nav-item"><a class="nav-link" href="#endereco" data-bs-toggle="tab">Endereço</a></li>
                                <li class="nav-item"><a class="nav-link" href="#fiscal" data-bs-toggle="tab">Fiscal</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="geral">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle w-75" src="{{ asset('storage/app/logo.png') }}" alt="User profile picture">
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-primary btn-block"><b>Adicionar</b></a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-danger btn-block"><b>Excluir</b></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Código</label>
                                                        <input stype="text" class="form-control" disabled="" wire:model="id_empresa">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group has-success">
                                                        <label class=" control-label">Nome da Empresa<strong class="text-red">*</strong></label>
                                                        <input class="form-control" type="text" wire:model="nome_empresa">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class=" control-label">Nome do Responsável<strong class="text-red">*</strong></label>
                                                        <input class="form-control" type="text" wire:model="nome_responsavel">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class=" control-label">Celular<strong class="text-red">*</strong></label>
                                                        <input class="form-control telefone" type="text" wire:model="fone" x-mask="(99) 99999-9999">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class=" control-label">Comercial</label>
                                                        <input class="form-control telefone" type="text" wire:model="fone_comercial" x-mask="(99) 99999-9999">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class=" control-label">Email</label>
                                                        <input class="form-control" type="email" wire:model="email">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-6 form-group">
                                                    <label class=" control-label">CNPJ</label>
                                                    <input type="text" class="form-control" wire:model="cnpj" x-mask="99.999.999/9999-99">
                                                </div>
                                                <div class="col-sm-3 col-xs-6 form-group">
                                                    <label class=" control-label">CPF</label>
                                                    <input type="text" class="form-control" wire:model="cpf" x-mask="999.999.999-99">
                                                </div>
                                                <div class="col-sm-6 col-xs-12 form-group">
                                                    <div class="form-group">
                                                        <label class=" control-label">Site</label>
                                                        <input class="form-control " type="text" wire:model="site">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class=" control-label">Saldo SMS</label>
                                                    <input class="form-control " type="text" value="0" readonly="" wire:model="saldo_sms">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class=" control-label">Espaço Ocupado / Disponível</label>
                                                    <input class="form-control " type="text" value=" 00 / 50 MB" readonly="" wire:model="limite_espaco">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="endereco">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class=" control-label">
                                                        CEP &nbsp;<a href="#">(pesquisar)</a>
                                                    </label>
                                                    <input type="text" class="form-control" wire:model="cep" x-mask="99.999-99">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label class=" control-label">Endereço</label>
                                                    <input type="text" class="form-control" wire:model="endereco">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label class=" control-label">Número</label>
                                                    <input type="text" class="form-control" wire:model="numero">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class=" control-label">Complemento</label>
                                                    <input type="text" class="form-control" wire:model="complemento">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class=" control-label">Bairro</label>
                                                    <input type="text" class="form-control" wire:model="bairro">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class=" control-label">Estado</label>
                                                    <select class=" form-control" wire:model="estado">
                                                        <option selected="selected">Selecione...</option>
                                                        <option value="AC">Acre</option>
                                                        <option value="AL">Alagoas</option>
                                                        <option value="AP">Amapá</option>
                                                        <option value="AM">Amazonas</option>
                                                        <option value="BA">Bahia</option>
                                                        <option value="CE">Ceará</option>
                                                        <option value="DF">Distrito Federal</option>
                                                        <option value="ES">Espírito Santo</option>
                                                        <option value="GO">Goiás</option>
                                                        <option value="MA">Maranhão</option>
                                                        <option value="MT">Mato Grosso</option>
                                                        <option value="MS">Mato Grosso do Sul</option>
                                                        <option value="MG">Minas Gerais</option>
                                                        <option value="PA">Pará</option>
                                                        <option value="PB">Paraiba</option>
                                                        <option value="PR">Paraná</option>
                                                        <option value="PE">Pernambuco</option>
                                                        <option value="PI">Piauí</option>
                                                        <option value="RR">Roraima</option>
                                                        <option value="RO">Rondônia</option>
                                                        <option value="RJ">Rio de Janeiro</option>
                                                        <option value="RN">Rio Grande do Norte</option>
                                                        <option value="RS">Rio Grande do Sul</option>
                                                        <option value="SC">Santa Catarina</option>
                                                        <option value="SP">São Paulo</option>
                                                        <option value="SE">Sergipe</option>
                                                        <option value="TO">Tocantins</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class=" control-label">Cidade</label>
                                                    <input type="text" class="form-control" wire:model="cidade">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fiscal">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>Razão Social</label>
                                                <input type="text" class="form-control" wire:model="razao_social">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Inscrição Municipal<strong class="text-red">*</strong></label>
                                                <input type="text" class="form-control" wire:model="inscricao_municipal">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Inscrição Estadual</label>
                                                <input type="text" class="form-control" wire:model="inscricao_estadual">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Regime Tributário</label>
                                                <select class="form-control" wire:model="regime_tributario">
                                                    <option value="SimplesNacional">Simples Nacional</option>
                                                    <option value="MEI">MEI - Micro Empreendedor Indivual</option>
                                                    <option value="MEI_Nacional">MEI - NFS-e Nacional</option>
                                                    <option value="NAOSimplesNacional">Não é optante do Simples Nacional</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>CNAE</label>
                                                <input type="text" class="form-control" wire:model="cnae">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Sequência NFS-e</label>
                                                <input type="text" class="form-control xQuantidade" wire:model="sequencia_nfe">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Série NFS-e</label>
                                                <input type="text" class="form-control" wire:model="serie_nfe">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label>Item Lista de Serviço LC116 <i class="fa fa-question-circle" data-container="body" data-trigger="click" data-placement="top" data-content="Item da lista de serviço da lei complementar 116 de 2003 (LC116/2003) http://sped.rfb.gov.br/pagina/show/1601" data-original-title="" title=""></i></label>
                                                <input type="text" class="form-control" wire:model="item_lista_servico_LC116">
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Cód. Serviço Municipal</label>
                                                <input type="text" class="form-control" wire:model="cod_servico_municipal">
                                            </div>
                                            <div class="col-sm-3 form-group">
                                                <label>Descrição Serviço Municipal</label>
                                                <input type="text" class="form-control" wire:model="nome_servico_municipal">
                                            </div>
                                            <hr>
                                            <div class="col-sm-2 form-group">
                                                <label>ISS Retido na Fonte?</label>
                                                <select class="form-control" wire:model="iss_retido_fonte">
                                                    <option value="true">Sim</option>
                                                    <option value="false">Não</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-2 form-group">
                                                <label>Alíquota ISS (%)</label>
                                                <input type="text" class="form-control" wire:model="aliquota_iss">
                                            </div>
                                            <!-- CÁLCULO PARA EMPRESA DE LUCRO REAL OU PRESUMIDO -->
                                            <!-- 
                                                <div class="col-sm-2 form-group">
                                                    <label>Valor do COFINS</label>
                                                    <input type="text" class="form-control" wire:model="valor_cofins">
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label>Valor do CSLL</label>
                                                    <input type="text" class="form-control" wire:model="valor_csll">
                                                </div>
                                                <div class="col-sm-2 form-group">
                                                    <label>Valor do INSS</label>
                                                    <input type="text" class="form-control" wire:model="valor_inss">
                                                </div>
                                            -->
                                            <!--
                                                <div class="row">
                                                    <div class="col-sm-2 form-group">
                                                        <label>Valor do IR</label>
                                                        <input type="text" class="form-control" wire:model="valor_ir">
                                                    </div>
                                                    <div class="col-sm-2 form-group">
                                                        <label>Valor do PIS</label>
                                                        <input type="text" class="form-control" wire:model="valor_pis">
                                                    </div>
                                                </div>
                                            -->
                                            <hr>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label><h4>Certificado Digital A1</h4></label>
                                                    <br>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new ">
                                                            <label class="certificado"></label>
                                                            <input type="hidden" wire:model="arquivo_certificado">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="button" class="btn btn-success green-jungle fileinput-new"><i class="fa fa-plus-circle"></i> Adicionar Certificado </button>
                                                    <button type="button" class="btn btn-danger red"><i class="fa fa-trash"></i> Excluir</button>
                                                    <input type="hidden" wire:model="certificado_hidden">
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>Senha do certificado</label>
                                                            <input type="password" class="form-control" wire:model="senha_certificado">
                                                        </div>
                                                    </div>
                                                    <!-- eNotas preenche automaticamente a validade -->
                                                    <!--
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Data de validade do certificado</label>
                                                                    <input type="text" class="form-control xData" wire:model="data_validade">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    -->
                                                    <hr>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>Tipo de Emissão</label>
                                                            <input value="Producao" class="status form-control" type="hidden" wire:model="tipo_emissao">
                                                            <div data-toggle="buttons-radio" class="btn-group ">
                                                                <button type="button" class="btn btn-primary green active">
                                                                    Produção
                                                                </button>
                                                                <!--
                                                                    <button type="button" rel="Homologacao" class="btn ">
                                                                        Homologação
                                                                    </button>
                                                                -->
                                                            </div>
									                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4>Dados de Acesso para NFS-e em <strong>Produção</strong><i class="fa fa-question-circle" data-container="body" data-trigger="hover" data-placement="top" data-content="Caso a sua prefeitura não pedir o Certificado Digital, será utilizado Usuário e Senha ou Token para emissão" data-original-title="" title=""></i></h4>
                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <label>Usuário</label>
                                                        <input type="text" class="form-control" wire:model="usuario_acesso_producao">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Senha</label>
                                                        <input type="password" class="form-control" wire:model="senha_acesso_producao">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                        <label>Token de Acesso (Opcional)</label>
                                                        <input type="text" class="form-control" wire:model="token_producao">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary" wire:click="dados_empresa">Gravar</button>
                    <button type="reset" class="btn btn-secondary">Cancelar</button>
                </div>
            </div>
        </div>
    </section>    
</div>
