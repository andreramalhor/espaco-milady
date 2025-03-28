<?php

namespace App\Livewire\Atendimento\Pessoa;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Livewire\Atendimento\Pessoa\Auxiliar\BuscaCEP;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use App\Jobs\EnviarEmailUser;

class PessoaCriar extends Component
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
  public $origem = 'Sistema';
  
  public $tab_active = 'tab-dados_gerais';
  
  #[Rule('image|nullable|max:1024')]
  public $foto;
  
  protected $listeners = ['pessoaUpdated' => 'refreshList'];
  
  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
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
  
  public function store()
  {
    $this->telefone1 = preg_replace('/[^0-9]/', '', $this->telefone1);
    
    $validated = $this->validate([ 
      'nome'      => 'required',
      'apelido'   => 'required',
      'telefone1' => 'required',
    ]);
  

    $pessoa = DBPessoa::create([
      'nome'          => $this->nome,
      'apelido'       => $this->apelido,
      'dt_nascimento' => $this->dt_nascimento,
      'email'         => $this->email,
      'password'      => $this->password,
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
      'origem'        => $this->origem,
    ]);
    
    if( !is_null($this->foto) )
    {
      $this->incluirFoto($this->foto, $pessoa);
    }
    
    $this->dispatch('swal:alert', [
      'title'     => 'Criado!',
      'text'      => 'Pessoa cadastrada com sucesso!',
      'icon'      => 'success',
      'iconColor' => 'green',
    ]);
    
    EnviarEmailUser::dispatch($pessoa);
    
    return redirect()->to(route('atd.pessoas')); 
  }
  
  public function incluirFoto($foto, $pessoa)
  {
    $nomearquivo = $pessoa->id.'.png';

    $manager = new ImageManager(new Driver());
    $image   = $manager->read($foto);
    $image->scale(320, 320);
    $image->toPng()->save('stg/img/user/' . $nomearquivo);
  }

  public function render()
  {
    return view('livewire/atendimento/pessoa/pessoa-criar')->layout('layouts/bootstrap');
  }
}
