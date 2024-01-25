<?php

namespace App\Livewire\Forms;

use App\Models\Lot;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditLotForm extends Form
{
    public ?Lot $lot;

    #[Validate('required')]
    public string $datetime_start = '';

    #[Validate('required')]
    public string $datetime_end = '';

    #[Validate('required|decimal:2')]
    public string $min_bid_amount = '';

    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required:string')]
    public string $meta_description = '';

    #[Validate('required|string')]
    public string $short_description = '';

    #[Validate('required|string')]
    public string $long_description = '';

    #[Validate('required|decimal:2')]
    public string $total_estimated_value = '';

    #[Validate('required|integer')]
    public int $priority;
    #[Validate('required|boolean')]
    public bool $status;

    #[Validate('required')]
    public string $state_id = '';

    public function setLot(Lot $lot)
    {
        $this->lot = $lot;
        $this->datetime_start = $lot->datetime_start;
        $this->datetime_end = $lot->datetime_end;
        $this->name = $lot->name;
        $this->total_estimated_value = $lot->total_estimated_value;
        $this->min_bid_amount = $lot->min_bid_amount;
        $this->meta_description = $lot->meta_description;
        $this->long_description = $lot->long_description;
        $this->short_description = $lot->short_description;
        $this->status = $lot->status;
        $this->state_id = $lot->state_id;
        $this->priority = $lot->priority;
    }

    public function update()
    {
        $this->lot->update(
            $this->all()
        );
    }

    public function store()
    {
        $this->validate();

        $this->lot->update($this->all());

        $this->reset();
    }
}
