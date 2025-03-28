<?php

namespace App\Livewire\Atendimento\Pessoa;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\ACL\Funcao as DBFuncao;
use App\Livewire\Atendimento\Pessoa\Auxiliar\BuscaCEP;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PessoaEditar extends Component
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
  
  protected $listeners = ['pessoaUpdated' => 'refreshList'];

  public function tabActive($tab_active)
  {
    $this->tab_active = $tab_active;
  }

  public function mount($id)
  {
    $pessoa = DBPessoa::findOrFail($id);
    $this->id            = $pessoa->id;
    $this->nome          = $pessoa->nome;
    $this->apelido       = $pessoa->apelido;
    $this->dt_nascimento = $pessoa->dt_nascimento;
    $this->email         = $pessoa->email;
    $this->password      = $pessoa->password;
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
    $this->tipo          = $pessoa->kjahdkwkbewtoip->pluck('id');
    $this->foto          = $pessoa->srcFoto;
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
    // $this->validate();
    // dd(131);

    $pessoa = DBPessoa::findOrFail($this->id);
    $pessoa->update([
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

    $pessoa->kjahdkwkbewtoip()->sync($this->tipo);

    
    // if( !is_null($this->foto) )
    // {
    //   $this->incluirFoto($this->foto, $pessoa);
    // }
   
    // $this->dispatch('swal:alert', [
    //   'title'     => 'Editado!',
    //   'text'      => 'Pessoa editada com sucesso!',
    //   'icon'      => 'success',
    //   'iconColor' => 'green',
    // ]);
    
    return redirect()->to(route('atd.pessoas')); 
  }
  
  public function incluirFoto($foto, $pessoa)
  {
    $filePath = public_path("stg/img/user/{$pessoa->id}.png");
    
    if (file_exists($filePath))
    {
      unlink($filePath);
    }
    
    $nomearquivo = $pessoa->id.'.png';
  
    $manager = new ImageManager(new Driver());
    $image   = $manager->read($foto);
    $image->scale(320, 320);
    $image->toPng()->save('stg/img/user/' . $nomearquivo);
  }

  public function toggleFuncao($pessoa, $funcao)
  {
    $pessoa = DBPessoa::findOrFail($pessoa);
    $cargo  = DBFuncao::find($funcao);
    
    if($pessoa->kjahdkwkbewtoip->contains($cargo))
    {
      $pessoa->kjahdkwkbewtoip()->detach($cargo);
      
      if($cargo->nome == 'Colaborador')
      {
        $pessoa->update(
        [
          'username'      => null,
          'password'      => null,
          'remeber_token' => null,
        ]);

        $pessoa->kjahdkwkbewtoip()->delete(); // remove funcoes
        $pessoa->qekwjlfiewhoasd()->delete(); // remove permissoes
        $pessoa->qekwjlfiewhoasd()->delete(); // remove permissoes
        $pessoa->aslfenvkvuelkds()->delete(); // remove agenda_ordem usuario
        $pessoa->aslfenvkvuelkds()->delete(); // remove agenda_ordem auth
      }
      
      if($cargo->nome == 'Parceiro')
      {
        $pessoa->aeahvtsijjoprlc()->delete(); // remove serviço/colaboredor
      }

      $this->dispatch('swal:alert', [
        'title'     => 'Removido!',
        'text'      => 'Função removida com sucesso!',
        'icon'      => 'warning',
        'iconColor' => 'yellow',
      ]);
    }
    else
    {
      $pessoa->kjahdkwkbewtoip()->attach($cargo);
      
      $this->dispatch('swal:alert', [
        'title'     => 'Adicionado!',
        'text'      => 'Função adicionada com sucesso!',
        'icon'      => 'success',
        'iconColor' => 'green',
      ]);
    }
    
    if($cargo->nome == 'Usuário do sistema' && !$cargo->jrlcgwekejwbwel->contains($pessoa))
    {
      $this->dispatch('pessoaUpdated', tab: 'tab-usuario_sistema')->to('App\Livewire\Atendimento\Pessoa\PessoaMostrar');
    }
    else
    {
      $this->dispatch('pessoaUpdated')->to('App\Livewire\Atendimento\Pessoa\PessoaMostrar');    
    }
  }
  
  public function render()
  {
    return view('livewire/atendimento/pessoa/pessoa-editar')->layout('layouts/bootstrap');
  }
}
