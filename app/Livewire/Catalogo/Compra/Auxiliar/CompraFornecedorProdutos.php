<?php

namespace App\Livewire\Catalogo\Compra\Auxiliar;

use Livewire\Component;
use App\Models\Catalogo\ServicoProduto as DBServicoProduto;
use App\Models\Catalogo\Compra as DBCompra;

class CompraFornecedorProdutos extends Component
{    
    public $id_fornecedor;
    
    static public function produtosFornecedor($id_fornecedor)
    {
        $produtos = DBServicoProduto::where('id_fornecedor', '=', $id_fornecedor)->get();

        view('livewire/catalogo/compra/auxiliar/compra-criar-fornecedor-produto', [
            'produtos' => $produtos
        ]);
    }

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

    public function render()
    {
        return view('livewire/catalogo/compra/auxiliar/compra-mostrar-sistema');
    }
}
