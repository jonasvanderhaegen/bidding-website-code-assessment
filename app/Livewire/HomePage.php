<?php

namespace App\Livewire;

use App\Models\Lot;
use Livewire\Attributes\Computed;
use Livewire\Component;

class HomePage extends Component
{
    #[Computed()]
    public function featuredLots()
    {
        return Lot::whereStatus(true)->orderBy('priority', 'desc')->limit(3)->get();
    }

    public function render()
    {
        return view('livewire.home-page')->title('Home | BidVibe');
    }
}
