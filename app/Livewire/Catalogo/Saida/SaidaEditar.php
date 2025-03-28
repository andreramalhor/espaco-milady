<?php

namespace App\Livewire\Catalogo\Saida;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Catalogo\Saida as DBSaida;
use App\Models\ACL\Funcao as DBFuncao;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;


class SaidaEditar extends Component
{
  use WithFileUploads;
  
  public $id;
  #[Rule('required|min:3')]
  public $nome;
  public $apelido;
  public $dt_nascimento;
  public $email;
  public $password;
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
  public $tipo = [];
  
  public $tab_active = 'tab-dados_gerais';

  #[Rule('image|nullable')]
  public $foto;
  
  protected $listeners = ['saidaUpdated' => 'refreshList'];

  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }

  public function mount($id)
  {
    $saida = DBSaida::findOrFail($id);
    $this->id            = $saida->id;
    $this->nome          = $saida->nome;
    $this->apelido       = $saida->apelido;
    $this->dt_nascimento = $saida->dt_nascimento;
    $this->email         = $saida->email;
    $this->sexo          = $saida->sexo;
    $this->cpf           = $saida->cpf;
    $this->observacao    = $saida->observacao;
    $this->telefone1     = $saida->telefone1;
    $this->telefone2     = $saida->telefone2;
    $this->cep           = $saida->cep;
    $this->logradouro    = $saida->logradouro;
    $this->numero        = $saida->numero;
    $this->complemento   = $saida->complemento;
    $this->bairro        = $saida->bairro;
    $this->cidade        = $saida->cidade;
    $this->uf            = $saida->uf;
    $this->foto          = $saida->srcFoto;
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

    $saida = DBSaida::findOrFail($this->id);
    $saida->update([
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
      $filePath = public_path("stg/img/user/{$saida->id}.png");
      
      if (file_exists($filePath))
      {
        unlink($filePath);
      }
      
      $nomearquivo = $saida->id.'.png';
      
      $img = Image::make($this->foto);
      $img->resize(320, 320);
      $img->save('stg/img/user/' . $nomearquivo);
    }
    
    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Saida editada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('atd.saidas')); 
  }
  
  public function render()
  {
    $funcoes = DBFuncao::get();
    
    return view('livewire/catalogo/saida/saida-editar', [
      'funcoes' => $funcoes
      ])->layout('layouts/bootstrap');
    }
}
