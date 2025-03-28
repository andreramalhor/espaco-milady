<div>
    <div class="block rounded-lg bg-white shadow-secondary-1 dark:bg-surface-dark dark:text-white text-surface">        
        <div class="border-b-2 border-neutral-100 px-6 py-3 dark:border-white/10">
            Categorias
        </div>
        <div class="p-6">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-surface dark:text-white table-striped">
                    <thead class="border-b border-neutral-200 bg-[#332D2D] font-medium dark:border-white/10 text-left">
                        <tr>
                            <th scope="col" class="p-2">#</th>
                            <th scope="col" class="p-2">Nome</th>
                            <th scope="col" class="p-2">Tipo</th>
                            <th scope="col" class="p-2">Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr class="border-b bg-black/[0.02] border-neutral-200 dark:border-white/10">
                            <td class="whitespace-nowrap p-2 font-medium">{{ $categoria->id() }}</td>
                            <td class="whitespace-nowrap p-2">{{ $categoria->nome() }}</td>
                            <td class="whitespace-nowrap p-2">{{ $categoria->tipo() }}</td>
                            <td class="whitespace-nowrap p-2">{{ $categoria->descricao() }}</td>
                            <td class="flex space-x-4">
                                {{-- Edit Button --}}
                                {{-- 
                                    <livewire:categorias.edit :categoria="$categoria" :wire:key="'edit-categoria'. now() . $categoria->id()" />
                                --}}            
                                {{-- Delete Button --}}
                                <livewire:Catalogo.Categoria.CategoriaDelete :categoria="$categoria" :wire:key="'delete-categoria-'. $categoria->id()">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="border-t-2 border-neutral-100 px-6 py-3 text-surface/75 dark:border-white/10 dark:text-neutral-300">
            2 days ago
        </div>
    </div>
        
    <div class="overflow-hidden border border-gray-200 shadow sm:rounded-lg">
        
        {{-- Livewire Store Component --}}
        {{-- 
            <livewire:categorias.create :key="'categoria-create'" />
        --}}
        <a class="mr-2 transition duration-500 ease-in-out hover:text-gray-900" href="{{ route('CategoriaStore') }}" title="Categoria">Criar Categoria</i></a>
        
        
        <div class="flex w-full p-3 space-x-2">
            {{-- Search Box --}}
            <div class="w-3/6">
                <input wire:model.debounce.500ms="search" type="text" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded shadow-inner outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-50" placeholder="Search categorias....">
            </div>
            
            {{-- Order by --}}
            <div class="relative w-1/6">
                <select wire:model.live="orderBy" id="orderBy" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-50 ">
                    <option value="id">ID</option>
                    <option value="nome">Nome</option>
                    <option value="tipo">Tipo</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                </div>
            </div>
            
            {{-- Order Asc --}}
            <div class="relative w-1/6">
                <select wire:model.live="orderAsc" id="orderAsc" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-50 ">
                    <option value="1">Ascending</option>
                    <option value="0">Descending</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                </div>
            </div>
            
            {{-- Per Page --}}
            <div class="relative w-1/6">
                <select wire:model.live="perPage" id="perPage" class="relative w-full px-3 py-3 pl-10 text-sm text-gray-700 placeholder-gray-400 bg-gray-100 border-none rounded outline-none focus:outline-none focus:shadow-outline focus:ring-0 focus:bg-indigo-50">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                </div>
            </div>
        </div>
        
        <div class="overflow-hidden shadow">
            <table class="w-full divide-y divide-gray-200 table-fixed">
                <thead class="font-bold tracking-wide text-gray-500 bg-indigo-100">
                    <tr class="text-xs tracking-wider text-center uppercase">
                        <th class="w-1/12 p-2">
                            Id
                        </th>
                        <th class="w-1/3 p-2">
                            Name
                        </th>
                        
                        <th class="w-1/6 p-2">
                            Created Date
                        </th>
                        
                        <th class="w-1/6 p-2">
                            Actions
                        </th>
                    </tr>
                </thead>
                
                <tbody class="text-xs divide-y divide-gray-200 bg-gray-50">
                </tbody>
            </table>
                
            <div class="p-2 bg-indigo-50">
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Browser Event
    const sweetAlertFire = function(e) {
        Swal.fire({
            title: e.detail.title
            , icon: e.detail.icon
            , iconColor: e.detail.iconColor
            , timer: 3000
            , toast: true
            , position: 'top-right'
            , timerProgressBar: true
            , showConfirmButton: false
            , });
        }
        
        window.addEventListener('updated', sweetAlertFire, false);
        window.addEventListener('categoriaDeleted', sweetAlertFire, false);
        
    </script>
@endpush
