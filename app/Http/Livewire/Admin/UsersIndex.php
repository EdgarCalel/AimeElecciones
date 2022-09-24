<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

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
        $status = "hola desde el contralador";
        // $users = User::where('name', 'like', '%'.$this->search.'%')->paginate(4);
        $users = DB::table('users')
        ->where('is_estudiante', '=', 0)
        ->get();
        return view('livewire.admin.users-index', compact('users', 'status'));
    }
}
