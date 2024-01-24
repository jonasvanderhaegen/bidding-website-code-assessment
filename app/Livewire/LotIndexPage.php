<?php

namespace App\Livewire;

use App\Models\Lot;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class LotIndexPage extends Component
{
    use WithPagination;
    #[Url()]
    public $search;

    #[Computed()]
    public function lots()
    {
        return Lot::whereStatus(true)->orderBy('priority', 'desc')->where('name', 'like', "%{$this->search}%")->paginate(3);
    }

    public function render()
    {
        return view('livewire.lot-index-page')->title('All Lots | BidVibe');
    }
}
