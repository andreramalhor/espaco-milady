<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Função: {{ $funcao->nome}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Configuração</a></li>
                        <li class="breadcrumb-item">Acessos</li>
                        <li class="breadcrumb-item active">Funções</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-left">Nome</th>
                            <th class="text-left">E-mail</th>
                            <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pessoas as $ciclo)
                            <tr wire:key="{{ $ciclo->id }}" class="{{ is_null($ciclo->deleted_at) ? '' : 'table-danger' }}">
                                <td class="p-1 text-center">
                                    <img class="direct-chat-img px-1" src="{{ $ciclo->src_foto  }}">
                                </td>
                                <td class="p-1 text-left">
                                    {{ $ciclo->apelido }}
                                    <br><small>{{ $ciclo->nome }}</small>
                                </td>
                                <td class="p-1 text-left">{{ $ciclo->email }}</td>
                                <td class="p-1 text-right">
                                    <div class="btn-group">
                                        <a href="#" data-bs-toggle="dropdown"><span class="badge bg-info dropdown-toggle dropdown-icon">Ações  </span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" wire:click="delete({{ $funcao->id }}, {{ $ciclo->id }})">Remover</a>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center"><small>Não há pessoas com esta função.</small></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>