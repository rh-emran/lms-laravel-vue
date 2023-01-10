<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-index', [
            'users' => $users,
        ]);
    }
}
