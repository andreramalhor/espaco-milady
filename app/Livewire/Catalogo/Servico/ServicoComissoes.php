<?php

namespace App\Livewire\Catalogo\Servico;

use Livewire\Attributes\Rule;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\ColaboradorServico as DBColaboradorServico;
use Livewire\Component;

class ServicoComissoes extends Component
{
  public $servprod;
  public $id;
  // Servico / Serviço
  public $tipo;
  #[Rule('required|min:3')]
  public $nome;
  public $apelido;
  public $id_categoria;
  public $ativo = 1;
  public $descricao;

  public $marca;
  public $id_fornecedor;
  public $unidade;
  public $ncm_prod_serv;
  public $cod_nota;
  public $cod_barras;
  public $estoque_min;
  public $estoque_max;

  public $duracao;

  // Valores
  public $tipo_preco;
  public $vlr_venda;

  public $vlr_frete;
  public $vlr_impostos;
  public $vlr_cst_adicional;
  public $vlr_nota;
  public $vlr_custo;

  public $tipo_comissao;
  public $prc_comissao;
  public $vlr_comissao;

  // Impostos
  public $ipi_prod_serv;
  public $icms_prod_serv;
  public $simples_prod_serv;

  // Programa de fidelidade
  public $fidelidade_pontos_ganhos;
  public $fidelidade_pontos_necessarios;

  // Indicadores
  public $tempo_retorno;
  public $consumo_medio;
  public $curva_abc;
  public $cmv_prod_serv;
  public $vlr_marg_contribuicao;
  public $marg_contribuicao;
  public $margem_custo;
  public $vlr_custo_estoque;
  public $status;
  public $src_foto;

  public function mount()
  { 
    $this->servprod = DBServicoProduto::findOrFail($this->id);
    $this->tipo                          = $this->servprod->tipo;
    $this->nome                          = $this->servprod->nome;
    $this->id_categoria                  = $this->servprod->id_categoria;
    $this->ativo                         = $this->servprod->ativo;
    $this->descricao                     = $this->servprod->descricao;
    $this->marca                         = $this->servprod->marca;
    $this->id_fornecedor                 = $this->servprod->id_fornecedor;
    $this->unidade                       = $this->servprod->unidade;
    $this->ncm_prod_serv                 = $this->servprod->ncm_prod_serv;
    $this->cod_nota                      = $this->servprod->cod_nota;
    $this->cod_barras                    = $this->servprod->cod_barras;
    $this->estoque_min                   = $this->servprod->estoque_min;
    $this->estoque_max                   = $this->servprod->estoque_max;
    $this->duracao                       = $this->servprod->duracao;
    $this->tipo_preco                    = $this->servprod->tipo_preco;
    $this->vlr_venda                     = $this->servprod->vlr_venda;
    $this->vlr_frete                     = $this->servprod->vlr_frete;
    $this->vlr_impostos                  = $this->servprod->vlr_impostos;
    $this->vlr_cst_adicional             = $this->servprod->vlr_cst_adicional;
    $this->vlr_nota                      = $this->servprod->vlr_nota;
    $this->vlr_custo                     = $this->servprod->vlr_custo;
    $this->tipo_comissao                 = $this->servprod->tipo_comissao;
    $this->prc_comissao                  = $this->servprod->prc_comissao;
    $this->vlr_comissao                  = $this->servprod->vlr_comissao;
    $this->ipi_prod_serv                 = $this->servprod->ipi_prod_serv;
    $this->icms_prod_serv                = $this->servprod->icms_prod_serv;
    $this->simples_prod_serv             = $this->servprod->simples_prod_serv;
    $this->fidelidade_pontos_ganhos      = $this->servprod->fidelidade_pontos_ganhos;
    $this->fidelidade_pontos_necessarios = $this->servprod->fidelidade_pontos_necessarios;
    $this->tempo_retorno                 = $this->servprod->tempo_retorno;
    $this->consumo_medio                 = $this->servprod->consumo_medio;
    $this->curva_abc                     = $this->servprod->curva_abc;
    $this->cmv_prod_serv                 = $this->servprod->cmv_prod_serv;
    $this->vlr_marg_contribuicao         = $this->servprod->vlr_marg_contribuicao;
    $this->marg_contribuicao             = $this->servprod->marg_contribuicao;
    $this->margem_custo                  = $this->servprod->margem_custo;
    $this->vlr_custo_estoque             = $this->servprod->vlr_custo_estoque;
    $this->status                        = $this->servprod->status;
    $this->src_foto                      = $this->servprod->src_foto;
  }
  
  public function definir_comissao($id_profexec, $id_servprod, $prc_comissao)
  {
    // $colaboserv = DBColaboradorServico::where('id_profexec', '=', $id_profexec)->where('id_servprod', '=', $id_servprod)->first();
    $colaboserv = DBColaboradorServico::firstOrNew([
      'id_profexec' => $id_profexec, 
      'id_servprod' => $id_servprod
    ]);
    $colaboserv->prc_comissao = $prc_comissao / 100;
    $colaboserv->save();

    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Comissão editada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
  }
  public function comissao_excluir($id_profexec, $id_servprod)
  {
    $colaboserv = DBColaboradorServico::where([
      'id_profexec' => $id_profexec, 
      'id_servprod' => $id_servprod
    ])->delete();
  }

  public function comissao_ativar($id_profexec, $id_servprod)
  {
    $colaboserv = DBColaboradorServico::create([
      'id_profexec' => $id_profexec, 
      'id_servprod' => $id_servprod,
      'prc_comissao' => 0
    ]);
  }

  
  public function render()
  {
    return view('livewire/catalogo/servico/servico-comissoes')->layout('layouts/bootstrap');
  }
}
