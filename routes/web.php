<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;
use App\Livewire\Extra\FormReplicator;

use App\Livewire\Auxiliar\{BuscaCeps, IndexVazio, ConfiguracoesIniciais};

use App\Livewire\Atendimento\Pessoa\{PessoaIndex, PessoaListar, PessoaCriar, PessoaEditar, PessoaComissoes, PessoaMostrar, PessoaDeletar};
use App\Livewire\Atendimento\Agendamento\{AgendamentoIndex, AgendamentoBook, AgendamentoListar, AgendamentoCriar, AgendamentoEditar, AgendamentoMostrar, AgendamentoDeletar, AgendamentoOrdem, AgendamentoFixas};
use App\Livewire\Atendimento\Agendamento;

use App\Livewire\Catalogo\Servico\{ServicoIndex, ServicoListar, ServicoMostrar, ServicoCriar, ServicoEditar, ServicoComissoes, ServicoDeletar};
use App\Livewire\Catalogo\Produto\{ProdutoIndex, ProdutoListar, ProdutoMostrar, ProdutoCriar, ProdutoEditar, ProdutoComissoes, ProdutoDeletar};
use App\Livewire\Catalogo\Compra\{CompraIndex, CompraListar, CompraMostrar, CompraCriar, CompraEditar, CompraDeletar, CompraAdicionarProdutos, CompraInformarPagamentos};
use App\Livewire\Catalogo\Saida\{SaidaIndex, SaidaListar, SaidaMostrar, SaidaCriar, SaidaEditar, SaidaDeletar, SaidaRetirarProdutos, SaidaVerProdutos};

use App\Livewire\Configuracao\Sistema\Usuario\Usuario;
use App\Livewire\Configuracao\Sistema\Usuario\{BBBBIndex, BBBBListar, BBBBCriar, BBBBEditar, BBBBMostrar};

use App\Livewire\Catalogo\{Categoria, Servico};
use App\Livewire\Catalogo\Categoria\{CategoriaIndex, CategoriaStore};

use App\Livewire\Dashboard\{DashboardPadrao, DashboardFinanceiro, DashboardGeral, DashboardAgenda, DashboardVendas};

use App\Livewire\Comercial\Venda\{VendaIndex, VendaListar, VendaCriar, VendaMostrar, VendaEditar, VendaDeletar};
use App\Livewire\Comercial\Lead;
use App\Livewire\Comercial\Lead\{Index, Criar, Empresa, Atender, Comissao};
use App\Livewire\Financeiro\Banco\{BancoIndex, BancoCriar, BancoExtrato};
use App\Livewire\Financeiro\Previsao\RecebimentosIndex;
use App\Livewire\Financeiro\{Lancamento};
use App\Livewire\Financeiro\Lancamento\{Lancamentodashboard, LancamentoStore};
use App\Livewire\Financeiro\Lancamento\{LancamentoIndex, LancamentoListar, LancamentoCriar, LancamentoCriarDespesa, LancamentoCriarReceita, LancamentoEditar, LancamentoIndexDespesa, LancamentoIndexReceita};
use App\Livewire\Financeiro\Comissoes\{FinComissoesIndex, FinComissoesListar, FinComissoesCriar, FinComissoesMostrar, FinComissoesEditar, FinComissoesDeletar, FinComissoesAbertas, FinComissoesPagas};
use App\Livewire\Financeiro\Comissoes\{MinhasComissoesA, MinhasComissoesB};
use App\Livewire\Financeiro\Gerencial\{GerencialDRE, GerencialPlanoContas};

use App\Livewire\Ferramenta\Kanban\{Kanbancriar, Kanbanlistar};
use App\Livewire\Ferramenta\Todo\{Todoarchive, Todoedit, Todoshow, Todolist};

use App\Livewire\Configuracao\{Usuario2, Sistema};
use App\Livewire\Configuracao\Sistema\Acesso\{Acesso, AcessoFuncoes, AcessoPermissoes};
use App\Livewire\Configuracao\FormaPagamentos\{FormaPagamentosIndex, FormaPagamentosListar, FormaPagamentosCriar, FormaPagamentosMostrar, FormaPagamentosEditar, FormaPagamentosDeletar};


