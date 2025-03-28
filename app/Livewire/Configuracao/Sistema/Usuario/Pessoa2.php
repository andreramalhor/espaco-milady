<?php

namespace App\Livewire\Configuracao\Sistema\Usuario;

use Livewire\Attributes\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Event;

class Pessoa2 extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $pesquisar = '';

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

    public function create()
    {
        $this->reset();
        $this->openModal('store');
    }

    public function openModal($type)
    {
        $this->modalType = $type;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->modalType = '';
    }

    public function store()
    {
        $this->validate();

        $pessoa = DBPessoa::create([
            'apelido'       => $this->nome,
            'nome'          => $this->nome,
            'dt_nascimento' => $this->dt_nascimento,
            'email'         => $this->email,
            'sexo'          => $this->sexo,
            'cpf'           => $this->cpf,
            'instagram'     => $this->instagram,
            'observacao'    => $this->observacao,
            'id_criador'    => auth()->user()->id,
            'ddd'           => $this->ddd,
            'telefone'      => $this->telefone,
            'cep'           => $this->cep,
            'logradouro'    => $this->logradouro,
            'numero'        => $this->numero,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'uf'            => $this->uf,
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
        $this->closeModal();
    }

    public function show($id)
    {
        $this->pessoa = DBPessoa::findOrFail($id);

        $this->openModal('show');
    }

    public function edit($id)
    {
        $pessoa = DBPessoa::findOrFail($id);
        $this->pessoaId      = $id;
        $this->apelido       = $pessoa->nome;
        $this->nome          = $pessoa->nome;
        $this->dt_nascimento = $pessoa->dt_nascimento;
        $this->email         = $pessoa->email;
        $this->sexo          = $pessoa->sexo;
        $this->cpf           = $pessoa->cpf;
        $this->instagram     = $pessoa->instagram;
        $this->observacao    = $pessoa->observacao;
        $this->ddd           = $pessoa->ddd;
        $this->telefone      = $pessoa->telefone;
        $this->cep           = $pessoa->cep;
        $this->logradouro    = $pessoa->logradouro;
        $this->numero        = $pessoa->numero;
        $this->bairro        = $pessoa->bairro;
        $this->cidade        = $pessoa->cidade;
        $this->uf            = $pessoa->uf;
        $this->foto          = $pessoa->srcFoto;
        $this->openModal('store');
    }

    public function update()
    {
        if ($this->pessoaId)
        {
            $pessoa = DBPessoa::findOrFail($this->pessoaId);
            $pessoa->update([
                'apelido'       => $this->nome,
                'nome'          => $this->nome,
                'dt_nascimento' => $this->dt_nascimento,
                'email'         => $this->email,
                'sexo'          => $this->sexo,
                'cpf'           => $this->cpf,
                'instagram'     => $this->instagram,
                'observacao'    => $this->observacao,
                'id_criador'    => auth()->user()->id,
                'ddd'           => $this->ddd,
                'telefone'      => $this->telefone,
                'cep'           => $this->cep,
                'logradouro'    => $this->logradouro,
                'numero'        => $this->numero,
                'bairro'        => $this->bairro,
                'cidade'        => $this->cidade,
                'uf'            => $this->uf,
            ]);

            if($this->foto)
            {
                $nomearquivo = $pessoa->id.'.png';

                $img = Image::make($this->foto);
                $img->resize(320, 320);
                $img->save('stg/img/user/' . $nomearquivo);
            }

            $this->dispatch('swal:alert', [
                'title'     => 'Atualizado!',
                'text'      => 'Pessoa atualizada com sucesso!',
                'icon'      => 'success',
                'iconColor' => 'green',
            ]);

            $this->closeModal();
            $this->reset();
        }
    }

    public function delete($id)
    {
        $pessoa = DBPessoa::find($id);

        $this->dispatch('swal:confirm', [
            'title'        => $pessoa->nome,
            'text'         => 'Tem certeza que quer deletar a pessoa?',
            'icon'         => 'warning',
            'iconColor'    => 'orange',
            'idEvent'      => $pessoa->id,
        ]);
    }

    public function remove($id)
    {
        $pessoa = DBPessoa::find($id);

        $filePath = public_path("stg/img/user/{$pessoa->id}.png");
        if (file_exists($filePath))
        {
            unlink($filePath);
            $texto = 'Pessoa e foto deletada com sucesso!';
        }

        $pessoa->delete();

        $this->dispatch('swal:alert', [
            'title'         => 'Deletado!',
            'text'          => $texto ?? 'Pessoa deletada com sucesso!',
            'icon'          => 'success',
            'iconColor'     => 'green',
        ]);

        $this->resetExcept('pessoaId');
    }

    public function listar()
    {
        $pessoas = DBPessoa::
                            procurar($this->pesquisar)->
                            paginate(10);

        return $pessoas;
    }

    // public function mount()
    // {
    //     Event::listen('pessoaDeleted', function ()
    //     {
    //         dd(999);
    //         // Atualizar dados ou recarregar o componente
    //         $this->pessoas = Pessoa::all(); // Exemplo: Buscar dados atualizados
    //     });
    // }
    
    public function emit($nomeEvento, $dados = [])
    {
        dd(11111222223333);
        $nomeEvento = 'pessoaDeleted';
        Livewire::emit($nomeEvento, $dados);
    }

    public function deletePessoa()
    {
        dd(22222222);
        // Realize a lógica de exclusão (por exemplo, excluir do banco de dados)
        
        $this->emit('pessoaDeletada', ['idPessoa' => $this->pessoa->id]); // Emitir evento com dados
    }
        
    // public function emit($eventName, $data = [])
    // {
    //     Livewire::emit($eventName, $data);
    // }

    // public function pessoaDeleted()
    // {
    //     dd(998887);
    //     // Perform deletion logic (e.g., delete from database)
        
    //     $this->emit('pessoaDeleted', ['pessoaId' => $this->pessoa->id]); // Emit event with data
    // }

    // public function deletePessoa3()
    // {
    //     dd(11111221222444);
    //     // ... (deletion logic)
        
    //     Event::dispatch(new PessoaDeleted($this->pessoa->id)); // Dispatch event with data
    // }

    public function render()
    {
        $pessoas = $this->listar();

        return view('livewire/configuracao/sistema/usuario/usuario/index', [
            'pessoas' => $pessoas,
        ])->layout('layouts/bootstrap');
    }
}
