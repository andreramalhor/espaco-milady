<div class="h-screen flex flex-row flex-wrap">
    
    <x-partials.tailwind.sidebar />
    
    <div class="bg-gray-100 flex-1 p-3 md:mt-16">      
        <main class="my-3">
            {{ $slot ?? 'SLOT' }}
        </main>
        {{-- 
            <div class="grid grid-cols-3 gap-3 xl:grid-cols-2">
                <x-tailwind.card>
                    teste
                </x-tailwind.card>
            </div>
        --}}
    </div>    
</div>
