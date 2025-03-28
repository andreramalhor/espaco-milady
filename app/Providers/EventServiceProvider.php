<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Atendimento\Pessoa as User;
use App\Observers\Atendimento\PessoaObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        User::observe(PessoaObserver::class);
    }
}
