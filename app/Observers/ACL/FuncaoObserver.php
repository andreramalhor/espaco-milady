<?php

namespace App\Observers\ACL;

use App\Models\ACL\Funcao as DBFuncao;

class FuncaoObserver
{
    public function created(DBFuncao $tipo): void
    {
        dd('created');
    }

    public function updated(DBFuncao $tipo): void
    {
        dd('updated');
    }

    public function deleted(DBFuncao $tipo): void
    {
        dd('deleted');

        Log::info('Tipo deletado: ' . $tipo->id);
        $this->chamarFuncaoAdicional($tipo);
    }

    public function restored(DBFuncao $tipo): void
    {
        dd('restored');
    }

    public function forceDeleted(DBFuncao $tipo): void
    {
        dd('forceDeleted');
    }
    
    public function forceDelete(DBFuncao $tipo)
    {
        dd('forceDelete ');
        // Chamar a função desejada quando um tipo for deletado
        $this->chamarFuncaoAdicional($tipo);
    }

    private function chamarFuncaoAdicional(DBFuncao $tipo)
    {
        dd('chamarFuncaoAdicional');
        // Lógica da função adicional
        // Por exemplo:
        // - Enviar um e-mail
        // - Atualizar um log
        // - Executar outra tarefa
    }
}
