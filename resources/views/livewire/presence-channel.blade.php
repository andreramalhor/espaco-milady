<div>
    <div class="mb-4 p-4 bg-white shadow rounded">
        <h3 class="font-bold mb-2">Usuários Online</h3>
        <ul id="users" class="list-disc pl-4">
            @foreach($users as $user)
                <li>{{ $user['apelido'] }} - {{ $user['id'] }}</li>
            @endforeach
        </ul>
    </div>

    <div class="p-4 bg-gray-100 rounded">
        <h4 class="font-bold mb-2">Atividade Recente</h4>
        <ul id="presenca" class="space-y-2">
            @foreach($presenca as $event)
                <li class="text-sm text-gray-600">
                    [{{ $event['time'] }}] 
                    @if($event['type'] === 'joining')
                        ➕ <span class="text-green-600">{{ $event['user'] }} entrou</span>
                    @else
                        ➖ <span class="text-red-600">{{ $event['user'] }} saiu</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>