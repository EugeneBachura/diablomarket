<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Ads') }}
        </h2>
    </x-slot>

    
    <div class="p-6 text-gray-900">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        {{-- {{ __("You're logged in!") }} --}}
    </div>
</x-app-layout>
