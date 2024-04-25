<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap"; //utilice los estilos de bootstrap

    public $search = "";

    //resetear la pagina
    public function updatingsearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        //recuperamos todos los usuarios y los filtramos por nombre y correo
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orwhere('email', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);
        return view('livewire.admin.users-index', compact('users'));
    }
}
