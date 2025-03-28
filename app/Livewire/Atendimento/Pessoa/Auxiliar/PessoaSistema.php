<?php

namespace App\Livewire\Atendimento\Pessoa\Auxiliar;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Atendimento\Pessoa as DBPessoa;

class PessoaSistema extends Component
{    
    public $pessoa;
    public $username;
    public $email;

    // public function rules()
    // {
    //     return [
    //         'username' => [
        //             'required',
        //             Rule::unique('atd_pessoas')->ignore($this->pessoa), 
        //     ],
    //         'email' => [
    //             'required',
    //             Rule::unique('atd_pessoas')->ignore($this->pessoa), 
    //         ],
    //     ];
    // }

    // public function messages() 
    // {
    //     return [
    //         'username.required' => 'O nome de usuário tem que ser definido.',
    //         'username.unique' => 'Escolha um nome de usuário diferente.',
    //         'email.required' => 'O email tem que ser definido.',
    //         'email.unique' => 'Escolha um email diferente.',
    //     ];
    // }
    
    public function salvar() 
    {
        // $validated = $this->validate();
        // $this->validate();

        $pessoa = DBPessoa::findOrFail($this->pessoa->id);

        $pessoa->update([
            'username' => $this->username,
            'email'    => $this->email,
            'password' => bcrypt(123456)
        ]);

        $this->dispatch('swal:alert', [
          'title'     => 'Conclído!',
          'text'      => 'Acessos ao sistema completado com sucesso!',
          'icon'      => 'success',
          'iconColor' => 'green',
        ]);

        // $pessoas = DBPessoa::create($validated);

        // $adasdd = $this->pessoa->update([
        //     'usarname' => $this->username,
        //     'usarname' => $this->username,
        //     'password' => '123456'
        // ]);
    }

    public function mount($pessoa)
    {
        $this->pessoa = $pessoa;
        $this->username = $pessoa->username;
        $this->email    = $pessoa->email;
    }

    public function render()
    {
        return view('livewire/atendimento/pessoa/auxiliar/pessoa-mostrar-sistema');
    }
}
