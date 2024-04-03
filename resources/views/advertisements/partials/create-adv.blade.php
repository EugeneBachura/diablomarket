<div class="flex">
    <div class="pt-6 flex-1 space-y-6">

        {{-- @if ($errors)
            <div class="mt-4">
                <ul class="list-disc list-inside text-red">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div>
            <x-input-label for="item_type" :value="__('Item Type')" :color="__('primary')" />
            <select id="item_type" name="item_type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" onchange="updateForm()" required>
                <option value="gem" @if(old('item_type') === 'gem' || (isset($itemType) && $itemType === 'gem')) selected @endif>Gem</option>
                <option value="equipment" @if(old('item_type') === 'equipment' || (isset($itemType) && $itemType === 'equipment')) selected @endif>Equipment</option>
                <option value="weapon" @if(old('item_type') === 'weapon' || (isset($itemType) && $itemType === 'weapon')) selected @endif>Weapon</option>
                <option value="elixir" @if(old('item_type') === 'elixir' || (isset($itemType) && $itemType === 'elixir')) selected @endif>Elixir</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('item_type')" />
        </div>

        
        <form method="POST" id="gem-form" action="{{ route('advertisements.storeGem') }}" class="space-y-6">
            @csrf

            <div id="gem-fields" class="item-fields space-y-6">
                @include('advertisements.partials.create-gem-form')
            </div>
        </form>

        <form method="POST" id="equipment-form" action="{{ route('advertisements.storeEquipment') }}" class="space-y-6">
            @csrf

            <div id="equipment-fields" class="item-fields space-y-6" style="display: none;">
                @include('advertisements.partials.create-equipment-form')
            </div>
        </form>

        <form method="POST" id="weapon-form" action="{{ route('advertisements.storeWeapon') }}" class="space-y-6">
            @csrf

            <div id="weapon-fields" class="item-fields space-y-6" style="display: none;">
                @include('advertisements.partials.create-weapon-form')
            </div>
        </form>

        <form method="POST" id="elixir-form" name="elixir-form" action="{{ route('advertisements.storeElixir') }}" class="space-y-6">
            @csrf

            <div id="elixir-fields" class="item-fields space-y-6" style="display: none;">
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

<script>
    function updateForm() {
        var itemType = document.getElementById('item_type').value;
        var itemFields = document.getElementsByClassName('item-fields');
        for (var i = 0; i < itemFields.length; i++) {
            if (itemFields[i].id == itemType + '-fields') {
                itemFields[i].style.display = 'block';
            } else {
                itemFields[i].style.display = 'none';
            }
        }
    }
    // document.addEventListener('DOMContentLoaded', function() {
    //     // var itemType = "{{ old('item_type', $itemType ?? '') }}";
    //     var itemType = "elixir";
    //     var itemSelect = document.getElementById('item_type');

    //     for (var i = 0; i < itemSelect.options.length; i++) {
    //         var option = itemSelect.options[i];
    //         option.selected = option.value === itemType;
    //     }
    //     updateForm();
    // });
</script>
<script>
    document.getElementById('elixir-form').addEventListener('change', function() {
        let title = document.getElementById('elixir_title').value;
        let content = document.getElementById('elixir_description').value;
        let count = document.getElementById('elixir_count').value;
        let price = document.getElementById('elixir_price').value;
        let id = document.getElementById('elixir_id').value ? document.getElementById('elixir_id').value : null;

        Livewire.emit('updateElixir', { elixir_title: title, elixir_description: content, elixir_count: count, elixir_price: price, elixir_id: id });
    });
    document.getElementById('gem-form').addEventListener('change', function() {
        let gem_qualities = document.getElementById('gem_qualities').value;
        let gem_type = document.getElementById('gem_type').value;
        let gem_price = document.getElementById('gem_price').value;
        let gem_count = document.getElementById('gem_count').value;

        Livewire.emit('updateGem', { gem_qualities: gem_qualities, gem_type: gem_type, gem_price: gem_price, gem_count: gem_count });
    });
    document.getElementById('equipment-form').addEventListener('change', function() {
        let equipment_title = document.getElementById('equipment_title').value;
        let equipment_image = document.getElementById('equipment_image').value;
        let equipment_type = document.getElementById('equipment_type').value;
        let equipment_slot = document.getElementById('equipment_slot').value;
        let equipment_price = document.getElementById('equipment_price').value;
        let equipment_description = document.getElementById('equipment_description').value;
        let equipment_gear = document.getElementById('equipment_gear').value;

        let characteristicFields = document.getElementsByClassName('characteristic-field');
        let equipment_characteristics = [];
        for (let i = 0; i < characteristicFields.length; i++) {
            let characteristicValueElement = characteristicFields[i].querySelector('.characteristic-value');
            let characteristicValue = characteristicValueElement ? characteristicValueElement.value : null;
            equipment_characteristics.push(characteristicValue);
        }
        console.log(equipment_characteristics);

        Livewire.emit('updateEquipment', { equipment_title: equipment_title, equipment_image: equipment_image, equipment_slot: equipment_slot, equipment_type: equipment_type, equipment_price: equipment_price, equipment_description: equipment_description, equipment_gear: equipment_gear, equipment_characteristics: equipment_characteristics });
    });
</script>