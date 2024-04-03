@props(['content'])

<div class="relative" x-data="{ show: false }" @mouseleave="show = false">
    <div class="cursor-help" @mouseover="show = true">
        @component('components.icons.question-mark-circle-mini')
        @endcomponent             
    </div>
    <div x-show="show" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute text-xs text-secondary p-2 top-0 left-6 transform -translate-x-1/2 -translate-y-full bg-primary rounded z-50 font-open-sans w-40 overflow-auto">
        {{ $content }}
    </div>
</div>