use App\Livewire\Configuracao\Sistema\Acesso\{CCCCMostrar};
use App\Livewire\Configuracao\Sistema\Permissao\{PermissaoIndex, PermissaoListar, PermissaoCriar, PermissaoMostrar, PermissaoEditar, PermissaoDeletar, PermissaoFuncao};
use App\Livewire\Configuracao\Comissoes\{ComissoesIndex, ComissoesListar, ComissoesCriar, ComissoesMostrar, ComissoesEditar, ComissoesDeletar};
use App\Livewire\Configuracao\PlanoContas\{PlanoContasIndex, PlanoContasListar, PlanoContasCriar, PlanoContasMostrar, PlanoContasEditar, PlanoContasDeletar};
use App\Livewire\Plataforma\{PlataformaImportar, PlataformaBraip, PlataformaMonetizze};
use App\Livewire\PDV\Caixa\{CaixaIndex, CaixaListar, CaixaCriar, CaixaMostrar, CaixaEditar, CaixaDeletar, CaixaFechar, CaixaImprimir, CaixaComandas};
use App\Livewire\PDV\Comanda\{ComandaIndex, ComandaListar, ComandaCriar, ComandaMostrar, ComandaEditar, ComandaDeletar, ComandaImprimir, ComandaAgendamentos};

use App\Livewire\Relatorios\{RelatorioCadastro, RelatorioVenda, Estoque, CurvaABC};

use App\Livewire\Relatorios\Vendas\{RelatorioVendasComissoes};

use App\Livewire\Gerenciamento\{GerenciarComanda};

use App\Livewire\Consulta\{ConsultaVendas, ConsultaDRE};

use App\Livewire\Configuracao\DadosEmpresa\{DadosEmpresa};
use App\Livewire\Configuracao\Profissionais\{Profissionais};

use App\Livewire\Conferencias;

use App\Events\CanalPublico;
use App\Events\CanalPrivado;
/*
|--------------------------------------------------------------------------
| BROADCASTINGS
|--------------------------------------------------------------------------
|
*/
Route::get('/broadcast/{msg}', function ($msg) {
    broadcast(new CanalPublico($msg));
    return "Mensagem '{$msg}' enviada para o canal público!";
});

Route::get('/private/{id}/{msg}', function ($id, $msg) {
    broadcast(new CanalPrivado($id, $msg));
    return "Mensagem '{$msg}' enviada para o canal privado!";
}); // Adicione autenticação se necessário


Route::get('/loginUsingId/{id}', function ($id) {
    if (\Auth::id() == 2) {
        \Auth::loginUsingId($id);
    }
})->middleware('auth');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/form-replicator', FormReplicator::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function ()
{
    // Route::get('/dashboard', function ()
    // {
    //     return view('layouts.tailwind');
    // })->name('dashboard');
    // Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/dashboard', DashboardPadrao::class)->name('dashboard');

    Route::get('/dashboard/padrao',     DashboardPadrao::Class)->name('dsh.padrao');
    Route::get('/dashboard/financeiro', DashboardFinanceiro::Class)->name('dsh.financeiro');
    Route::get('/dashboard/geral',      DashboardGeral::Class)->name('dsh.geral');
    Route::get('/dashboard/agenda',     DashboardAgenda::Class)->name('dsh.agenda');
    Route::get('/dashboard/vendas',     DashboardVendas::Class)->name('dsh.vendas');
});



Route::get('/agendamento',                                            Agendamento::class)                   ->name('agendamento-publico');
Route::get('/configuracoes-iniciais',                                 ConfiguracoesIniciais::class)         ->name('configuracoes-iniciais');
Route::get('/buscacep',                                               IndexVazio::class)                    ->name('buscaCep');
Route::get('/categoria',                                              CategoriaIndex::class)                ->name('CategoriaIndex');
Route::get('/categoria/criar',                                        CategoriaStore::class)                ->name('CategoriaStore');

