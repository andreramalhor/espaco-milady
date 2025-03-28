<div class="card mt-6">
    <!-- header -->
    <div class="card-header flex flex-row justify-between">
        <h1 class="h6">
            {{ $card_title ?? 'Título do Card' }}
        </h1>
        
        <x-slot name="tools">

            <div class="flex flex-row justify-center items-center">

                {{ $card_tools ?? '' }}
                
            </div>

        </x-slot>

    </div>
    <!-- end header -->

    <!-- body -->
    <div class="card-body">

        {{ $slot ?? 'body card' }}

    </div>
    <!-- end body -->

</div>