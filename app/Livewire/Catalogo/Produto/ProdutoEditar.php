<?php

namespace App\Livewire\Catalogo\Produto;

use Livewire\Attributes\Rule;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;


class ProdutoEditar extends Component
{
  use WithFileUploads;
    
  public $id;
  // Produto / Serviço
  public $tipo;
  #[Rule('required|min:3')]
  public $nome;
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

  // Foto
  #[Rule('image|nullable')]
  public $foto;
  
  public function mount()
  {
    $produto = DBServicoProduto::findOrFail($this->id);
    $this->tipo                          = $produto->tipo;
    $this->nome                          = $produto->nome;
    $this->id_categoria                  = $produto->id_categoria;
    $this->ativo                         = $produto->ativo;
    $this->descricao                     = $produto->descricao;
    $this->marca                         = $produto->marca;
    $this->id_fornecedor                 = $produto->id_fornecedor;
    $this->unidade                       = $produto->unidade;
    $this->ncm_prod_serv                 = $produto->ncm_prod_serv;
    $this->cod_nota                      = $produto->cod_nota;
    $this->cod_barras                    = $produto->cod_barras;
    $this->estoque_min                   = $produto->estoque_min;
    $this->estoque_max                   = $produto->estoque_max;
    $this->duracao                       = $produto->duracao;
    $this->tipo_preco                    = $produto->tipo_preco;
    $this->vlr_venda                     = $produto->vlr_venda;
    $this->vlr_frete                     = $produto->vlr_frete;
    $this->vlr_impostos                  = $produto->vlr_impostos;
    $this->vlr_cst_adicional             = $produto->vlr_cst_adicional;
    $this->vlr_nota                      = $produto->vlr_nota;
    $this->vlr_custo                     = $produto->vlr_custo;
    $this->tipo_comissao                 = $produto->tipo_comissao;
    $this->prc_comissao                  = $produto->prc_comissao;
    $this->vlr_comissao                  = $produto->vlr_comissao;
    $this->ipi_prod_serv                 = $produto->ipi_prod_serv;
    $this->icms_prod_serv                = $produto->icms_prod_serv;
    $this->simples_prod_serv             = $produto->simples_prod_serv;
    $this->fidelidade_pontos_ganhos      = $produto->fidelidade_pontos_ganhos;
    $this->fidelidade_pontos_necessarios = $produto->fidelidade_pontos_necessarios;
    $this->tempo_retorno                 = $produto->tempo_retorno;
    $this->consumo_medio                 = $produto->consumo_medio;
    $this->curva_abc                     = $produto->curva_abc;
    $this->cmv_prod_serv                 = $produto->cmv_prod_serv;
    $this->vlr_marg_contribuicao         = $produto->vlr_marg_contribuicao;
    $this->marg_contribuicao             = $produto->marg_contribuicao;
    $this->margem_custo                  = $produto->margem_custo;
    $this->vlr_custo_estoque             = $produto->vlr_custo_estoque;
    $this->status                        = $produto->status;
    $this->foto                          = $produto->src_foto;
    $this->tem_foto                      = $produto->temFoto($produto->id);
  }
  
  public function edit()
  {
    $this->validate();
    
    $produto = DBServicoProduto::findOrFail($this->id);
    $produto->update([
      'tipo'                          => $this->tipo,
      'nome'                          => $this->nome,
      'id_categoria'                  => $this->id_categoria,
      'ativo'                         => $this->ativo,
      'descricao'                     => $this->descricao,
      'marca'                         => $this->marca,
      'id_fornecedor'                 => $this->id_fornecedor,
      'unidade'                       => $this->unidade,
      'ncm_prod_serv'                 => $this->ncm_prod_serv,
      'cod_nota'                      => $this->cod_nota,
      'cod_barras'                    => $this->cod_barras,
      'estoque_min'                   => $this->estoque_min,
      'estoque_max'                   => $this->estoque_max,
      'duracao'                       => $this->duracao,
      'tipo_preco'                    => $this->tipo_preco,
      'vlr_venda'                     => $this->vlr_venda,
      'vlr_frete'                     => $this->vlr_frete,
      'vlr_impostos'                  => $this->vlr_impostos,
      'vlr_cst_adicional'             => $this->vlr_cst_adicional,
      'vlr_nota'                      => $this->vlr_nota,
      'vlr_custo'                     => $this->vlr_frete + $this->vlr_impostos + $this->vlr_cst_adicional + $this->vlr_nota,
      'tipo_comissao'                 => $this->tipo_comissao,
      'prc_comissao'                  => $this->prc_comissao,
      'vlr_comissao'                  => $this->vlr_comissao,
      'ipi_prod_serv'                 => $this->ipi_prod_serv,
      'icms_prod_serv'                => $this->icms_prod_serv,
      'simples_prod_serv'             => $this->simples_prod_serv,
      'fidelidade_pontos_ganhos'      => $this->fidelidade_pontos_ganhos,
      'fidelidade_pontos_necessarios' => $this->fidelidade_pontos_necessarios,
      'tempo_retorno'                 => $this->tempo_retorno,
      'consumo_medio'                 => $this->consumo_medio,
      'curva_abc'                     => $this->curva_abc,
      'cmv_prod_serv'                 => $this->cmv_prod_serv,
      'vlr_marg_contribuicao'         => $this->vlr_marg_contribuicao,
      'marg_contribuicao'             => $this->marg_contribuicao,
      'margem_custo'                  => $this->margem_custo,
      'vlr_custo_estoque'             => $this->vlr_custo_estoque,
      'status'                        => $this->status,
    ]);
    
    
    if($this->foto)
    {
      $filePath = public_path("stg/img/prod/{$produto->id}.png");
      
      if (file_exists($filePath))
      {
        unlink($filePath);
      }
      
      $nomearquivo = $produto->id.'.png';
      
      $img = Image::make($this->foto);
      $img->resize(320, 320);
      $img->save('stg/img/prod/' . $nomearquivo);
    }
    
    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Produto editado com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    $this->resetExcept('produtoId');
    
    return redirect()->to(route('cat.produtos')); 
  }
  
  public function temFoto()
  {
    return DBServicoProduto::temFoto($this->id);
  }
  
  public function render()
  {
    return view('livewire/catalogo/produto/produto-editar')->layout('layouts/bootstrap');
  }
}