Route::get('/', function ()
{
    return redirect()->route('login');
});


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/atendimento/pessoas',                                PessoaIndex::class)                   ->name('atd.pessoas');
    Route::get('/atendimento/pessoas/listar',                         PessoaListar::class)                  ->name('atd.pessoas.listar');
    Route::get('/atendimento/pessoas/sobre/{id}',                     PessoaMostrar::class)                 ->name('atd.pessoas.mostrar');
    Route::get('/atendimento/pessoas/criar',                          PessoaCriar::class)                   ->name('atd.pessoas.criar');
    Route::get('/atendimento/pessoas/editar/{id}',                    PessoaEditar::class)                  ->name('atd.pessoas.editar');
    Route::get('/atendimento/pessoas/comissoes/{id}',                 PessoaComissoes::class)               ->name('atd.pessoas.comissoes');
    Route::get('/atendimento/pessoas/deletar/{id}',                   PessoaDeletar::class)                 ->name('atd.pessoas.deletar');
    
    Route::get('/atendimento/agendamentos',                           AgendamentoIndex::class)              ->name('atd.agendamentos.index')->middleware('permission:Ver todas agendas');
    Route::get('/atendimento/agendamentos/book',                      AgendamentoBook::class)               ->name('atd.agendamentos.book');
    Route::get('/atendimento/agendamentos/listar',                    AgendamentoListar::class)             ->name('atd.agendamentos.listar');
    Route::get('/atendimento/agendamentos/sobre/{id}',                AgendamentoMostrar::class)            ->name('atd.agendamentos.mostrar');
    Route::get('/atendimento/agendamentos/criar',                     AgendamentoCriar::class)              ->name('atd.agendamentos.criar');
    Route::get('/atendimento/agendamentos/editar/{id}',               AgendamentoEditar::class)             ->name('atd.agendamentos.editar');
    Route::get('/atendimento/agendamentos/deletar/{id}',              AgendamentoDeletar::class)            ->name('atd.agendamentos.deletar');
    Route::get('/atendimento/agendamentos/ordem',                     AgendamentoOrdem::class)              ->name('atd.agendamentos.ordem');
    // Route::get('/atendimento/ordem-da-agenda',                        AgendamentoOrdem::class)              ->name('atd.agenda.ordem');
    Route::get('/atendimento/agendamentos/fixas',                     AgendamentoFixas::class)              ->name('atd.agendamentos.fixas');
    
    Route::get('/configuracoes/acessos',                              Acesso::class)                        ->name('cfg.acessos');
    Route::get('/configuracoes/acessos/{slug}',                       CCCCMostrar::class)                   ->name('cfg.acessos.mostrar');
    Route::get('/configuracoes/acessos/funcoes',                      AcessoFuncoes::class)                 ->name('cfg.acessos.funcoes');
    Route::get('/configuracoes/acessos/permissoes',                   AcessoPermissoes::class)              ->name('cfg.acessos.permissoes');
    Route::get('/configuracoes/acessos/{pessoa}',                     Acesso::class)                        ->name('cfg.acessos.pessoas');
    
    Route::get('/configuracoes/forma-de-pagamento',                   FormaPagamentosIndex::class)          ->name('cfg.forma-de-pagamentos.index');
    Route::get('/configuracoes/forma-de-pagamento/listar',            FormaPagamentosListar::class)         ->name('cfg.forma-de-pagamentos.listar');
    Route::get('/configuracoes/forma-de-pagamento/criar',             FormaPagamentosCriar::class)          ->name('cfg.forma-de-pagamentos.criar');
    Route::get('/configuracoes/forma-de-pagamento/mostrar/{id}',      FormaPagamentosMostrar::class)        ->name('cfg.forma-de-pagamentos.mostrar');
    Route::get('/configuracoes/forma-de-pagamento/editar/{id}',       FormaPagamentosEditar::class)         ->name('cfg.forma-de-pagamentos.editar');
    Route::get('/configuracoes/forma-de-pagamento/deletarr/{id}',     FormaPagamentosDeletar::class)        ->name('cfg.forma-de-pagamentos.deletar');    
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/catalogo/servicos',                                  ServicoIndex::class)                  ->name('cat.servicos.index');
    Route::get('/catalogo/servicos/listar',                           ServicoListar::class)                 ->name('cat.servicos.listar');
    Route::get('/catalogo/servicos/sobre/{id}',                       ServicoMostrar::class)                ->name('cat.servicos.mostrar');
    Route::get('/catalogo/servicos/criar',                            ServicoCriar::class)                  ->name('cat.servicos.criar');
    Route::get('/catalogo/servicos/editar/{id}',                      ServicoEditar::class)                 ->name('cat.servicos.editar');
    Route::get('/catalogo/servicos/comissoes/{id}',                   ServicoComissoes::class)              ->name('cat.servicos.comissoes');
    Route::get('/catalogo/servicos/deletar/{id}',                     ServicoDeletar::class)                ->name('cat.servicos.deletar');
    
    Route::get('/catalogo/produtos',                                  ProdutoIndex::class)                  ->name('cat.produtos.index');
    Route::get('/catalogo/produtos/listar',                           ProdutoListar::class)                 ->name('cat.produtos.listar');
    Route::get('/catalogo/produtos/sobre/{id}',                       ProdutoMostrar::class)                ->name('cat.produtos.mostrar');
    Route::get('/catalogo/produtos/criar',                            ProdutoCriar::class)                  ->name('cat.produtos.criar');
    Route::get('/catalogo/produtos/editar/{id}',                      ProdutoEditar::class)                 ->name('cat.produtos.editar');
    Route::get('/catalogo/produtos/comissoes/{id}',                   ProdutoComissoes::class)              ->name('cat.produtos.comissoes');
    Route::get('/catalogo/produtos/deletar/{id}',                     ProdutoDeletar::class)                ->name('cat.produtos.deletar');
    
    Route::get('/catalogo/compras',                                   CompraIndex::class)                   ->name('cat.compras');
    Route::get('/catalogo/compras/listar',                            CompraListar::class)                  ->name('cat.compras.listar');
    Route::get('/catalogo/compras/sobre/{id}',                        CompraMostrar::class)                 ->name('cat.compras.mostrar');
    Route::get('/catalogo/compras/criar',                             CompraCriar::class)                   ->name('cat.compras.criar');
    Route::get('/catalogo/compras/editar/{id}',                       CompraEditar::class)                  ->name('cat.compras.editar');
    Route::get('/catalogo/compras/deletar/{id}',                      CompraDeletar::class)                 ->name('cat.compras.deletar');
    Route::get('/catalogo/compras/{id}',                              CompraAdicionarProdutos::class)       ->name('cat.compras.adicionar-produtos');
    Route::get('/catalogo/compras/{id}/pagamentos',                   CompraInformarPagamentos::class)      ->name('cat.compras.informar-pagamentos');
    
    Route::get('/catalogo/saidas',                                    SaidaIndex::class)                    ->name('cat.saidas');
    Route::get('/catalogo/saidas/listar',                             SaidaListar::class)                   ->name('cat.saidas.listar');
    Route::get('/catalogo/saidas/sobre/{id}',                         SaidaMostrar::class)                  ->name('cat.saidas.mostrar');
    Route::get('/catalogo/saidas/criar',                              SaidaCriar::class)                    ->name('cat.saidas.criar');
    Route::get('/catalogo/saidas/editar/{id}',                        SaidaEditar::class)                   ->name('cat.saidas.editar');
    Route::get('/catalogo/saidas/deletar/{id}',                       SaidaDeletar::class)                  ->name('cat.saidas.deletar');
    Route::get('/catalogo/saidas/{id}',                               SaidaRetirarProdutos::class)          ->name('cat.saidas.retirar-produtos');
    Route::get('/catalogo/saidas/ver/{id}',                           SaidaVerProdutos::class)              ->name('cat.saidas.ver-produtos');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/comercial/vendas',                                   VendaIndex::class)                    ->name('com.vendas.index');
    Route::get('/comercial/vendas/listar',                            VendaListar::class)                   ->name('com.vendas.listar');
    Route::get('/comercial/vendas/criar',                             VendaCriar::class)                    ->name('com.vendas.criar');
    Route::get('/comercial/vendas/sobre/{id}',                        VendaMostrar::class)                  ->name('com.vendas.mostrar');
    Route::get('/comercial/vendas/editar/{id}',                       VendaEditar::class)                   ->name('com.vendas.editar');
    Route::get('/comercial/vendas/deletar/{id}',                      VendaDeletar::class)                  ->name('com.vendas.deletar');
    
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/configuracao/usuarios',                              Usuario::class)                       ->name('cfg.usuarios');
    Route::get('/configuracao/usuarios/listar',                       BBBBListar::class)                    ->name('cfg.usuarios.listar');
    Route::get('/configuracao/usuarios/criar',                        BBBBCriar::class)                     ->name('cfg.usuarios.criar');
    Route::get('/configuracao/usuarios/editar/{id}',                  BBBBEditar::class)                    ->name('cfg.usuarios.editar');
    Route::get('/configuracao/usuarios/sobre/{id}',                   BBBBMostrar::class)                   ->name('cfg.usuarios.mostrar');
    
    Route::get('/configuracao/permissao',                             PermissaoIndex::class)                ->name('cfg.permissoes.index');
    Route::get('/configuracao/permissao/listar',                      PermissaoListar::class)               ->name('cfg.permissoes.listar');
    Route::get('/configuracao/permissao/criar',                       PermissaoCriar::class)                ->name('cfg.permissoes.criar');
    Route::get('/configuracao/permissao/sobre/{id}',                  PermissaoMostrar::class)              ->name('cfg.permissoes.mostrar');
    Route::get('/configuracao/permissao/editar/{id}',                 PermissaoEditar::class)               ->name('cfg.permissoes.editar');
    Route::get('/configuracao/permissao/deletar/{id}',                PermissaoDeletar::class)              ->name('cfg.permissoes.deletar');
    Route::get('/configuracao/permissoes/gerenciar_funcao/{id}',      PermissaoFuncao::class)               ->name('cfg.permissoes.funcao');
    
    Route::get('/configuracao/comissoes',                             ComissoesIndex::class)                ->name('cfg.comissoes.index');
    Route::get('/configuracao/comissoes/listar',                      ComissoesListar::class)               ->name('cfg.comissoes.listar');
    Route::get('/configuracao/comissoes/criar',                       ComissoesCriar::class)                ->name('cfg.comissoes.criar');
    Route::get('/configuracao/comissoes/sobre/{id}',                  ComissoesMostrar::class)              ->name('cfg.comissoes.mostrar');
    Route::get('/configuracao/comissoes/editar/{id}',                 ComissoesEditar::class)               ->name('cfg.comissoes.editar');
    Route::get('/configuracao/comissoes/deletar/{id}',                ComissoesDeletar::class)              ->name('cfg.comissoes.deletar');
    
    Route::get('/configuracao/plano-de-contas',                       PlanoContasIndex::class)              ->name('cfg.plano-de-contas.index');
    Route::get('/configuracao/plano-de-contas/listar',                PlanoContasListar::class)             ->name('cfg.plano-de-contas.listar');
    Route::get('/configuracao/plano-de-contas/criar',                 PlanoContasCriar::class)              ->name('cfg.plano-de-contas.criar');
    Route::get('/configuracao/plano-de-contas/sobre/{id}',            PlanoContasMostrar::class)            ->name('cfg.plano-de-contas.mostrar');
    Route::get('/configuracao/plano-de-contas/editar/{id}',           PlanoContasEditar::class)             ->name('cfg.plano-de-contas.editar');
    Route::get('/configuracao/plano-de-contas/deletar/{id}',          PlanoContasDeletar::class)            ->name('cfg.plano-de-contas.deletar');
    
    Route::get('/configuracao/dados-empresa',                         DadosEmpresa::class)                  ->name('cfg.dados-empresa.index');    
    Route::get('/configuracao/profissionais',                         Profissionais::class)                 ->name('cfg.profissionais.index');    
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/plataformas/importar',                               PlataformaImportar::class)          ->name('ptf.importar');
    Route::get('/plataformas/braip',                                  PlataformaBraip::class)             ->name('ptf.braip');
    Route::get('/plataformas/monetizze',                              PlataformaMonetizze::class)         ->name('ptf.monetizze');
});

