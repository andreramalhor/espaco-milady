<?php

namespace App\Livewire\Atendimento\Pessoa3;

use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Livewire\Atendimento\Pessoa\Auxiliar\BuscaCEP;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;


class AAAACriar extends Component
{
    use WithFileUploads;
    
    #[Rule('required|min:3')]
    public $nome;
    public $apelido;
    public $dt_nascimento;
    public $email;
    public $sexo;
    public $cpf;
    public $observacao;
    public $telefone1;
    public $telefone2;
    public $cep;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $uf = 'MG';

    #[Rule('image|nullable')]
    public $foto;

    public $pessoa = [];
    public $modalType;
    public $pessoaId;

    public function buscaCEP()
    {
      $correios = BuscaCEP::get_endereco($this->cep);

      $this->bairro      = $correios->bairro->__toString();
      $this->cep         = $correios->cep->__toString();
      $this->logradouro  = $correios->logradouro->__toString();
      $this->numero      = $correios->numero->__toString();
      $this->complemento = $correios->complemento->__toString();
      $this->cidade      = $correios->localidade->__toString();
      $this->uf          = $correios->uf->__toString();
      
      $this->dispatch('set_endereco', $this);
    }

    public function store()
    {
      $this->validate();

      $pessoa = DBPessoa::create([
        'nome'          => $this->nome,
        'apelido'       => $this->apelido,
        'dt_nascimento' => $this->dt_nascimento,
        'email'         => $this->email,
        'sexo'          => $this->sexo,
        'cpf'           => $this->cpf,
        'observacao'    => $this->observacao,
        'telefone1'     => $this->telefone1,
        'telefone2'     => $this->telefone2,
        'cep'           => $this->cep,
        'logradouro'    => $this->logradouro,
        'numero'        => $this->numero,
        'complemento'   => $this->complemento,
        'bairro'        => $this->bairro,
        'cidade'        => $this->cidade,
        'uf'            => $this->uf,
        'id_criador'    => auth()->user()->id,
      ]);

      if($this->foto)
      {
        $nomearquivo = $pessoa->id.'.png';
        
        $img = Image::make($this->foto);
        $img->resize(320, 320);
        $img->save('stg/img/user/' . $nomearquivo);
      }
      
      $this->dispatch('swal:alert', [
        'title'     => 'Criado!',
        'text'      => 'Pessoa cadastrada com sucesso!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
      
      $this->resetExcept('pessoaId');

      return redirect()->to(route('atd.pessoas')); 
    }

    public function render()
    {
        return view('livewire/atendimento/pessoa/pessoa-criar')->layout('layouts/bootstrap');
    }
}
