<?php

namespace App\Livewire\Catalogo\Compra\Auxiliar;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Catalogo\Compra as DBCompra;

class CompraSistema extends Component
{    
    public $compra;
    public $username;
    public $email;

    // public function rules()
    // {
    //     return [
    //         'username' => [
        //             'required',
        //             Rule::unique('atd_compras')->ignore($this->compra), 
        //     ],
    //         'email' => [
    //             'required',
    //             Rule::unique('atd_compras')->ignore($this->compra), 
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

        $compra = DBCompra::findOrFail($this->compra->id);

        $compra->update([
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

        // $compras = DBCompra::create($validated);

        // $adasdd = $this->compra->update([
        //     'usarname' => $this->username,
        //     'usarname' => $this->username,
        //     'password' => '123456'
        // ]);
    }

    public function mount($compra)
    {
        $this->compra = $compra;
        $this->username = $compra->username;
        $this->email    = $compra->email;
    }

    public function render()
    {
        return view('livewire/catalogo/compra/auxiliar/compra-mostrar-sistema');
    }
}
