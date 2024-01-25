<?php

namespace App\Livewire\Forms;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|string|lowercase|email|max:255|unique:mysql.users,email')]
    public string $email;

    #[Rule('required|string|confirmed|min:8')]
    public string $password;

    #[Rule('required|string')]
    public string $password_confirmation;

    #[Rule('required|boolean')]
    public bool $terms_accepted;

    public function store()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($validated['password']);
        event(new Registered($user = User::create($validated)));

        Auth::login($user);
    }
}
