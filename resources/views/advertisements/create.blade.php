
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New advertisements') }}
        </h2>
    </x-slot>

    

    <div class="pr-6 pl-6 pb-6 text-primary">
        @include('advertisements.partials.create-adv')
    </div>
</x-app-layout>