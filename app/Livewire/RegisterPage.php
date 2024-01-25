<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterPage extends Component
{
    public RegisterForm $form;

    public function save(): void
    {
        $validated = $this->form->store();
        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }

    public function render()
    {
        return view('livewire.register-page')->title('Register | BidVibe');
    }
}
