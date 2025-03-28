<?php

namespace App\Livewire\Catalogo\Compra;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Catalogo\Compra as DBCompra;
use App\Models\ACL\Funcao as DBFuncao;
use App\Livewire\Catalogo\Compra\Auxiliar\BuscaCEP;
use Livewire\WithFileUploads;
// use Intervention\Image\Facades\Image;


class CompraEditar extends Component
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
  
  protected $listeners = ['compraUpdated' => 'refreshList'];

  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }

  public function mount($id)
  {
    $compra = DBCompra::findOrFail($id);
    $this->id            = $compra->id;
    $this->nome          = $compra->nome;
    $this->apelido       = $compra->apelido;
    $this->dt_nascimento = $compra->dt_nascimento;
    $this->email         = $compra->email;
    $this->sexo          = $compra->sexo;
    $this->cpf           = $compra->cpf;
    $this->observacao    = $compra->observacao;
    $this->telefone1     = $compra->telefone1;
    $this->telefone2     = $compra->telefone2;
    $this->cep           = $compra->cep;
    $this->logradouro    = $compra->logradouro;
    $this->numero        = $compra->numero;
    $this->complemento   = $compra->complemento;
    $this->bairro        = $compra->bairro;
    $this->cidade        = $compra->cidade;
    $this->uf            = $compra->uf;
    $this->foto          = $compra->srcFoto;
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

    $compra = DBCompra::findOrFail($this->id);
    $compra->update([
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
      $filePath = public_path("stg/img/user/{$compra->id}.png");
      
      if (file_exists($filePath))
      {
        unlink($filePath);
      }
      
      $nomearquivo = $compra->id.'.png';
      
      $img = Image::make($this->foto);
      $img->resize(320, 320);
      $img->save('stg/img/user/' . $nomearquivo);
    }
    
    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Compra editada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('atd.compras')); 
  }
  
  public function render()
  {
    $funcoes = DBFuncao::get();
    
    return view('livewire/catalogo/compra/compra-editar', [
      'funcoes' => $funcoes
      ])->layout('layouts/bootstrap');
    }
}
