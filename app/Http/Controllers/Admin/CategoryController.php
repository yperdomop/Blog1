<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

 
    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'slug' => 'required|unique:categories'
        ]);

      $category= Category::create($request->all());
      return redirect()->route('admin.categories.edit',$category)->with('info', 'La categoría se ha creado con éxito.');
    }

    
    public function show(Category $category)
    {
        return view('admin.category.show',compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' =>'required',
            'slug' => "required|unique:categories,slug,$category->id"
        ]);
        $category->update($request->all());
        return redirect()->route('admin.categories.index',$category)->with('info', 'La categoría se ha actualizado con éxito.');
    
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('info', 'La categoría se ha eliminado con éxito.');
    }
}
