<?php

namespace App\Livewire\Catalogo\Produto;

use Livewire\Attributes\Rule;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;


class ProdutoCriar extends Component
{
    use WithFileUploads;
    
    // Produto / Serviço
    public $tipo = 'Produto';
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
    public $estoque_min = 1;
    public $estoque_max = 10;

    public $duracao = '00:00:00';

    // Valores
    public $tipo_preco = 'Preço fixo';
    public $valor_venda = '0,00';
    public $vlr_venda = 0;

    public $valor_frete     = '0,00';
    public $vlr_frete     = 0;
    public $valor_impostos  = '0,00';
    public $vlr_impostos  = 0;
    public $valor_cst_adicional = '0,00';
    public $vlr_cst_adicional = 0;
    public $valor_nota      = '0,00';
    public $vlr_nota      = 0;
    public $valor_custo     = '0,00';
    public $vlr_custo     = 0;
    public $tipo_comissao = 'Valor fixo';
    public $prc_comissao = 0;
    public $valor_comissao = '0,00';
    public $vlr_comissao = 0;

    // Impostos
    public $ipi_prod_serv     = 0;
    public $icms_prod_serv    = 0;
    public $simples_prod_serv = 0;

    // Programa de fidelidade
    public $fidelidade_pontos_ganhos      = 0;
    public $fidelidade_pontos_necessarios = 0;

    // Indicadores
    public $tempo_retorno = 9;
    public $consumo_medio = 32;
    public $curva_abc = 34;
    public $cmv_prod_serv = 33;
    public $valor_marg_contribuicao = '0,00';
    public $vlr_marg_contribuicao = 0;
    public $marg_contribuicao = 28;
    public $margem_custo = 31;
    public $valor_custo_estoque = '0,00';
    public $vlr_custo_estoque = 0;
    public $status = 37;

    // Foto
    #[Rule('image|nullable')]
    public $foto;

    public $produto = [];
    public $produtoId;

    public function store()
    {
      $this->validate();

      $produto = DBServicoProduto::create([
        'tipo'                          => $this->tipo,                  
        'nome'                          => $this->nome,                  
        'id_categoria'                  => $this->id_categoria ?? 1,                          
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
        // 'vlr_cst_adicional'             => $this->vlr_cst_adicional,                               
        'vlr_nota'                      => $this->vlr_nota,                      
        'vlr_custo'                     => $this->vlr_custo,                       
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
        $nomearquivo = $produto->id.'.png';
        
        $img = Image::make($this->foto);
        $img->resize(320, 320);
        $img->save('stg/img/prod/' . $nomearquivo);
      }
      
      $this->dispatch('swal:alert', [
        'title'     => 'Criado!',
        'text'      => 'Produto cadastrado com sucesso!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
      
      $this->resetExcept('produtoId');

      return redirect()->to(route('cat.produtos.index')); 
    }

    public function atualizarValores()
    {
      $this->vlr_venda             =  str_replace(',', '.', str_replace('.', '', $this->valor_venda));

      $this->vlr_nota              =  str_replace(',', '.', str_replace('.', '', $this->valor_nota));
      $this->vlr_frete             =  str_replace(',', '.', str_replace('.', '', $this->valor_frete));
      $this->vlr_impostos          =  str_replace(',', '.', str_replace('.', '', $this->valor_impostos));
      $this->vlr_cst_adicional     =  str_replace(',', '.', str_replace('.', '', $this->valor_cst_adicional));
      $this->vlr_comissao          =  str_replace(',', '.', str_replace('.', '', $this->valor_comissao));
      $this->vlr_marg_contribuicao =  str_replace(',', '.', str_replace('.', '', $this->valor_marg_contribuicao));
      $this->vlr_custo_estoque     =  str_replace(',', '.', str_replace('.', '', $this->valor_custo_estoque));
      
      $this->vlr_custo = $this->vlr_nota + $this->vlr_frete + $this->vlr_impostos + $this->vlr_cst_adicional;
      $this->valor_custo =  number_format($this->vlr_custo, 2, ',', '.');
    }
    
    public function render()
    {
      return view('livewire/catalogo/produto/produto-criar')->layout('layouts/bootstrap');
    }
}
