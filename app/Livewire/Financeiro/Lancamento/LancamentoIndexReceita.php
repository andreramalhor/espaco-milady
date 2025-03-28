<?php

namespace App\Livewire\Financeiro\Lancamento;

use App\Models\Financeiro\Lancamento as DBLancamento;
use Livewire\Component;
use Livewire\WithPagination;

class LancamentoIndexReceita extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    
    public $periodo;

    public $por_pagina = 100;
    public $filtro = false;

    
    public $lancamentos;
    public $selecionados = [];
    
    
    public $c_fillable;
    public $c_value;
    
    public $modal_despesa = false;
    public $modal_receita = false;
    
    public $asiljdlaksdj;
    
    public $p_status;
    public $p_id_caixa;
    public $p_conta;
    public $p_infor_nome;
    public $p_valor;
    
    public $f_tipo;
    public $f_id_banco;
    public $f_id_conta;
    public $f_num_documento;
    public $f_id_cliente;
    public $f_informacao;
    public $f_vlr_bruto;
    public $f_vlr_dsc_acr;
    public $f_vlr_final;
    public $f_parcela;
    public $f_id_forma_pagamento;
    public $f_descricao;
    public $f_dt_vencimento;
    public $f_dt_quitacao;
    public $f_dt_confirmacao;
    public $f_dt_competencia;
    public $f_id_usuario_lancamento;
    public $f_id_usuario_confirmacao;
    public $f_id_caixa;
    public $f_id_lancamento_origem;
    public $f_origem;
    public $f_status;
    public $f_centro_custo;
    public $f_created_at;
    
    public $inicio;
    public $final;
    
    public $modal = false;
    
    public $lancamento = [];
    public $lancamentoId;
    
    protected $listeners = [
        'chamarMetodo' => 'remove',
        'chamar-modal' => 'chamar_modal',
        'listar-this->lancamentos' => 'listar',
    ];
    // protected $listeners = ['lancamentoUpdated' => 'refreshList'];
    
    // public function refreshList()
    // {
    //   $this->resetPage();
    // }

    public function mount()
    {
      $this->listar();
    }
    
    public function definir_periodo($variable=null)
    {
        switch ($variable)
        {
            case 'Hoje':
                $this->inicio  = \Carbon\Carbon::now()->startOfDay();
                $this->final   = \Carbon\Carbon::now()->endOfDay();
                $this->periodo =  $this->inicio->format('d/m/Y');
                break;
                
            case 'Esta semana':
                $this->inicio  = \Carbon\Carbon::now()->startOfWeek();
                $this->final   = \Carbon\Carbon::now()->endOfWeek();
                $this->periodo = $this->inicio->format('d/m').' - '.$this->final->format('d/m');
                break;
                
            case 'Mês passado':
                $this->inicio  = \Carbon\Carbon::now()->subMonth()->startOfMonth();
                $this->final   = \Carbon\Carbon::now()->subMonth()->endOfMonth();
                $this->periodo =  $this->inicio->format('F Y');
                break;
                
            case 'Este mês':
                $this->inicio  = \Carbon\Carbon::now()->startOfMonth();
                $this->final   = \Carbon\Carbon::now()->endOfMonth();
                $this->periodo =  $this->inicio->format('F Y');
                break;
                
            case 'Todo período':
                $this->inicio  = \Carbon\Carbon::now()->subYear(100);
                $this->final   = \Carbon\Carbon::now()->addYear(100);
                $this->periodo =  'Todo periodo';
                break;

            case 'Escolha o período':
                $this->inicio  = \Carbon\Carbon::now()->startOfMonth();
                $this->final   = \Carbon\Carbon::now()->endOfMonth();
                $this->periodo =  'Outro';
                break;
        }

        return $this->listar();
    }
        
    public function mostrar_filtro()
    {
        $this->filtro = !$this->filtro;
    }
    
    public function chamar_modal( $modal )
    {
        switch ($modal)
        {
            case 'transferencia':
                $dados = [
                    'modal' => true
                ];
                
                $this->dispatch('abrir-modal-transferencia', $dados);
                break;
                
            case 'receita-vale':
                $dados = [
                    'modal' => true
                ];
                
                $this->dispatch('abrir-modal-receita-vale', $dados);
                break;
                
            default:
            # code...
            break;
        }
    }
    
    public function delete($id)
    {
        $lancamento = DBLancamento::find($id);
        
        // $this->authorize('qweiqjwelwkqjdslad j', $lancamento);
        
        $this->dispatch('swal:confirm', [
            'title'        => $lancamento->nome,
            'text'         => 'Tem certeza que quer deletar a lancamento?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $lancamento->id,
        ]);
    }
    
    public function remove($id)
    {
        $lancamento = DBLancamento::withTrashed()->find($id);
        
        $filePath = public_path("stg/img/user/{$lancamento->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Lancamento e foto deletada com sucesso!';
        }
        
        $lancamento->delete();
        
        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Lancamento deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);
        
        session()->flash('success', 'Lancamento Deletada!');
        
        // Atualiza a lista de this->lancamentos no componente LancamentoIndex
        $this->dispatch('lancamentoDeleted');
    }
    
    public function listar()
    {
        $this->inicio = $this->inicio ?? \Carbon\Carbon::now()->startOfMonth();
        $this->final  = $this->final ?? \Carbon\Carbon::now()->endOfMonth();

        // $this->authorize('qweiqjwelwkqjdslad j');
        $this->lancamentos = DBLancamento::
                                    where('tipo', '=', 'R')->
                                    // doMeuCaixaAberto()->
                                    whereBetween('created_at', [$this->inicio, $this->final])->
                                    // where('id_usuario_lancamento', '=', auth()->user()->id)->
                                    // when($this->p_status, function ($q)
                                    // {
                                    //     $q->where('status', 'LIKE', '%' . $this->p_status . '%');
                                    // })->
                                    when($this->p_id_caixa, function ($q)
                                    {
                                        $q->where('id_caixa', 'LIKE', '%' . $this->p_id_caixa . '%');
                                    })->
                                    when($this->p_conta, function ($q)
                                    {
                                        $q->whereHas('qlwiqwuheqlefkd', function ($subq)
                                        {
                                            $subq->where('titulo', 'LIKE', '%' . $this->p_conta . '%');
                                        });
                                    })->
                                    // when($this->p_infor_nome, function ($q)
                                    // {
                                    //     $q->where('informacao', 'LIKE', '%' . $this->p_infor_nome . '%');
                                    // })->
                                    when($this->p_infor_nome, function ($q)
                                    {
                                        $q->whereHas('qexgzmnndqxmyks', function ($subq)
                                        {
                                            $subq->where('nome', 'LIKE', '%' . $this->p_infor_nome . '%')->
                                            orWhere('apelido', 'LIKE', '%' . $this->p_infor_nome . '%');
                                        })->orWhere('informacao', 'LIKE', '%' . $this->p_infor_nome . '%');
                                    })->
                                    when($this->p_valor, function ($q)
                                    {
                                        $q->where('vlr_bruto', '=', $this->p_valor)->
                                        orWhere('vlr_final', '=', $this->p_valor);
                                    })->
                                    
                                    
                                    when($this->f_tipo && $this->f_tipo != "Todos", function ($q)
                                    {
                                        if( $this->f_tipo == "NULO")
                                        {
                                            $q->whereNull('tipo');
                                        }
                                        else
                                        {
                                            $q->where('tipo', '=', $this->f_tipo);
                                        }
                                    })->
                                    when($this->f_id_banco && $this->f_id_banco != "Todos", function ($q)
                                    {
                                        if( $this->f_id_banco == "NULO")
                                        {
                                            $q->whereNull('id_banco');
                                        }
                                        else
                                        {
                                            $q->where('id_banco', '=', $this->f_id_banco);
                                        }
                                    })->
                                    when($this->f_id_conta && $this->f_id_conta != "Todos", function ($q)
                                    {
                                        if( $this->f_id_conta == "NULO")
                                        {
                                            $q->whereNull('id_conta');
                                        }
                                        else
                                        {
                                            $q->where('id_conta', '=', $this->f_id_conta);
                                        }
                                    })->
                                    when($this->f_id_cliente && $this->f_id_cliente != "Todos", function ($q)
                                    {
                                        if( $this->f_id_cliente == "NULO")
                                        {
                                            $q->whereNull('id_cliente');
                                        }
                                        else
                                        {
                                            $q->where('id_cliente', '=', $this->f_id_cliente);
                                        }
                                    })->
                                    when($this->f_status && $this->f_status != "Todos", function ($q)
                                    {
                                        if( $this->f_status == "NULO")
                                        {
                                            $q->whereNull('status');
                                        }
                                        else
                                        {
                                            $q->where('status', '=', $this->f_status);
                                        }
                                    })->
                                    when($this->f_centro_custo && $this->f_centro_custo != "Todos", function ($q)
                                    {
                                        if( $this->f_centro_custo == "NULO")
                                        {
                                            $q->whereNull('centro_custo');
                                        }
                                        else
                                        {
                                            $q->where('centro_custo', '=', $this->f_centro_custo);
                                        }
                                    })->
                                    
                                    // orderBy('dt_competencia', 'asc')->
                                    orderBy('id', 'desc')->
                                    get();
    }
    
    public function mes_subtratir()
    {
        $this->inicio->subMonth(1);
        $this->final->subMonth(1);
    }
    
    public function mes_adicionar()
    {
        $this->inicio->addMonth(1);
        $this->final->addMonth(1);
    }
    
    public function selecionados_todos()
    {
        if(count($this->selecionados) == count($this->lancamentos->pluck('id')))
        {
            $this->selecionados = [];
        }
        else
        {
            $this->selecionados = $this->lancamentos->pluck('id');
        }
    }
    
    public function atualizar_lote()
    {
        $atualzados = DBLancamento::
                                    whereIn('id', $this->selecionados)->
                                    update([
                                        $this->c_fillable => $this->c_value,
                                    ]);
                                    
        // dd($this->selecionados, $atualzados);
    }
    
    public function render()
    {
        return view('livewire/financeiro/lancamento/lancamento-index-receita')->layout('layouts/bootstrap');
    }
}
