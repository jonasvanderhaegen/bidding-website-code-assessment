<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\EditLotForm;
use App\Models\Lot;
use App\Models\State;
use Illuminate\View\View;
use Livewire\Component;

class LotEditPage extends Component
{
    public $lot;
    public $states = [];
    public EditLotForm $form;

    public function save(): void
    {
        $this->form->update();
    }

    public function mount(Lot $lot): void
    {
        $this->states = State::whereIn('model', ['lot', 'lotitem'])->get();

        $this->lot = $lot;

        $this->form->setLot($lot);
    }

    public function render(): View
    {
        $this->authorize('update', $this->lot);

        return view('livewire.admin.lot-edit-page');
    }
}
