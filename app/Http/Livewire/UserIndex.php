<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-index', [
            'users' => $users,
        ]);
    }
}
