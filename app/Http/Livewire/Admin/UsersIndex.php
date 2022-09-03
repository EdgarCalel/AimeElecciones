<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
 
    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
      

        return view('livewire.admin.users-index', [
            'users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(4),
        ]);
    }
}
