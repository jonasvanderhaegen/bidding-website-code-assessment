<?php

namespace App\Livewire\Admin;

use App\Models\Lot;
use Livewire\Component;

class LotShowPage extends Component
{
    public function mount(Lot $lot)
    {

    }

    public function render()
    {
        $this->authorize('view', $this->lot);

        return view('livewire.admin.lot-show-page');
    }
}
