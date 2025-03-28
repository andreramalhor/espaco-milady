<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Mail;




Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('emails:send')->daily();



Artisan::command('mail:test {email?}', function ($email = null) {
    $email = $email ?: config('mail.from.address');
    
    Mail::raw('Este é um email de teste do Laravel', function ($message) use ($email) {
        $message->to($email)
                ->subject('Teste de Email');
    });
    
    $this->info("Email de teste enviado para: {$email}");
})->purpose('Enviar email de teste');