// Route::group(['middleware' => 'auth', 'prefix' => '/catalogo'], function()
// {
//     Route::get('/categorias',           Categoria::class)           ->name('cat.categorias');
//     Route::get('/servicos',             Servico::class)             ->name('cat.servicos');
// });

    
Route::group(['middleware' => 'auth', 'prefix' => '/comercial'], function()
{
    Route::get('/leads',                                             Lead::class)                        ->name('com.leads');
    Route::get('/comissoes',                                         Comissao::class)                    ->name('com.leads.comissoes');
    Route::get('/dashoboard_leads',                                  Dashboard::class)                   ->name('com.leads.dashboard');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/financeiro/LancamentoStore',                        LancamentoStore::class)             ->name('LancamentoStore');

    Route::get('/financeiro/bancos',                                 BancoIndex::class)                  ->name('fin.bancos.index');
    Route::get('/financeiro/bancos/criar',                           BancoCriar::class)                  ->name('fin.bancos.criar');
    Route::get('/financeiro/bancos/extrato/{id}',                    BancoExtrato::class)                ->name('fin.bancos.extrato');
    Route::get('/financeiro/dashoboard',                             Lancamentodashboard::class)         ->name('fin.lancamentos.dashboard');
    
    Route::get('/financeiro/recebimentos/previsao',                  RecebimentosIndex::class)           ->name('fin.recebimentos.previsao');
    
    
    Route::get('/financeiro/lancamentos',                        LancamentoIndex::class)                ->name('fin.lancamentos.index');
    Route::get('/financeiro/lancamentos/despesas',               LancamentoIndexDespesa::class)         ->name('fin.lancamentos.index.despesa');
    Route::get('/financeiro/lancamentos/receitas',               LancamentoIndexReceita::class)         ->name('fin.lancamentos.index.receita');
    Route::get('/financeiro/lancamentos/listar',                 LancamentoListar::class)               ->name('fin.lancamentos.listar');
    Route::get('/financeiro/lancamentos/criar',                  LancamentoCriar::class)                ->name('fin.lancamentos.criar');
    Route::get('/financeiro/lancamentos/criar-despesas',         LancamentoCriarDespesa::class)         ->name('fin.lancamentos.criar.despesa');
    Route::get('/financeiro/lancamentos/criar-receitas',         LancamentoCriarReceita::class)         ->name('fin.lancamentos.criar.receita');
    Route::get('/financeiro/lancamentos/editar/{id}',            LancamentoEditar::class)               ->name('fin.lancamentos.editar');
    
    Route::get('/financeiro/dre-gerencial',                      GerencialDRE::class)                   ->name('fin.gerencial.dre');
    Route::get('/financeiro/contas-contabil',                    GerencialPlanoContas::class)           ->name('fin.gerencial.contas-contabeis');
    
    
    Route::get('/financeiro/comissoes',                    FinComissoesIndex::class)                ->name('fin.comissoes.index');
    Route::get('/financeiro/comissoes/listar',             FinComissoesListar::class)               ->name('fin.comissoes.listar');
    Route::get('/financeiro/comissoes/criar',              FinComissoesCriar::class)                ->name('fin.comissoes.criar');
    Route::get('/financeiro/comissoes/sobre/{id}',         FinComissoesMostrar::class)              ->name('fin.comissoes.mostrar');
    Route::get('/financeiro/comissoes/editar/{id}',        FinComissoesEditar::class)               ->name('fin.comissoes.editar');
    Route::get('/financeiro/comissoes/deletar/{id}',       FinComissoesDeletar::class)              ->name('fin.comissoes.deletar');
    Route::get('/financeiro/comissoes/abertas',            FinComissoesAbertas::class)              ->name('fin.comissoes.abertas');
    Route::get('/financeiro/comissoes/abertas/{id}',       FinComissoesAbertas::class)              ->name('fin.comissoes.abertas');
    Route::get('/financeiro/comissoes/pagas',              FinComissoesPagas::class)                ->name('fin.comissoes.pagas');
    Route::get('/financeiro/comissoes/pagas/{id}',         FinComissoesPagas::class)                ->name('fin.comissoes.pagas');
    
    Route::get('/financeiro/minhas_comissoes/abertas',     MinhasComissoesA::class)                 ->name('fin.comissoes.minhasA');
    Route::get('/financeiro/minhas_comissoes/pagas',       MinhasComissoesB::class)                 ->name('fin.comissoes.minhasB');
});

