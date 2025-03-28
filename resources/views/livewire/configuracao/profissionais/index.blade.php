<div class="card">
    <div class="overlay d-none" wire:loading.class="d-block"></div>
    <div class="card-header">
        <h3 class="card-title">Usuários do Sistema</h3>
    </div>
    <div class="card-body p-0">
        <div class="row p-2">
            <div class="offset-md-8 col-md-2">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control float-right" placeholder="Pesquisar" wire:model.live="pesquisar">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a class="btn btn-secondary btn-block btn-sm float-right" wire:click="create"><i class="fa fa-plus"></i> Adicionar usuário</a>
            </div>
        </div>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-left">Nome</th>
                    <th class="text-left">E-mail</th>
                    <th class="text-left">Tipos</th>
                    <th class="text-right"><i class="fas fa-ellipsis-h"></i></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $ciclo)
                <tr wire:key="{{ $ciclo->id }}">
                    <td class="p-1 text-center">{{ $ciclo->id }}</td>
                    <td class="p-1 text-left">{{ $ciclo->name }}</td>
                    <td class="p-1 text-left">{{ $ciclo->email }}</td>
                    <td class="p-1 text-left">
                        @foreach($ciclo->kjahdkwkbewtoip->sortby('id') as $tipo)
                        <small class="badge bg-{{ $tipo->color }}">{{ $tipo->nome }}</small>
                        @endforeach
                    </td>
                    <td class="p-1 text-right">
                        <x-icon.edit click="{{ $ciclo->id }}" />
                        &nbsp;
                        <x-icon.delete click="{{ $ciclo->id }}" />
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center"><small>Não há usuários cadastrados</small></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <div class="float-right">
            {{ $usuarios->links() }}
        </div>
    </div>
    {{--
        @include('livewire.configuracao.usuario.adicionar')
        @include('livewire.configuracao.usuario.edit')
    --}}
</div>
