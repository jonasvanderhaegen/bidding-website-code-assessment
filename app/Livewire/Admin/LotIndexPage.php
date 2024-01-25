<?php

namespace App\Livewire\Admin;

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
        return Lot::where('name', 'like', "%{$this->search}%")->paginate(4);
    }

    public function delete(Lot $lot)
    {
        $lot->delete();
    }

    public function render()
    {
        $this->authorize('index', Lot::class);

        return view('livewire.admin.lot-index-page');
    }
}
