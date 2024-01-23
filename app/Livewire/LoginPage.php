<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class LoginPage extends Component
{
    public LoginForm $form;

    public function submitForm(): void
    {
        $this->validate();

        $this->form->authenticate();

        session()->regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }

    public function render()
    {
        return view('livewire.login-page')->title('Login | BidVibe');
    }
}
