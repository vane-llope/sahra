<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Entity;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('display', Role::class);
        return view('Roles.index', ['roles' => Role::all()]);
    }
    public function create()
    {
        $this->authorize('create', Role::class);
        return view('Roles.create', ['entities' => Entity::all()]);
    }
    public function store(Request $request)
    {
        // Create the role
        $role = Role::create([
            'name' => $request->input('name')
        ]);
        // Create the permissions
        $permissions = $request->input('permissions');

        foreach ($permissions as $entityId => $entityPermissions) {
            Permission::create([
                'create' => isset($entityPermissions['create']),
                'update' => isset($entityPermissions['update']),
                'remove' => isset($entityPermissions['remove']),
                'display' => isset($entityPermissions['display']),
                'role_id' => $role->id,
                'entity_id' => $entityId
            ]);
        }

        // Redirect or perform additional actions
        return redirect('/roles')->with('message', 'نقش با موفقیت ایجاد شد');
    }

    public function edit($id)
    {
        $this->authorize('update', Role::class);
        // Get the role
        $role = Role::findOrFail($id);

        $entities = Entity::all();

        // Get all permissions
        $permissions = Permission::all();

        // Get the role's permissions
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('Roles.edit', compact('role', 'permissions', 'rolePermissions', 'entities'));
    }

    public function update(Request $request, Role $role)
    {
        $role->name = $request->input('name');
        $role->save();
    
        $permissions = $request->input('permissions');
    
        foreach ($permissions as $entityId => $columns) {
            $role->permissions()->updateOrCreate(
                ['entity_id' => $entityId, 'role_id' => $role->id],
                $columns
            );
        }
    
        return back()->with('message', 'نقش با موفقیت ویرایش یافت');
    }

    public function destroy(Role $role)
    {
        $this->authorize('remove', Role::class);
        $role->delete();
        return redirect('/roles')->with('message', $role->name . 'حذف شد');
    }
}
