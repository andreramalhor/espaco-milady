<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Content;
use App\Mail\NewUserWelcomeEmail;


use App\Models\Atendimento\Pessoa as User;

class EnviarEmailUser implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('andrercr@gmail.com')->send(new NewUserWelcomeEmail($this->user));

        // Mail::to($this->user->email)
            // ->send(new NewUserWelcomeEmail($this->user));
    }

    // public function content()
    // {
    //     return new Content(
    //         view: 'emails.test',
    //     );
    // }
    
}



// $email = $this->argument('email') ?: config('mail.from.address');
        
// Mail::to($email)->send(new TestEmail());

// $this->info("Test email sent to {$email}!");
