<div>
    <x-input-label for="equipment_title" :value="__('Equipment Title')" :color="__('primary')" />
    <x-text-input id="equipment_title" name="equipment_title" type="text" class="mt-1 block w-full" :value="old('equipment_title')" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_title')" />
</div>

<div class="hidden">
    <x-input-label for="equipment_image" :value="__('Elixir Image')" :color="__('primary')" />
    <x-text-input id="equipment_image" name="equipment_image" type="text" class="mt-1 block w-full" :value="old('equipment_image')" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_image')" />
</div>

<div>
    <x-input-label for="equipment_type" :value="__('Equipment Type')" :color="__('primary')" />
    <x-text-input id="equipment_type" name="equipment_type" type="text" class="mt-1 block w-full" :value="old('equipment_type')" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_type')" />
</div>

<div>
    <x-input-label for="equipment_slot" :value="__('Equipment Slot')" :color="__('primary')" />
    <x-text-input id="equipment_slot" name="equipment_slot" type="text" class="mt-1 block w-full" :value="old('equipment_slot')" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_slot')" />
</div>

<livewire:equipment-characteristics />

<div>
    <x-input-label for="equipment_description" :value="__('Equipment Description')" :color="__('primary')" />
    <x-text-input id="equipment_description" name="equipment_description" type="text" class="mt-1 block w-full" :value="old('equipment_description')" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_description')" />
</div>

<div>
    <x-input-label for="equipment_gear" :value="__('Item Level')" :color="__('primary')" />
    <x-text-input id="equipment_gear" name="gear" type="number" class="mt-1 block w-full" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_gear')" />
</div>

<div>
    <x-input-label for="equipment_price" :value="__('Equipment Price')" :color="__('primary')" />
    <x-text-input id="equipment_price" name="price" type="number" class="mt-1 block w-full" required />
    <x-input-error class="mt-2" :messages="$errors->get('equipment_price')" />
</div>

<script>
    $( function() {
        var equipmentImage = $('#equipment_image');
        var equipmentDescription = $('#equipment_description');
        var equipmentId = $('#equipment_id');
        $( "#equipment_title" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('equipments.search') }}",
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
                equipmentImage.val(ui.item.image);
                equipmentId.val(ui.item.id);
                equipmentDescription.val(ui.item.description);
            }
        });
    } );
</script>