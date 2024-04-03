<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EquipmentCharacteristics extends Component
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
        return view('livewire.characteristics');
    }
}
