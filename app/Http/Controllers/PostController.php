<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class PostController extends Controller

//recuperamos todos los posts de la BD
{
    public function index()
    {

        $posts = Post::where('status', 2)->latest('id')->paginate(8);
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        $this->authorize('published', $post);

        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            //para que no me repita el nombre del post principal
            ->where('id', '!=', $post->id)
            //organice deendente
            ->latest('id')
            //me traiga solo 4
            ->take(4)
            ->get();

        return view('posts.show', compact('post', 'similares'));
    }
    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);

        return view('posts.category', compact('posts', 'category'));
    }
    public function tag(Tag $tag)
    {
        /*  retorne el listado de post que le pertenece a la etiqueta */
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
