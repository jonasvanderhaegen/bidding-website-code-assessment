<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\CreateLotForm;
use App\Models\Lot;
use App\Models\State;
use Livewire\Component;

class LotCreatePage extends Component
{

    public $states = [];

    public CreateLotForm $form;

    public function save(): void
    {
        $this->form->store();
    }

    public function mount()
    {
        $this->states = State::whereIn('model', ['lot', 'lotitem'])->get();
    }

    public function render()
    {
        $this->authorize('create', Lot::class);

        return view('livewire.admin.lot-create-page');
    }
}
