<?php

namespace App\Observers\pivots;

use App\Models\pivots\FuncoesPessoas as DBFuncoesPessoas;

class FuncoesPessoasObserver
{
    public function created(DBFuncoesPessoas $tipo): void
    {
        dd('created');
    }

    public function updated(DBFuncoesPessoas $tipo): void
    {
        dd('updated',11 );
    }

    public function deleted(DBFuncoesPessoas $tipo): void
    {
        dd('deleted');

        Log::info('Tipo deletado: ' . $tipo->id);
        $this->chamarFuncoesPessoasAdicional($tipo);
    }

    public function restored(DBFuncoesPessoas $tipo): void
    {
        dd('restored');
    }

    public function forceDeleted(DBFuncoesPessoas $tipo): void
    {
        dd('forceDeleted');
    }
    
    public function forceDelete(DBFuncoesPessoas $tipo)
    {
        dd('forceDelete ');
        // Chamar a função desejada quando um tipo for deletado
        $this->chamarFuncoesPessoasAdicional($tipo);
    }

    private function chamarFuncoesPessoasAdicional(DBFuncoesPessoas $tipo)
    {
        dd('chamarFuncoesPessoasAdicional');
        // Lógica da função adicional
        // Por exemplo:
        // - Enviar um e-mail
        // - Atualizar um log
        // - Executar outra tarefa
    }
}
