<?php

namespace App\Livewire\Forms;
use App\Models\Lot;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateLotForm extends Form
{
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
    public int $priority = 1;
    #[Validate('required|boolean')]
    public bool $status = false;

    #[Validate('required')]
    public string $state_id = '';

    public function store()
    {
        $this->all();
        $this->validate();

        $lot = Lot::create($this->all());
        ray($lot);

        $this->reset();
    }
}
