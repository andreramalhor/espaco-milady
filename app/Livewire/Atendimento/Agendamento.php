<?php

namespace App\Livewire\Atendimento;

use Livewire\Component;

class Agendamento extends Component
{
    public $etapa = 'serviço/profissional';
    // public $etapa = 'concluido';
    
    public $agendamentos = [];

    public $servico;
    public $profissional;
    public $dt_agendamento;
    public $horarios_do_profissional;
    public $horario;
    
    public $nome;
    public $email;
    public $telefone;
    public $observacao;
    
    public $servicos;
    public $profissionais = [];
    public $horariosDoDia = [];
 
    public $id_servico;
    public $id_profissional;
    
    public function mount()
    {
        $this->servicos       = \App\Models\Catalogo\ServicoProduto::where('online', '=', true)->get();
        $this->dt_agendamento = \Carbon\Carbon::today()->format('Y-m-d');
    }
    
    public function mudar_etapa( $local )
    {
        switch ($local)
        {
            case 'serviço/profissional':
                $this->reset(['profissionais']);
                break;
            
            case 'data/agendamento':
                # code...
                break;
            
            case 'concluido':
                # code...
                break;
            
            case 'nome/cliente':
                # code...
                break;
            
            default:
                # code...
                break;
        }

        $this->etapa = $local;
    }

    public function horarios( $data, $intervalo )
    {
        $this->horariosDoDia = [];

        if(\Carbon\Carbon::parse($data) == \Carbon\Carbon::today())
        {
            $inicio     = \Carbon\Carbon::now();
            $hora_start = $inicio->addMinutes(60 - $inicio->minute);
        }
        else
        {
            $hora_start = \Carbon\Carbon::parse($data)->startOfDay()->setHour(9);
        }
        
        $hora_end = \Carbon\Carbon::parse($data)->setTime(18, 0, 0);
        
        $this->horarios_do_profissional = \App\Models\Atendimento\Agendamento::whereBetween('start', [ $hora_start->copy()->startOfDay(), $hora_end->copy()->endOfDay() ])->where('id_profexec', '=', $this->id_profissional)->get();

        for ($hora_start; $hora_start->hour <= $hora_end->hour; $hora_start->addHour(1))
        {
            foreach($this->horarios_do_profissional as $ciclo_horarios_profissional)
            {
                $start = \Carbon\Carbon::parse($ciclo_horarios_profissional['start']);
                $end   = \Carbon\Carbon::parse($ciclo_horarios_profissional['end']);

                if ( !$hora_start->between($start, $end) )
                {
                    $this->horariosDoDia[] = $hora_start->format('H:i');
                    break;
                }
            }
        }

        $horarios_ocupados = $this->removerHorariosAgendados($this->agendamentos, horariosDoDia: $this->horariosDoDia);

        $this->horariosDoDia = array_diff($this->horariosDoDia, $horarios_ocupados);
    }
    
    public function removerHorariosAgendados($agendamentos, $horariosDoDia)
    {
        $horarios_ocupados = [];
        
        foreach($horariosDoDia as $hora)
        {
            $horaCarbon = \Carbon\Carbon::parse($this->dt_agendamento.' '.$hora);
            foreach($agendamentos as $agendamento)
            {
                if($agendamento['id_profexec'] == $this->id_profissional && $horaCarbon->greaterThanOrEqualTo($agendamento['start']) && $horaCarbon->lessThan($agendamento['end']))
                {
                    $horarios_ocupados[] = $hora;
                    break;
                }
            }
        }
        
        return $horarios_ocupados;
    }
    
    public function profissional_selecionado( $id_servico, $id_profissional )
    {
        if($id_profissional == 'Escolha o profissional')
        {
            unset($this->profissionais[$id_servico]);
        }
        else
        {
            $this->profissionais[$id_servico] = $id_profissional;     
        }
    }
    
    public function confirmar_servico( $id_servico )
    {
        $this->id_servico      = $id_servico;
        $this->id_profissional = $this->profissionais[$id_servico];
        
        $this->profissional    = \App\Models\Atendimento\Pessoa::find($this->id_profissional);
        $this->servico         = \App\Models\Catalogo\ServicoProduto::find($this->id_servico);
        $this->duracao         = $this->servico->duracao;
        
        $this->horarios($this->dt_agendamento, $this->duracao);
        
        $this->etapa = 'data/agendamento';
    }

    public function confirmar_horario($hora)
    {
        $this->horario = $hora;
        $this->etapa = 'nome/cliente';
    }
    
    public function adicionar_mais_servicos(): void
    {
        $esse['start']        = \Carbon\Carbon::parse($this->dt_agendamento.' '.$this->horario);
        $esse['end']          = \Carbon\Carbon::parse($this->dt_agendamento.' '.$this->horario)->addHour(1);
        $esse['id_profexec']  = $this->profissional->id;
        $esse['id_servprod']  = $this->servico->id;
        $esse['valor']        = $this->servico->vlr_venda;
        $esse['id_criador']   = 1;
        $esse['status']       = 'Agendado pela internet';
        $esse['obs']          = 'Cliente: '.$this->nome.' | Obs: '.$this->observacao.' | e-Mail: '.$this->email;
        $esse['prc_comissao'] = $this->servico->smenhgskqwmdjwe->where('id_profexec', '=', $this->id_profissional)->first()->prc_comissao;
        $esse['vlr_comissao'] = $this->servico->smenhgskqwmdjwe->where('id_profexec', '=', $this->id_profissional)->first()->prc_comissao * $this->servico->vlr_venda;

        $this->agendamentos[] = $esse;
        
        $esse = [];

        $this->mudar_etapa('serviço/profissional');
    }
    
    public function confirmar_agendamento()
    {
        $validated = $this->validate([ 
            'nome' => 'required',
            'telefone' => 'required',
        ]);
        
        $this->adicionar_mais_servicos();
        
        foreach ($this->agendamentos as $key => $agendamento)
        {
            $agendamento =  \App\Models\Atendimento\Agendamento::create([
                'id_empresa'       => 1, 
                'start'            => $agendamento['start'],
                'end'              => $agendamento['end'],
                'id_cliente'       => null,
                'id_profexec'      => $agendamento['id_profexec'],
                'id_servprod'      => $agendamento['id_servprod'],
                'id_comanda'       => null,
                'valor'            => $agendamento['valor'],
                'id_criador'       => $agendamento['id_criador'],
                'status'           => $agendamento['status'],
                'obs'              => $agendamento['obs'],
                'id_venda_detalhe' => null,
                'prc_comissao'     => $agendamento['prc_comissao'],
                'vlr_comissao'     => $agendamento['vlr_comissao'],
                'grupo'            => null,
            ]);
        }
        
        $this->etapa = 'concluido';

        $this->dispatch('swal:alert', [
            'title'     => 'Agendado!',
            'text'      => 'Serviço agendado com sucesso!',
            'icon'      => 'success',
            'iconColor' => 'green',
        ]);    
    }

    public function render()
    {
        return view('livewire.agendamento.index')->layout('layouts/visita');
    }
}
