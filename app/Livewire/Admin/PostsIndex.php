<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap"; //utilice los estilos de bootstrap

    public $search = "";
    public function updatingsearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(8);
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
