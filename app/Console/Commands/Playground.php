<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

use App\Events\CanalPublico;
use App\Models\Atendimento\Pessoa;
use App\Notifications\Qualquer;

class Playground extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CanalPublico::dispatch('Mensagem do playground');

        $pessoa = Pessoa::find(2);
        Notification::send($pessoa, new Qualquer());

        $pessoa->notify(new Qualquer());
    }
}
