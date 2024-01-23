<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboardPage extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard-page')->layout('components.layouts.admin');
    }
}
