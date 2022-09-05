<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->orderBy('id')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Role::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Role Added Successfully');
        return redirect(route('admin.roles.index'));
    }

    public function edit($roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $request->validate([
            'name' => 'required'
        ]);
        $role->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Role updated Successfully');
        return redirect(route('admin.roles.index'));
    }

    public function destroy($roleId)
    {
        $role = Role::findOrFail($roleId);
        $role->delete();
        session()->flash('success', 'Role deleted Successfully');
        return redirect(route('admin.roles.index'));
    }

    public function assignPermission(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);
        session()->flash('success', 'Permission Added Successfully');
        return back();

    }
}
