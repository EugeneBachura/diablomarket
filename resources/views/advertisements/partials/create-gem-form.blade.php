<div>
    <x-input-label for="gem_game_mod" :value="__('Game Mod')" :color="__('primary')" />
    <select id="gem_game_mod" name="gem_game_mod" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" onchange="updateForm()" required>
        <option value="standard" @if(old('gem_game_mod') === 'standard') selected @endif>Standard</option>
        <option value="standard_season" @if(old('gem_game_mod') === 'standard_season') selected @endif>Standard Season</option>
        <option value="hardcore" @if(old('gem_game_mod') === 'hardcore') selected @endif>Hardcore</option>
        <option value="hardcore_season" @if(old('gem_game_mod') === 'hardcore_season') selected @endif>Hardcore Season</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('gem_game_mod')" />
</div>


<div>
    <x-input-label for="gem_qualities" :value="__('Gem Rarity')" :color="__('primary')" />
    <select id="gem_qualities" name="gem_qualities" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        <option value="crude">Crude</option>
        <option value="chipped">Chipped</option>
        <option value="regular">Regular</option>
        <option value="flawless">Flawless</option>
        <option value="royal">Royal</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('gem_qualities')" />
</div>

<div>
    <x-input-label for="gem_type" :value="__('Gem Type')" :color="__('primary')" />
    <select id="gem_type" name="gem_type" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        <option value="ruby">Ruby</option>
        <option value="sapphire">Sapphire</option>
        <option value="topaz">Topaz</option>
        <option value="emerald">Emerald</option>
        <option value="amethyst">Amethyst</option>
        <option value="diamond">Diamond</option>
        <option value="skull">Skull</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('gem_type')" />
</div>

<div>
    <x-input-label for="gem_count" :value="__('Gem Count')" :color="__('primary')" />
    <x-text-input id="gem_count" name="gem_count" type="number" class="mt-1 block w-full" :value="old('gem_count')" required />
    <x-input-error class="mt-2" :messages="$errors->get('gem_count')" />
</div>

<div>
    <x-input-label for="gem_price" :value="__('Price per Gem')" :color="__('primary')" />
    <x-text-input id="gem_price" name="gem_price" type="number" class="mt-1 block w-full" :value="old('gem_price')" required />
    <x-input-error class="mt-2" :messages="$errors->get('gem_price')" />
</div>