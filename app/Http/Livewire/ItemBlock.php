<?php

namespace App\Http\Livewire;

use App\Models\Elixir;
use App\Models\Gem;
use Livewire\Component;

class ItemBlock extends Component
{

    public $title, $content, $footer, $image, $background;

    protected $listeners = ['updateElixir' => 'updateElixir', 'updateGem' => 'updateGem', 'updateEquipment' => 'updateEquipment'];

    public function updateElixir($data)
    {
        if (strlen($data['elixir_title']) > 25) {
            $size_title = 2;
        } else $size_title = 1;
        $this->title = '<p class="text-lg font-diablo-light pt-' . 7 * $size_title . ($size_title == 1 ? ' h-[105px]' : ' h-full') . ' pr-24 pl-8 absolute top-0 flex items-center">' . $data['elixir_title'] . '</p>';

        $elixir = Elixir::where('id', $data['elixir_id'])->first();

        $img = url('/') . '/' . 'default.webp';
        if ($data['elixir_id']) {
            $img = $elixir ? url('/') . '/' . $elixir->image : $img;
        };
        $this->image = '<img class="absolute top-6 right-8" src="' . $img . '" alt="" srcset="" width="60">';

        $hrIcon = view('components.icons.hr')->render();
        $this->content = '<div class="pt-4"></div>' . $hrIcon . '<p class="text-base font-alegreya pt-2">' . $data['elixir_description'] . '</p>';

        $price = '';
        $count = '';
        if ($data['elixir_count']) {
            $count = '<div><olive>Count</olive>:  ' . $data['elixir_count'] . '</div>';
        }
        if ($data['elixir_price']) {
            $goldIcon = view('components.icons.gold')->render();
            $price = '<div class="flex justify-end"><olive>Price</olive>:  ' . $data['elixir_price'] . $goldIcon . '</span></div>';
        }
        if ($price != '' || $count != '') {
            $this->footer = $hrIcon . '<div class="mt-2"></div>' . $count . $price;
        } else $this->footer = '';

        $this->background = 'background-image: url(' . url('/') . '/texture2.jpg);';
    }

    public function updateGem($data)
    {
        $title = '';
        if ($data['gem_qualities'] == 'regular') {
            $title = $data['gem_type'];
        } else $title = $data['gem_qualities'] . ' ' . $data['gem_type'];
        $this->title = '<p class="text-lg font-diablo-light pt-8 pr-24 pl-8 absolute top-0 h-full flex items-center">' . $title . '</p>';

        $gem = Gem::where('title', $title)->first();

        $img = $gem ? $gem->image : null;
        $this->image = '<img class="absolute top-6 right-8" src="' . url('/') . '/' . $img . '" alt="" srcset="" width="75">';
        $weapon_buff = $gem ? $gem->weapon : null;
        $armor_buff = $gem ? $gem->armor : null;
        $jewelry_buff = $gem ? $gem->jewelry : null;

        $description = $gem ? $gem->description : null;
        $requires_lvl = $gem ? 'Requires Level ' . $gem->required_level : null;

        $hrIcon = view('components.icons.hr')->render();

        $this->content = $hrIcon . '<p class="text-base font-alegreya pt-2"><gray>Weapon</gray>: ' . $weapon_buff . '<br>' .
            '<gray>Armor</gray>: ' . $armor_buff . '<br>' .
            '<gray>Jewelry</gray>: ' . $jewelry_buff . '</p><p class="text-base font-alegreya pt-2">' . $description . '</p><p class="text-sm text-right font-alegreya pt-2">' . $requires_lvl . '</p>';

        $price = '';
        $count = '';
        if ($data['gem_count']) {
            $count = '<div><olive>Count</olive>:  ' . $data['gem_count'] . '</div>';
        }
        if ($data['gem_price']) {
            $goldIcon = view('components.icons.gold')->render();
            $price = '<div class="flex justify-end"><olive>Price</olive>:  ' . $data['gem_price'] . $goldIcon . '</span></div>';
        }
        if ($price != '' || $count != '') {
            $this->footer = $hrIcon . '<div class="mt-2"></div>' . $count . $price;
        } else $this->footer = '';

        $this->background = 'background-image: url(' . url('/') . '/texture3.jpg);';
    }

    public function updateEquipment($data)
    {
        if (strlen($data['equipment_title']) > 25) {
            $size_title = 2;
        } else $size_title = 1;
        $this->title = '<p class="text-lg font-diablo-light pt-' . 7 * $size_title . ($size_title == 1 ? ' h-[105px]' : ' h-full') . ' pr-24 pl-8 absolute top-0 flex items-center"><gold>' . $data['equipment_title'] . '</gold></p>';
        $this->image = '<img class="absolute top-6 right-8" src="' . url('/') . '/' . $data['equipment_image'] . '" alt="" srcset="" width="60">';

        $hrIcon = view('components.icons.hr')->render();
        $itemLvl = $data['equipment_gear'] ? '<div class="text-base font-alegreya"><olive>' . $data['equipment_gear'] . ' Item Power</olive></div>' : '';
        $rareType = $data['equipment_type'] ? '<div class="text-base font-alegreya"><gold>Rare ' . $data['equipment_type'] . '</gold></div>' : '';

        $description = $data['equipment_description'] ? '"' . $data['equipment_description'] . '"' : '';

        $characteristics = '<p class="text-base font-alegreya pt-2">';

        $item_icon = view('components.icons.item')->render();
        foreach ($data['equipment_characteristics'] as $key => $characteristic) {
            if ($key > 0) {
                $characteristics .= '<div class="flex items-center">' . $item_icon . $characteristic . '</div>';
            }
        }
        $characteristics .= '</p>';

        $this->content = '<div class="pt-' . 2 * $size_title . '"></div>' . $rareType . $itemLvl . $hrIcon . $characteristics .  '<p class="text-base font-alegreya pt-2"><gray>' . $description . '</gray></p>';

        $price = '';
        $slot = '';
        if ($data['equipment_price']) {
            $goldIcon = view('components.icons.gold')->render();
            $price = '<div class="flex justify-end"><olive>Price</olive>:  ' . $data['equipment_price'] . $goldIcon . '</span></div>';
        }
        if ($data['equipment_slot']) {
            $slot = '<div class="flex justify-end"><olive>Slot</olive>:  ' . $data['equipment_slot'] . '</span></div>';
        }
        if ($data['equipment_price'] || $data['equipment_slot']) {
            $this->footer = $hrIcon . '<div class="mt-2"></div>' . $price . $slot;
        } else {
            $this->footer = '';
        }

        $this->background = 'background-image: url(' . url('/') . '/texture1.jpg);';
    }

    public function render()
    {
        return view('livewire.item-block');
    }
}
