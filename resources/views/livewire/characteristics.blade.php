<div class="characteristic-field">
    <x-input-label :value="__('Characteristics')" :color="__('primary')" />
    @foreach ($characteristics as $index => $characteristic)
    <div class="characteristic-field flex items-center relative">
        <x-text-input type="text" wire:model="characteristics.{{ $index }}" class="mt-1 block w-full characteristic-value" required />
        <x-delete-button wire:click="removeCharacteristic({{ $index }})" />
    </div>
    @endforeach

    <x-button type="button" wire:click="addCharacteristic" class="mt-4">Add Characteristic</x-button>
</div>
