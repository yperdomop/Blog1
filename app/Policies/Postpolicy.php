<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Postpolicy
{
    /**
     * Reglas de autorización por seguridad el usuario no pueda cambiar la url
     */
    use HandlesAuthorization;

    public function author(User $user, Post $post)
    {
        if ($user->id == $post->user_id) {
            return true;
        } else {
            return false;
        }
    }
    /* verificar antes de subir el post si se encuentra publicado xq el usuario puede cambiar la url
    colocamos el signo de pregunta para decir que es opcional */

    public function published(?User $user, Post $post)
    {
        if ($post->status == 2) {
            return true;
        } else {
            return false;
        }
    }
}