Route::group(['middleware' => 'auth', 'prefix' => '/ferramenta'], function()
{
    Route::get('/kanban',                                  Kanbanlistar::class)                     ->name('fer.kanban.listar');
    Route::get('/todo',                                    Todoarchive::class)                      ->name('fer.todo.listar12');
    Route::get('/todo/archive',                            Todoedit::class)                         ->name('archive');
    Route::get('/todo/todo/{id}',                          Todoshow::class)                         ->name('todo');
    Route::get('/todo',                                    Todolist::class)                         ->name('fer.todo.listar');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/pdv/caixas',                              CaixaIndex::class)                       ->name('pdv.caixas.index');
    Route::get('/pdv/caixas/listar',                       CaixaListar::class)                      ->name('pdv.caixas.listar');
    Route::get('/pdv/caixas/criar',                        CaixaCriar::class)                       ->name('pdv.caixas.criar');
    Route::get('/pdv/caixas/sobre/{id}',                   CaixaMostrar::class)                     ->name('pdv.caixas.mostrar');
    Route::get('/pdv/caixas/editar/{id}',                  CaixaEditar::class)                      ->name('pdv.caixas.editar');
    Route::get('/pdv/caixas/deletar/{id}',                 CaixaDeletar::class)                     ->name('pdv.caixas.deletar');
    Route::get('/pdv/caixas/fechar/{id}',                  CaixaFechar::class)                      ->name('pdv.caixas.fechar');
    Route::get('/pdv/caixas/imprimir/{id}',                CaixaImprimir::class)                    ->name('pdv.caixas.imprimir');
    Route::get('/pdv/caixas/{id}/comandas',                CaixaComandas::class)                    ->name('pdv.caixas.comandas');
    
    Route::get('/pdv/comandas',                            ComandaIndex::class)                     ->name('pdv.comandas.index');
    Route::get('/pdv/comandas/listar',                     ComandaListar::class)                    ->name('pdv.comandas.listar');
    Route::get('/pdv/comandas/criar',                      ComandaCriar::class)                     ->name('pdv.comandas.criar');
    Route::get('/pdv/comandas/sobre/{id}',                 ComandaMostrar::class)                   ->name('pdv.comandas.mostrar');
    Route::get('/pdv/comandas/editar/{id}',                ComandaEditar::class)                    ->name('pdv.comandas.editar');
    Route::get('/pdv/comandas/deletar/{id}',               ComandaDeletar::class)                   ->name('pdv.comandas.deletar');
    Route::get('/pdv/comandas/imprimir/{id}',              ComandaImprimir::class)                  ->name('pdv.comandas.imprimir');
    Route::get('/pdv/comandas/agendamentos/{id}',          ComandaAgendamentos::class)              ->name('pdv.comandas.agendamentos');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/relatorios/cadastros',                    RelatorioCadastro::class)                ->name('rel.cadastros.index');
    Route::get('/relatorios/vendas',                       RelatorioVenda::class)                   ->name('rel.vendas.index');
    Route::get('/relatorios/vendas/comissoes',             RelatorioVendasComissoes::class)         ->name('rel.vendas.comissoes');


    Route::get('/relatorios/estoque',                      Estoque::class)                          ->name('est.relatorios');
    Route::get('/relatorios/curva-abc',                    CurvaABC::class)                         ->name('est.relatorios.curva-abc');
});


