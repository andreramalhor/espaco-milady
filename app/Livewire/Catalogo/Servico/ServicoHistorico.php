<?php

namespace App\Livewire\Catalogo\Servico;

use Livewire\Component;
use App\Models\Atendimento\Pessoa as DBPessoa;

class ServicoHistorico extends Component
{    
    public $amount = 10;

    public $p_comanda;
    public $p_prd_srv;

    public $pessoinha;
    public $username;
    public $email;
    public $id;

    public function mount($pessoa)
    {
        $this->pessoinha = $pessoa;
    }

    public function listar()
    {
      $p_comanda = $this->p_comanda;
      $p_prd_srv = $this->p_prd_srv;

      $prod_e_serv = $this->pessoinha->
                                    eidwuedoeduzdsd()->
                                    when($p_comanda, function ($query) use ($p_comanda)
                                    {
                                        $query->where('id_venda', 'LIKE', '%'.$p_comanda.'%');
                                    })->
                                    when($p_prd_srv, function ($query) use ($p_prd_srv)
                                    {
                                        $query->where('id_servprod', '=', $p_prd_srv);
                                    })->
                                    // when($p_prd_srv, function ($query) use ($p_prd_srv)
                                    // {
                                    //     $query->whereHas('lufqzahwwexkxli', function (Builder $query) use ($p_prd_srv)
                                    //     {
                                    //     $query->where('nome', 'LIKE', '%'.$p_prd_srv.'%' )->orWhere('apelido', 'LIKE', '%'.$p_prd_srv.'%' );
                                    //     });
                                    // })->
                                    // when($p_vlr_min || $p_vlr_max, function ($query) use ($p_vlr_min, $p_vlr_max)
                                    // {
                                    //     if ($p_vlr_min)
                                    //     {
                                    //     $query->where('vlr_final', '>=', $p_vlr_min);
                                    //     }
                                        
                                    //     if ($p_vlr_max)
                                    //     {
                                    //     $query->where('vlr_final', '<=', $p_vlr_max);
                                    //     }
                                    // })->
                                    // when($p_status, function ($query) use ($p_status)
                                    // {
                                    //     $query->where('status', 'LIKE', '%'.$p_status.'%' );
                                    // })->
                                    orderBy('created_at', 'desc')->
                                    take($this->amount)->
                                    get();
                                    // paginate();

      return $prod_e_serv;
    }
    
    public function load()
    {
        $this->amount += 10;
    }

    public function render()
    {
        $prod_e_serv = $this->listar();
        
        return view('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-historico', [
            'prod_e_serv' => $prod_e_serv,
        ]);    
    }
}
