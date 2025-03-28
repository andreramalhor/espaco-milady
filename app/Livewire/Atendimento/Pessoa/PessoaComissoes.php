<?php

namespace App\Livewire\Atendimento\Pessoa;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Configuracao\ColaboradorServico as DBColaboradorServico;
use App\Models\ACL\Funcao as DBFuncao;

class PessoaComissoes extends Component
{
  public $id;
  public $pessoa;
  public $comissoes;
  public $servicos;
  
  public function mount($id)
  {
    $this->pessoa    = DBPessoa::findOrFail($id);
    $this->comissoes = $this->pessoa->smenhgskqwmdjwe;
    $this->servicos  = DBServicoProduto::orderBy('nome')->get();
  }

  public function update_servprod($id_servprod, $valor, $manter): void
  {
    if( $valor == '' || $valor*1 == 0 )
    {
      $colab = DBColaboradorServico::where('id_servprod', '=', $id_servprod*1)->where('id_profexec', '=', $this->pessoa->id*1)->first()->delete();
    }
    else
    {
      $colab = DBColaboradorServico::updateOrCreate([
        'id_servprod' => $id_servprod*1,
        'id_profexec' => $this->pessoa->id*1,
      ], ['prc_comissao' => $valor*1 / 100 ]);
    }

    $this->dispatch('swal:alert', [
      'title'         => 'Concluído!',
      'text'          => 'Comissão editada com sucesso!',
      'icon'          => 'success',
      'iconColor'     => 'green',
    ]);
  }

  
  public function edit()
  {
    // $this->validate();

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
    return view('livewire/atendimento/pessoa/pessoa-comissoes')->layout('layouts/bootstrap');
  }
}
