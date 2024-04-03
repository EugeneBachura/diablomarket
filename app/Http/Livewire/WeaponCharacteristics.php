<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WeaponCharacteristics extends Component
{

    public $characteristics = [];

    public function addCharacteristic()
    {
        $this->characteristics[] = '';
    }

    public function removeCharacteristic($index)
    {
        unset($this->characteristics[$index]);
    }


    public function render()
    {
        return view('livewire.weapon-characteristics');
    }
}
