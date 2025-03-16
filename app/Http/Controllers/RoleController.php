<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Perfil criado com sucesso!');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(Role $role)
    {
        // Buscar a Role "comum" para realocar os usuários
        $defaultRole = Role::where('name', 'comum')->first();

        // Se existir usuários com esse papel, realocar para "comum"
        if ($defaultRole) {
            foreach ($role->users as $user) {
                $user->syncRoles([$defaultRole->id]); // Remove o antigo e atribui "comum"
            }
        }

        // Excluir a Role após a mudança
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Perfil deletado com sucesso!');
    }
}
