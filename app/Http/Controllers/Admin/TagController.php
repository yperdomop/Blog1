<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags'));
    }


    public function create()
    {
        $colors = [
            'red' => 'color rojo',
            'yellow' => 'color amarillo',
            'green' => 'color verde',
            'blue' => 'color azul',
            'indigo' => 'color indigo',
            'purple' => 'color morado',
            'pink' => 'color rosado',
            'white' => 'color blanco',

        ];
        return view('admin.tag.create', compact('colors'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required',

        ]);
        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.index', $tag)->with('info', 'La etiqueta se ha creado con éxito.');
    }


    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'color rojo',
            'yellow' => 'color amarillo',
            'green' => 'color verde',
            'blue' => 'color azul',
            'indigo' => 'color indigo',
            'purple' => 'color morado',
            'pink' => 'color rosado',
            'white' => 'color blanco',

        ];
        return view('admin.tag.edit', compact('tag', 'colors'));
    }


    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id", //para que lo reconozca como variable se encierra en comilla dobles
            'color' => 'required',

        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.index', $tag)->with('info', 'La etiqueta se ha actualizado con éxito.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index', $tag)->with('info', 'La etiqueta se eliminó con éxito.');
    }
}
