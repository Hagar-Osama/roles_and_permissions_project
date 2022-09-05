<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Permission::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Permission Added Successfully');
        return redirect(route('admin.permissions.index'));
    }

    public function edit($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $request->validate([
            'name' => 'required'
        ]);
        $permission->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Permission updated Successfully');
        return redirect(route('admin.permissions.index'));
    }

    public function destroy($permissionId)
    {
        $permission = Permission::findOrFail($permissionId);
        $permission->delete();
        session()->flash('success', 'permission deleted Successfully');
        return redirect(route('admin.permissions.index'));
    }
}
