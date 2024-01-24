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
        if ($this->lot->bids->count()) {
            $this->highestAmount = $this->lot->bids->last()->amount;
            $this->form->setHighestAmount($this->highestAmount);
        }
    }

    public function mount(Lot $lot): void
    {
        if ($this->lot->bids->count()) {
            $this->highestAmount = $lot->bids->last()->amount > $lot->min_bid_amount ? $lot->bids->last()->amount : $lot->min_bid_amount;
            $this->form->setHighestAmount($this->highestAmount);
        } else {
            $this->highestAmount = $lot->min_bid_amount;
            $this->form->setHighestAmount($this->highestAmount);
        }
        $this->form->setLotId($lot->id);
    }

    public function render()
    {
        return view('livewire.lot-show-page')->title( 'Lot:  ' . $this->lot->name . '| BidVibe');
    }
}
