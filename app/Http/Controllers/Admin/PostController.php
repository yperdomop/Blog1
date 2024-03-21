<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.post.index');
    }


    public function create()
    {
        /*  metodo pluck genera array pero solo con el campo name de cada objeto  y la función  prepend agrega un campo al comienzo del array en la vista se ve*/
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    //llamamos a StorePostRequest y lo importamos aqui para ver las validaciones
    public function store(PostRequest $request)
    {
        //en que carpeta queremos q se almacene la img,y el 2 parámetro es la ruta
        /* return  Storage::put('posts', $request->file('file'));  */

        //agregar un nuevo registro en la tabla pos para guardar las etiquetas en otra tabla
        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('admin.posts.edit', $post);
    }


    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        /*  metodo pluck genera array pero solo con el campo name de cada objeto  y la función  prepend agrega un campo al comienzo del array en la vista se ve*/
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }


    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            //eliminamos la imagen en el servidor 
            if ($post->image) {
                Storage::delete($post->image->url);

                //actualizamos la img y su url
                $post->image->update([
                    'url' => $url
                ]);
                //si no existiera una imagen asociada

            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        // Sincronizamos las etiquetas
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }


    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect()->route('admin.posts.index', $post)->with('info', 'El post se eliminó con éxito');
    }
}
