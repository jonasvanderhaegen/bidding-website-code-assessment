<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateBidForm;
use App\Models\Lot;
use Livewire\Component;

class LotShowPage extends Component
{
    public Lot $lot;
    public float $highestAmount;
    public CreateBidForm $form;

    public function save(): void
    {
        $this->form->store();
        $this->form->reset('amount');
    }

    public function highestBid(): void
    {
        $this->highestAmount = $this->lot->bids->last()->amount;
        $this->form->setHighestAmount($this->highestAmount);
    }

    public function mount(Lot $lot): void
    {
        $this->highestAmount = $this->lot->bids->last()->amount;

        $this->form->setLotId($lot->id);
        $this->form->setHighestAmount($this->highestAmount);
    }

    public function render()
    {
        return view('livewire.lot-show-page')->title( 'Lot:  ' . $this->lot->name . '| BidVibe');
    }
}
