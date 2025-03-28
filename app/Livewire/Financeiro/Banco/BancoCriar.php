<?php

namespace App\Livewire\Financeiro\Banco;

use Livewire\Component;

use App\Http\Requests\Financeiro\BancoRequest;

use App\Models\Financeiro\Banco as DBBanco;

class BancoCriar extends Component
{
    public $id;
    public $id_empresa;
    public $nome;
    public $num_banco;
    public $num_agencia;
    public $num_conta;
    public $saldo_inicial;
    public $cod_carteira;
    public $chave_pix;
    public $pix;

    public function rules()
    {
        return [
            'nome'          => 'required',
        ];
    }

    public function gravar()
    {
        $dadosValidados = $this->validate();

        DBBanco::create([
            'id_empresa'    => 1,
            'nome'          => $dadosValidados['nome'] ?? null,
            'num_banco'     => $dadosValidados['num_banco'] ?? null,
            'num_agencia'   => $dadosValidados['num_agencia'] ?? null,
            'num_conta'     => $dadosValidados['num_conta'] ?? null,
            'saldo_inicial' => $dadosValidados['saldo_inicial'] ?? 0,
            'cod_carteira'  => $dadosValidados['cod_carteira'] ?? null,
            'chave_pix'     => $dadosValidados['chave_pix'] ?? null,
            'pix'           => $dadosValidados['pix'] ?? null,
        ]);
        
        $this->dispatch('swal:alert', [
            'title'     => 'Criado!',
            'text'      => 'Banco criado com sucesso!',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);
        
        return redirect()->route('fin.bancos.index')->with('success', 'Recurso criado com sucesso!');
    }

    public function render()
    {
        return view('livewire/financeiro/banco/banco-criar')->layout('layouts/bootstrap');
    }
}
