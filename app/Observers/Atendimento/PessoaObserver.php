<?php

namespace App\Observers\Atendimento;

use App\Models\Atendimento\Pessoa as DBPessoa;
use App\Jobs\EnviarEmailUser;
use App\Notifications\Qualquer;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
class PessoaObserver
{
    public function created(DBPessoa $pessoa): void
    {
        // $pessoa->notify(new Qualquer($pessoa));

        Mail::to('andrercr+125@gmail.com')->send(new TestEmail($pessoa));
        // EnviarEmailUser::dispatch($pessoa);

        dd(11223344);
        dump('Aguarde!!!                                                            public function created');
        cache()->forget('Atendimento::Pessoa');
    }

    public function updated(DBPessoa $pessoa): void
    {
        if($pessoa->wasChanged('kjahdkwkbewtoip'))
        {
            dd(11223344);
        }

        cache()->forget('Atendimento::Pessoa');
    }

    public function deleted(DBPessoa $pessoa): void
    {
        dump('Aguarde!!!                                                            public function deleted');
        cache()->forget('Atendimento::Pessoa');
    }

    public function restored(DBPessoa $pessoa): void
    {
        dd(112233445566);
        cache()->forget('Atendimento::Pessoa');
    }

    public function forceDeleted(DBPessoa $pessoa): void
    {
        dd(11223344556677);
        cache()->forget('Atendimento::Pessoa');
    }
}
