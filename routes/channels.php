<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Atendimento\Pessoa as User;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('canal-publico', function () {
  return true;
});

Broadcast::channel('App.Models.Atendimento.Pessoa.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('presenca', function (User $user) {
    return ['id' => $user->id, 'apelido' => $user->apelido];
});
  