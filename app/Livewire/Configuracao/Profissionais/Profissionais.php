<?php

namespace App\Livewire\Configuracao\Profissionais;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Agendamento\Ordem as DBOrdem;
use App\Models\ACL\Funcao as DBFuncao;

class Profissionais extends Component
{
    public $id_pessoa;
    public $username;
    
    protected $listeners = ['chamarMetodo' => 'remove'];

    public function adicionar_pessoa( $id_funcao )
    {
        $profissional = DBPessoa::find($this->id_pessoa);
        $funcao       = DBFuncao::find($id_funcao);
        
        if(!$profissional->kjahdkwkbewtoip->contains('nome', $funcao->nome))
        {
            $profissional->kjahdkwkbewtoip()->attach($funcao);

            $profissional->update([
                'username' => $this->username, 
                'password' => Hash::make(123456), 
            ]);
        }
        else
        {
            dd('Usuário já está cadastrado na função informada!');
        }

        // Se é parceiro, inclui na agenda
        if($funcao->nome)
        {
            foreach(DBPessoa::colaboradores()->get() as $colaborador)
            {
                DBOrdem::create([
                    'auth_user' => $colaborador->id,
                    'area'      => null,
                    'ordem'     => 0,
                    'id_pessoa' => $profissional->id,
                ]);
            }
        }

        $this->reset();
    }

    public function remover_pessoa( $id_pessoa, $id_funcao )
    {
        $profissional = DBPessoa::find($id_pessoa);
        $funcao       = DBFuncao::find($id_funcao);
        
        $profissional->kjahdkwkbewtoip()->detach($funcao);

        if($profissional->kjahdkwkbewtoip->contains('nome', 'Colaborador'))
        {
            $profissional->update([
                'username' => null,
                'password' => null,
            ]);
        }

        $this->reset();
    }
    
    public function render()
    {
        $pessoas = DBPessoa::orderBy('nome', 'asc')->get();

        return view('livewire/configuracao/profissionais/profissionais-index', [
            'pessoas' => $pessoas,
        ])->layout('layouts/bootstrap');
    }
}
