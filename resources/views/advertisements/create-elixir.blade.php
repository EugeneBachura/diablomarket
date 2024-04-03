
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Elixir Advertisement') }}
        </h2>
    </x-slot>

    <div class="pr-6 pl-6 pb-6 text-primary">
        <div class="flex">
            <div class="flex-1 space-y-6">
        
                <form method="POST" id="elixir-form" name="elixir-form" action="{{ route('advertisements.storeElixir') }}" class="space-y-6">
                    @csrf
        
                    <div id="elixir-fields" class="item-fields space-y-6">
                        @include('advertisements.partials.create-elixir-form')
                        <div class="flex items-center gap-4">
                            <x-primary-button type="submit" form="elixir-form" id="createAdvertisementElixirButton">{{ __('Create Advertisement') }}</x-primary-button>
                        </div>
                    </div>
                </form>
        
            </div>
        
            <div class="flex-none pl-12 pr-6 pt-12">
                @livewire('item-block')
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let elixirForm = document.getElementById('elixir-form');
            let elixirTitle = document.getElementById('elixir_title');
            let elixirDescription = document.getElementById('elixir_description');
            let elixirCount = document.getElementById('elixir_count');
            let elixirPrice = document.getElementById('elixir_price');
            let elixirId = document.getElementById('elixir_id');
    
            elixirForm.addEventListener('change', function() {
                let title = elixirTitle.value;
                let content = elixirDescription.value;
                let count = elixirCount.value;
                let price = elixirPrice.value;
                let id = elixirId.value ? elixirId.value : null;
    
                Livewire.emit('updateElixir', { elixir_title: title, elixir_description: content, elixir_count: count, elixir_price: price, elixir_id: id });
            });
    
            // Выполнить скрипт при загрузке страницы
            let title = elixirTitle.value;
            let content = elixirDescription.value;
            let count = elixirCount.value;
            let price = elixirPrice.value;
            let id = elixirId.value ? elixirId.value : null;
    
            Livewire.emit('updateElixir', { elixir_title: title, elixir_description: content, elixir_count: count, elixir_price: price, elixir_id: id });
        });
    </script>
</x-app-layout>