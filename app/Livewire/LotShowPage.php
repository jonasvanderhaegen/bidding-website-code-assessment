<?php

namespace App\Livewire;

use App\Models\Lot;
use Livewire\Component;

class LotShowPage extends Component
{
    public Lot $lot;

    public function mount(Lot $lot)
    {

    }

    public function render()
    {
        return view('livewire.lot-show-page')->title( 'Lot:  ' . $this->lot->name . '| BidVibe');
    }
}
