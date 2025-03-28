<?php

namespace App\Livewire\Financeiro\Gerencial;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Financeiro\Lancamento as DBLancamento;
use App\Models\Contabilidade\DRE as DBDRE;

class GerencialDRE extends Component
{
    public $periodo;

    public $dre;
    public $lancamentos;
    
    protected $listeners = [
        'chamarMetodo' => 'remove',
        'chamar-modal' => 'chamar_modal',
        'listar-this->lancamentos' => 'listar',
    ];

    public function mount()
    {
        $this->inicio = $this->inicio ?? \Carbon\Carbon::now()->subMonth(1)->startOfMonth();
        $this->final  = $this->final ?? \Carbon\Carbon::now()->addMonth(2)->endOfMonth();

        $this->dre = DBDRE::orderBy('ordem', 'asc')->get();

        $this->lancamentos = DBLancamento::
                                    whereBetween('created_at', [$this->inicio, $this->final])->
                                    with(['qlwiqwuheqlefkd'])->
                                    get();
                                    // orderBy('dt_competencia', 'asc')->
                                    // orderBy('id', 'desc')->
                                    // get();
    }
    
    public function definir_periodo($variable=null)
    {
        switch ($variable)
        {
            case 'Hoje':
                $this->inicio  = \Carbon\Carbon::now()->startOfDay();
                $this->final   = \Carbon\Carbon::now()->endOfDay();
                $this->periodo =  $this->inicio->format('d/m/Y');
                break;
                
            case 'Esta semana':
                $this->inicio  = \Carbon\Carbon::now()->startOfWeek();
                $this->final   = \Carbon\Carbon::now()->endOfWeek();
                $this->periodo = $this->inicio->format('d/m').' - '.$this->final->format('d/m');
                break;
                
            case 'Mês passado':
                $this->inicio  = \Carbon\Carbon::now()->subMonth()->startOfMonth();
                $this->final   = \Carbon\Carbon::now()->subMonth()->endOfMonth();
                $this->periodo =  $this->inicio->format('F Y');
                break;
                
            case 'Este mês':
                $this->inicio  = \Carbon\Carbon::now()->startOfMonth();
                $this->final   = \Carbon\Carbon::now()->endOfMonth();
                $this->periodo =  $this->inicio->format('F Y');
                break;
                
            case 'Todo período':
                $this->inicio  = \Carbon\Carbon::now()->subYear(100);
                $this->final   = \Carbon\Carbon::now()->addYear(100);
                $this->periodo =  'Todo periodo';
                break;

            case 'Escolha o período':
                $this->inicio  = \Carbon\Carbon::now()->startOfMonth();
                $this->final   = \Carbon\Carbon::now()->endOfMonth();
                $this->periodo =  'Outro';
                break;
        }

        return $this->listar();
    }

    public function render()
    {
        return view('livewire/financeiro/gerencial/dre')->layout('layouts/bootstrap');
    }
}
