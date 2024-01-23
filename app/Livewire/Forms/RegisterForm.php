<?php

namespace App\Livewire\Forms;

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
}
