<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
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
        return view('admin.roles.edit', compact('role'));


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
}
