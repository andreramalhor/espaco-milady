<?php

namespace App\Livewire\Configuracao\Sistema\Acesso;

use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Livewire\Atendimento\Pessoa\Auxiliar\BuscaCEP;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;


class AAAAEditar extends Component
{
    use WithFileUploads;
    
    public $id;
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
    public $uf;
    public $foto;
    
    public function mount()
    {
        $pessoa = DBPessoa::findOrFail($this->id);
        $this->nome          = $pessoa->nome;
        $this->apelido       = $pessoa->apelido;
        $this->dt_nascimento = $pessoa->dt_nascimento;
        $this->email         = $pessoa->email;
        $this->sexo          = $pessoa->sexo;
        $this->cpf           = $pessoa->cpf;
        $this->observacao    = $pessoa->observacao;
        $this->telefone1     = $pessoa->telefone1;
        $this->telefone2     = $pessoa->telefone2;
        $this->cep           = $pessoa->cep;
        $this->logradouro    = $pessoa->logradouro;
        $this->numero        = $pessoa->numero;
        $this->complemento   = $pessoa->complemento;
        $this->bairro        = $pessoa->bairro;
        $this->cidade        = $pessoa->cidade;
        $this->uf            = $pessoa->uf;
        $this->foto          = $pessoa->srcFoto;
    }

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

    public function edit()
    {
      $this->validate();

      $pessoa = DBPessoa::findOrFail($this->id);
      $pessoa->update([
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
      ]);


      if($this->foto)
      {
        $filePath = public_path("stg/img/user/{$pessoa->id}.png");

        if (file_exists($filePath))
        {
          unlink($filePath);
        }

        $nomearquivo = $pessoa->id.'.png';
        
        $img = Image::make($this->foto);
        $img->resize(320, 320);
        $img->save('stg/img/user/' . $nomearquivo);
      }
      
      $this->dispatch('swal:alert', [
        'title'     => 'Editado!',
        'text'      => 'Pessoa editada com sucesso!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
      
      $this->resetExcept('pessoaId');
      
      return redirect()->to(route('atd.pessoas')); 
    }

    public function render()
    {
        return view('livewire/atendimento/pessoa/pessoa-editar')->layout('layouts/bootstrap');
    }
}
