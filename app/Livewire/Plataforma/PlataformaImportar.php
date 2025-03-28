<?php

namespace App\Livewire\Plataforma;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PlataformasImportBraip;

class PlataformaImportar extends Component
{
    use WithFileUploads;
    
    public $file;

    public function render()
    {
        // , [
        //     'leads' => $leads->paginate(),
        // ]
        return view('livewire.plataforma.importar')->layout('layouts/bootstrap');
    }

    public function importar_braip()
    {
        // $this->validate([
        //     'file' => 'required|mimes:xlsx,xls,txt'
        // ]);

        Excel::import(new PlataformasImportBraip, $this->file);

        $this->dispatch('swal:alert', [
            'title'     => 'Cadastrado!',
            'text'      => 'Planilha importada com sucesso!',
            'icon'      => 'success',
            'iconColor' => 'green',
          ]);
          

        // return redirect()->back();
    }

}
