<?php

namespace App\Livewire\PDV\Caixa;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\PDV\Caixa as DBCaixa;
use App\Livewire\PDV\Caixa\Auxiliar\BuscaCEP;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CaixaEditar extends Component
{
  use WithFileUploads;
  
  public $id;
  #[Rule('required|min:3')]
  public $nome;
  public $apelido;
  public $dt_nascimento;
  public $email;
  public $password = 123456;
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
  
  protected $listeners = ['caixaUpdated' => 'refreshList'];

  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }

  public function mount($id)
  {
    $caixa = DBCaixa::findOrFail($id);
    $this->id            = $caixa->id;
    $this->nome          = $caixa->nome;
    $this->apelido       = $caixa->apelido;
    $this->dt_nascimento = $caixa->dt_nascimento;
    $this->email         = $caixa->email;
    $this->password      = $caixa->password;
    $this->sexo          = $caixa->sexo;
    $this->cpf           = $caixa->cpf;
    $this->observacao    = $caixa->observacao;
    $this->telefone1     = $caixa->telefone1;
    $this->telefone2     = $caixa->telefone2;
    $this->cep           = $caixa->cep;
    $this->logradouro    = $caixa->logradouro;
    $this->numero        = $caixa->numero;
    $this->complemento   = $caixa->complemento;
    $this->bairro        = $caixa->bairro;
    $this->cidade        = $caixa->cidade;
    $this->uf            = $caixa->uf;
    $this->tipo          = $caixa->kjahdkwkbewtoip->pluck('id');
    $this->foto          = $caixa->srcFoto;
  }
  
  public function buscaCEP()
  {
    $correios = BuscaCEP::get_endereco($this->cep);
    
    $this->bairro      = $correios->bairro->__toString();
    $this->cep         = $correios->cep->__toString();
    $this->logradouro  = $correios->logradouro->__toString();
    $this->complemento = $correios->complemento->__toString();
    $this->cidade      = $correios->localidade->__toString();
    $this->uf          = $correios->uf->__toString();
    
    $this->dispatch('set_endereco', $this);
  }
  
  public function edit()
  {
    $this->validate();

    $caixa = DBCaixa::findOrFail($this->id);
    $caixa->update([
      'nome'          => $this->nome,
      'apelido'       => $this->apelido,
      'dt_nascimento' => $this->dt_nascimento,
      'email'         => $this->email,
      'password'      => $this->password ?? bcrypt(123456),
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

    $caixa->kjahdkwkbewtoip()->sync($this->tipo);

    
    if( !is_null($this->foto) )
    {
      $this->incluirFoto($this->foto, $caixa);
    }
   
    $this->dispatch('swal:alert', [
      'title'     => 'Editado!',
      'text'      => 'Caixa editada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    return redirect()->to(route('atd.caixas')); 
  }
  
  public function incluirFoto($foto, $caixa)
  {
    $filePath = public_path("stg/img/user/{$caixa->id}.png");
    
    if (file_exists($filePath))
    {
      unlink($filePath);
    }
    
    $nomearquivo = $caixa->id.'.png';
  
    $manager = new ImageManager(new Driver());
    $image   = $manager->read($foto);
    $image->scale(320, 320);
    $image->toPng()->save('stg/img/user/' . $nomearquivo);
  }

  public function render()
  {
    return view('livewire/pdv/caixa/caixa-editar')->layout('layouts/bootstrap');
  }
}
