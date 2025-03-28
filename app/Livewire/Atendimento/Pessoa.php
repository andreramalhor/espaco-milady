<?php

namespace App\Livewire\Atendimento;

use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;
use Livewire\WithPagination;

class Pessoa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $p_tipo;
    public $p_inicio;
    public $p_final;
    public $p_informacao;
    public $p_banco;
    public $p_conta;
    public $p_valor;
    public $p_pesquisar ;

    #[Rule('required|min:3')]
    public $nome;
    public $apelido;
    public $dt_nascimento;
    public $email;
    public $sexo;
    public $cpf;
    public $instagram;
    public $observacao;
    public $ddd;
    public $telefone;
    public $cep;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cidade;
    public $uf = 'MG';

    #[Rule('image|nullable')]
    public $foto;

    public $pessoa = [];
    public $modalType;
    public $pessoaId;

    protected $listeners = ['chamarMetodo' => 'remove'];

    public function mount()
    {
        dd(111);
        $this->p_inicio = \Carbon\Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->p_final  = \Carbon\Carbon::now()->endOfMonth()->format('Y-m-d');
    }


    public function listar()
    {
        $pessoas = DBPessoa::
                            procurar($this->p_pesquisar)->
                            where('id_empresa', '=', 1)->
                            whereBetween('dt_competencia', [$this->p_inicio, $this->p_final])->
                            when($this->p_informacao, function ($query1)
                            {
                                $query1->whereHas('qexgzmnndqxmyks', function ($subQuery1)
                                {
                                    $subQuery1->where('nome', 'LIKE', '%' . $this->p_informacao . '%');
                                })->
                                orWhere('informacao', 'LIKE', '%' . $this->p_informacao . '%');
                            })->
                            when($this->p_conta, function ($query2)
                            {
                                $query2->whereHas('qlwiqwuheqlefkd', function ($subQuery2)
                                {
                                    $subQuery2->where('titulo', 'LIKE', '%' . $this->p_conta . '%')->
                                                orwhere('id', 'LIKE', '%' . $this->p_conta . '%');
                                });
                            })->
                            when($this->p_valor, function ($q)
                            {
                                $q->where('vlr_final', '=', $this->p_valor);
                            })->
                            when($this->p_banco, function ($query3)
                            {
                                $query3->where('id_banco', '=', $this->p_banco);
                            })->
                            when($this->p_tipo, function ($query4)
                            {
                                $query4->where('tipo', '=', $this->p_tipo);
                            })->
                            orderBy('dt_competencia', 'asc')->
                            get();

        return $pessoas;
    }

    public function render()
    {
        $pessoas = $this->listar();

        return view('livewire/atendimento/pessoa/index', [
            'pessoas' => $pessoas,
        ])->layout('layouts/bootstrap');
    }
}
