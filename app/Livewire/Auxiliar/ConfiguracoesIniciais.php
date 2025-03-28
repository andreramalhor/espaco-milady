<?php

namespace App\Livewire\Auxiliar;

use Livewire\Component;

class ConfiguracoesIniciais extends Component
{
    public $cep;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cidade;
    public $uf = 'MG';
  
    public function mount()
    {
        dd(912121);
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
    
    public function render()
    {
        return view('livewire/auxiliar/busca-cep');
    }
}