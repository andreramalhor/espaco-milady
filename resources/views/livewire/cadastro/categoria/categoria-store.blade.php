@php
    $disabled = $errors->any() || empty($this->nome) ? true : false ;
@endphp

<section class="w-1/2 p-4 mx-auto space-y-4 shadow">    
    {{-- <x-alert.message /> --}}

    <h2 class="text-sm text-indigo-500 uppercase">
        Criar categoria
    </h2>
    
    <form wire:submit="store" class="space-y-4">
        {{-- Nome --}}
        <div class="space-y-4">
            <x-label for="nome" value="{{ __('nome') }}" />
            <x-input wire:model.live="nome" class="block w-full" type="text" />
            <x-input-error for="nome" />
        </div>

        {{-- Tipo --}}
        <div class="space-y-4">
            <x-label for="tipo" value="{{ __('tipo') }}" />
            <x-input wire:model.live="tipo" class="block w-full" type="text" />
            <x-input-error for="tipo" />
        </div>

        {{-- Descrição --}}
        <div class="space-y-4">
            <x-label for="descricao" value="{{ __('descricao') }}" />
            <x-input wire:model.live="descricao" class="block w-full" type="text" />
            <x-input-error for="descricao" />
        </div>

        {{-- Submit --}}
        <x-button wire:target="store" wire:loading.attr="disabled" type="submit" :disabled="$disabled">
            Criar
        </x-button>
    
    </form>
</section>