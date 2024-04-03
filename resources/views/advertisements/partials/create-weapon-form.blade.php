<div>
    <x-input-label for="weapon_title" :value="__('Equipment Title')" :color="__('primary')" />
    <x-text-input id="weapon_title" name="weapon_title" type="text" class="mt-1 block w-full" :value="old('weapon_title')" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_title')" />
</div>

<div class="hidden">
    <x-input-label for="weapon_image" :value="__('Elixir Image')" :color="__('primary')" />
    <x-text-input id="weapon_image" name="weapon_image" type="text" class="mt-1 block w-full" :value="old('weapon_image')" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_image')" />
</div>

<div>
    <x-input-label for="weapon_type" :value="__('Equipment Type')" :color="__('primary')" />
    <x-text-input id="weapon_type" name="weapon_type" type="text" class="mt-1 block w-full" :value="old('weapon_type')" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_type')" />
</div>

<div>
    <x-input-label for="weapon_slot" :value="__('Equipment Slot')" :color="__('primary')" />
    <x-text-input id="weapon_slot" name="weapon_slot" type="text" class="mt-1 block w-full" :value="old('weapon_slot')" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_slot')" />
</div>

<livewire:weapon-characteristics />

<div>
    <x-input-label for="weapon_description" :value="__('Equipment Description')" :color="__('primary')" />
    <x-text-input id="weapon_description" name="weapon_description" type="text" class="mt-1 block w-full" :value="old('weapon_description')" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_description')" />
</div>

<div>
    <x-input-label for="weapon_gear" :value="__('Item Level')" :color="__('primary')" />
    <x-text-input id="weapon_gear" name="gear" type="number" class="mt-1 block w-full" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_gear')" />
</div>

<div>
    <x-input-label for="weapon_price" :value="__('Equipment Price')" :color="__('primary')" />
    <x-text-input id="weapon_price" name="price" type="number" class="mt-1 block w-full" required />
    <x-input-error class="mt-2" :messages="$errors->get('weapon_price')" />
</div>

<script>
    $( function() {
        var weaponImage = $('#weapon_image');
        var weaponDescription = $('#weapon_description');
        var weaponId = $('#weapon_id');
        $( "#weapon_title" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('weapons.search') }}",
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return {
                                label: obj.title,
                                image: obj.image,
                                id: obj.id,
                                description: obj.description
                            }
                        }); 
    
                        response(resp);
                    }
                });
            },
            minLength: 3,
            create: function() {
                $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                    var imageSrc = item.image ? "{{ url('/') }}"  + '/' + item.image : "default.webp";
                    return $('<li class="my-class border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">')
                        .append('<div class="flex items-center"><img src="' + imageSrc + '" class="mr-2" width="25" height="25">' + item.label + '</div>')
                        .appendTo(ul);
                        
                };
                $(".ui-autocomplete").removeClass("ui-front");
                $(".ui-autocomplete").addClass("z-10");
            },
            select: function(event, ui) {
                weaponImage.val(ui.item.image);
                weaponId.val(ui.item.id);
                weaponDescription.val(ui.item.description);
            }
        });
    } );
</script>