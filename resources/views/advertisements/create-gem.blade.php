
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Gem Advertisement') }}
        </h2>
    </x-slot>

    <div class="pr-6 pl-6 pb-6 text-primary">
        <div class="flex">
            <div class="flex-1 space-y-6">
        
                <form method="POST" id="gem-form" name="gem-form" action="{{ route('advertisements.storeGem') }}" class="space-y-6">
                    @csrf
        
                    <div id="gem-fields" class="item-fields space-y-6">
                        @include('advertisements.partials.create-gem-form')
                        <div class="flex items-center gap-4">
                            <x-primary-button type="submit" form="gem-form" id="createAdvertisementElixirButton">{{ __('Create Advertisement') }}</x-primary-button>
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
            let gemForm = document.getElementById('gem-form');
            let gem_qualities = document.getElementById('gem_qualities');
            let gem_type = document.getElementById('gem_type');
            let gem_price = document.getElementById('gem_price');
            let gem_count = document.getElementById('gem_count');

            gemForm.addEventListener('change', function() {
                let qualities = gem_qualities.value;
                let type = gem_type.value;
                let price = gem_price.value;
                let count = gem_count.value;
                Livewire.emit('updateGem', { gem_qualities: qualities, gem_type: type, gem_price: price, gem_count: count });
            });

            let qualities = gem_qualities.value;
            let type = gem_type.value;
            let price = gem_price.value;
            let count = gem_count.value;
            Livewire.emit('updateGem', { gem_qualities: qualities, gem_type: type, gem_price: price, gem_count: count });
    });
    </script>
</x-app-layout>