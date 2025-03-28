<?php

namespace App\Livewire\Atendimento\Pessoa\Auxiliar;

use Livewire\Component;
use App\Models\Atendimento\Pessoa as DBPessoa;

class PessoaContaSaldo extends Component
{    
    public $amount = 100;

    public $p_fonte_origem;

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
      $p_fonte_origem = $this->p_fonte_origem;

      $conta_saldo = $this->pessoinha->
                                    opmnhtrvansmesd()->
                                    when($p_fonte_origem, function ($query) use ($p_fonte_origem)
                                    {
                                        $query->where('fonte_origem', 'LIKE', '%'.$p_fonte_origem.'%');
                                    })->
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
                                    orderBy('created_at', 'asc')->
                                    take($this->amount)->
                                    get();
                                    // paginate();

      return $conta_saldo;
    }
    
    public function load()
    {
        $this->amount += 100;
    }

    public function render()
    {
        $conta_saldo = $this->listar();
        
        return view('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-conta_saldo', [
            'conta_saldo' => $conta_saldo,
        ]);    
    }
}
