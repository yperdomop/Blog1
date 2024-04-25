<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    // se cambia a creating para que se ejecute antes de eliminar el post
    public function creating(Post $post): void
    {
        if (!\App::runningInConsole()) {
            $post->user->id = auth()->user()->id;
        }
    }
    // se cambia a deleting para que se ejecute antes de eliminar el post
    public function deleting(Post $post): void
    {
        if ($post->image) {
            Storage::delete($post->image->url);
        }
    }
}