Route::group(['prefix' => '/',], function()
{
    Route::group(['prefix' => '/configuracao'], function()
    {
        Route::get('/opcoes-sistema',                             Sistema::class)                                             ->name('cfg.sistema');
    });
    

    
    
    
    // =============================================================================================================================================================================================  FINALIZADO
    Route::group(['prefix' => '/financeiro3'], function()
    {
        Route::get('/lancamentos/mostrar/{id}',                  [LancamentosController::class, 'lancamentos_mostrar'])         ->name('fin.lancamentos.mostrar')             ->middleware('auth');
    });
        
        ############################################################################################################################################################
   
        
       
  


    
        

        Route::group(['middleware' => 'auth'], function()
        {
            Route::get('/gerenciamento/comanda/{id}',                 GerenciarComanda::class)            ->name('ger.comandas.index');
        });

        Route::group(['middleware' => 'auth'], function()
        {
            Route::get('/consulta/vendas',                            ConsultaVendas::class)->name('con.vendas.index');
            Route::get('/consulta/demonstrativo',                     ConsultaDRE::class)   ->name('con.demonstrativo.index');
        });

        
        Route::group(['prefix' => '/conferencias'], function()
        {
            Route::get('/',                                           Conferencias::class)                            ->name('conferencia.index');    
            
        });
    });
    
// Clear application cache:
Route::get('/limpar-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    // Artisan::call('route:cache');
    // Artisan::call('config:cache');
    Artisan::call('clear-compiled');
    Artisan::call('optimize:clear');
    return view('cache');
    return 'Os caches da aplicação foram limpados.';
});

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});