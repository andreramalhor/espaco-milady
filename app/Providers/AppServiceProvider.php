<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

use App\Models\Atendimento\Pessoa as User;
use App\Models\ACL\Permissao;
use App\Models\Financeiro\Lancamento;

use App\Policies\Financeiro\LancamentoPolicy;
use App\Observers\ACL\PermissaoObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Permissao::observe(PermissaoObserver::class);

        Gate::policy(Lancamento::class, LancamentoPolicy::class);

        // Gate::before(function (User $user, $ability)
        // {
        //     if($user->isAdmin())
        //     {
        //         return true;
        //     }
        // });
        Gate::before(function (User $user, $ability)
        {
            \Debugbar::disable();

            $user->disabledDebuBar();
            
            if(Permissao::existsOnCache($ability))
            {
                return $user->temPermissao($ability);
            }
            // dump($ability, $user, $user->temFuncao($ability));
        });
    }
}
