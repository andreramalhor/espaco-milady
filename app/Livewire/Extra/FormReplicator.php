<?php

namespace App\Livewire\Extra;

use Illuminate\Support\Facades\HTML;
use Livewire\Component;
use PDF; // at the top of the file
use NumberToWords\NumberToWords;

class FormReplicator extends Component
{
    public $forms = [];
    
    public function mount()
    {
        $this->forms = [
            [
                'valor'            => 0,
                'num_recibo'       => '',
                'pagador'          => '',
                'cpf_cnpj'         => '',
                'referente_artigo' => 'à',
                'referente'        => '',
                'cidade_pag'       => '',
                'dt_pagamento'     => \Carbon\Carbon::today()->format('Y-m-d'),
                
                'prestador'        => '',
                'cnpj_cpf'         => '',
                'cep'              => '',
                'endereco'         => '',
                'numero'           => '',
                'bairro'           => '',
                'complemento'      => '',
                'cidade_prest'     => '',
                'uf'               => '',
                'telefone'         => '',

                'forma_pagamento'  => 'dinheiro',
                'quem_recebeu'     => '',
                'banco'            => '',
                'chave'            => '',
                'num_cheque'       => '',
                'agencia'          => '',
                'bom_para'         => '',
                'conta'            => '',
                'data'             => '',
                'favorecido'       => '',
                'num_documento'    => '',
                
                'duas_vias'        => false,
            ],
        ];
    }

    public function render()
    {
        return view('livewire.extra.form-replicator')->layout('layouts/visita');
    }

    public function addForm()
    {
        $this->forms[] =
        [
            'valor'            => 0,
            'num_recibo'       => '',
            'pagador'          => '',
            'cpf_cnpj'         => '',
            'referente_artigo' => 'à',
            'referente'        => '',
            'cidade_pag'       => '',
            'dt_pagamento'     => \Carbon\Carbon::today()->format('Y-m-d'),
            
            'prestador'        => '',
            'cnpj_cpf'         => '',
            'cep'              => '',
            'endereco'         => '',
            'numero'           => '',
            'bairro'           => '',
            'complemento'      => '',
            'cidade_prest'     => '',
            'uf'               => '',
            'telefone'         => '',
            
            'forma_pagamento'  => 'dinheiro',
            'quem_recebeu'     => '',
            'banco'            => '',
            'chave'            => '',
            'num_cheque'       => '',
            'agencia'          => '',
            'bom_para'         => '',
            'conta'            => '',
            'data'             => '',
            'favorecido'       => '',
            'num_documento'    => '',
                    
            'duas_vias'        => false,
        ];
    }
    
    public function numeroext($nim)
    {
        // create the number to words "manager" class
        $numberToWords = new NumberToWords();
        
        // build a new number transformer using the RFC 3066 language identifier
        $numberTransformer = $numberToWords->getNumberTransformer('pt_BR');

        return NumberToWords::transformCurrency('pt_BR', str_replace(['.', ','], ['', '.'], $nim), 'BRL');
    }

    public function generatePdf($index)
    {

        PDF::SetTitle('Hello World ss');
        PDF::AddPage();
        PDF::Write(0, 'Hello World mundo ' . $index);
    
        return response()->streamDownload(function () {
            PDF::Output('hello_world.pdf', 'I');
             // 'I' exibe no navegador, 'D' força download
        }, 'hello_world' . $index . '.pdf');
            
    }


    public function removeForm($index)
    {
        unset($this->forms[$index]);
        $this->forms = array_values($this->forms);
    }
}

// I : send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
// D : send to the browser and force a file download with the name given by name.
// F : save to a local server file with the name given by name.
// S : return the document as a string (name is ignored).
// FI : equivalent to F + I option
// FD : equivalent to F + D option
// E : return the document as base64 mime multi-part email attachment (RFC 2045)
