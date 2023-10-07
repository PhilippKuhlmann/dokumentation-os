<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    // ADMIN Bereich
    public function index()
    {
        $roles = Role::paginate(20);
        $roleCount = Role::all()->count();
        $roleLastAdded = Role::latest('created_at')->first();

        return view('admin.role.index', compact('roles', 'roleCount', 'roleLastAdded'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
        ]);

        $role = Role::create($validatedData);

        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.role.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Role $role, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => '',
        ]);

        $role->update($validatedData);

        $role->permissions()->sync($request->permissions);

        return redirect(route('admin.role.index'));
    }
}
