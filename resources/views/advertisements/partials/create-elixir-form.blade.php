<div>
    <x-input-label for="elixir_game_mod" :value="__('Game Mod')" :color="__('primary')" />
    <select id="elixir_game_mod" name="elixir_game_mod" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" onchange="updateForm()" required>
        <option value="standard" @if(old('elixir_game_mod') === 'standard') selected @endif>Standard</option>
        <option value="standard_season" @if(old('elixir_game_mod') === 'standard_season') selected @endif>Standard Season</option>
        <option value="hardcore" @if(old('elixir_game_mod') === 'hardcore') selected @endif>Hardcore</option>
        <option value="hardcore_season" @if(old('elixir_game_mod') === 'hardcore_season') selected @endif>Hardcore Season</option>
    </select>
    <x-input-error class="mt-2" :messages="$errors->get('elixir_game_mod')" />
</div>

<div>
    <x-input-label for="elixir_title" :value="__('Elixir Title')" :color="__('primary')" />
    <x-text-input id="elixir_title" name="elixir_title" type="text" class="mt-1 block w-full" :value="old('elixir_title')" required />
    <x-input-error class="mt-2" :messages="$errors->get('elixir_title')" />
</div>

<div class="hidden">
    <x-input-label for="elixir_id" :value="__('Elixir Id')" :color="__('primary')" />
    <x-text-input id="elixir_id" name="elixir_id" type="text" class="mt-1 block w-full" :value="old('elixir_id')" />
    <x-input-error class="mt-2" :messages="$errors->get('elixir_id')" />
</div>

<div>
    <x-input-label for="elixir_description" :value="__('Elexir Description')" :color="__('primary')" />
    <x-text-input id="elixir_description" name="elixir_description" type="text" class="mt-1 block w-full" :value="old('elixir_description')" required />
    <x-input-error class="mt-2" :messages="$errors->get('elixir_description')" />
</div>

<div>
    <x-input-label for="elixir_count" :value="__('Elexir Count')" :color="__('primary')" />
    <x-text-input id="elixir_count" name="elixir_count" type="number" class="mt-1 block w-full" :value="old('elixir_count')" required />
    <x-input-error class="mt-2" :messages="$errors->get('elixir_count')" />
</div>

<div>
    <x-input-label for="elixir_price" :value="__('Price')" :color="__('primary')" />
    <x-text-input id="elixir_price" name="elixir_price" type="number" min="0" step="1" class="mt-1 block w-full" :value="old('elixir_price')" required />
    <x-input-error class="mt-2" :messages="$errors->get('elixir_price')" />
</div>

<script>
    $( function() {
        var elixirImage = $('#elixir_image');
        var elixirDescription = $('#elixir_description');
        var elixirId = $('#elixir_id');
        $( "#elixir_title" ).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('elixirs.search') }}",
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            return {
                                label: obj.title,
                                id: obj.id,
                                image: obj.image,
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
                elixirImage.val(ui.item.image);
                elixirId.val(ui.item.id);
                elixirDescription.val(ui.item.description);
            }
        });
    } );
</script>