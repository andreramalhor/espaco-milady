<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Qualquer extends Notification implements ShouldQueue
{
    use Queueable;
    public $dados;


    //  O MODEL Q QUERO NOTIFICAR PRECISA TER O NOTIFIABLE 

    /**
     * Create a new notification instance.
     */
    public function __construct($dados=null)
    {
        $this->dados = $dados;
    }
    
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->subject('Assunto do Email') // Adicione um assunto
            ->greeting('Olá ' . $notifiable->name ?? 'andre' . '!') // Saudação personalizada
            ->line('Mensagem personalizada: teste')
            ->action('Acesse o sistema', url('/'))
            ->line('Obrigado por usar nossa aplicação!');
        }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'pedido' => 1,
            'status' => 'Aguardando',
        ];
    }
}
