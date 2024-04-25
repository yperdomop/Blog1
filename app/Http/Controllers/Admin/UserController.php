<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index');
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        // Verificar si el usuario tiene algún rol asignado
        if ($user->roles->isNotEmpty()) {
            // Aquí puedes obtener el nombre del primer rol asignado
            $roles = $user->roles->pluck('name')->implode(', ');
            return redirect()->route('admin.users.index', $user)->with('info', 'Se asignó el rol ' . $roles . ' al usuario ' . $user->name . ' con éxito');
        } else {
            return redirect()->route('admin.users.index', $user)->with('info', 'No se asignó ningún rol' . ' al usuario ' . $user->name);
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
