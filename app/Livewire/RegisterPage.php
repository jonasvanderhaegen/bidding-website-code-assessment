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
    public function submitForm(): void
    {
        $validated = $this->form->validate();

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }

    public function render()
    {
        return view('livewire.register-page')->title('Register | BidVibe');
    }
}
