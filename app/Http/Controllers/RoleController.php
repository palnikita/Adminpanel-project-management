<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rolename' => 'required|string|max:255',
        ]);

        $attributes = [
            'rolename' => $request->rolename,
            'view_leads' => $request->has('view_leads') ? 2 : 1,
            'add_leads' => $request->has('add_leads') ? 2 : 1,
            'delete_leads' => $request->has('delete_leads') ? 2 : 1,
            'edit_leads' => $request->has('edit_leads') ? 2 : 1,
            'view_team' => $request->has('view_team') ? 2 : 1,
            'add_team' => $request->has('add_team') ? 2 : 1,
            'delete_team' => $request->has('delete_team') ? 2 : 1,
            'edit_team' => $request->has('edit_team') ? 2 : 1,
            'view_roles' => $request->has('view_roles') ? 2 : 1,
            'edit_roles' => $request->has('edit_roles') ? 2 : 1,
            'delete_roles' => $request->has('delete_roles') ? 2 : 1,
            'add_roles' => $request->has('add_roles') ? 2 : 1,
            'view_task' => $request->has('view_task') ? 2 : 1,
            'add_task' => $request->has('add_task') ? 2 : 1,
            'delete_task' => $request->has('delete_task') ? 2 : 1,
            'edit_task' => $request->has('edit_task') ? 2 : 1,
        ];

        Role::create($attributes);

        return redirect()->route('roles')->with('success', 'Role added successfully.');
    }

    public function showrole()
    {
        $roles = Role::all();
        return view('roles.showroles', compact('roles'));
    }

    public function deleterole($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return response()->json(['success' => true, 'message' => 'Record deleted successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Record not found']);
    }

    public function viewrole($id)
    {
        $role = Role::find($id);


        if (!$role) {
            abort(404); // Handle the case where the role is not found
        }


        return view('roles.viewroles', compact('role'));
    }

    public function editrole($id)
    {
        $role = Role::findOrFail($id); // Find the role by its ID
        return view('roles.edit', compact('role')); // Pass the role to the view
    }

    public function updaterole(Request $request, $id)
    {
        $request->validate([
            'rolename' => 'required|string|max:255',
        ]);

        $role = Role::findOrFail($id); // Find the role by its ID

        // Update role properties from the request
        $role->rolename = $request->input('rolename');
        $role->view_leads = $request->has('view_leads') ? 2 : 1;
        $role->add_leads = $request->has('add_leads') ? 2 : 1;
        $role->delete_leads = $request->has('delete_leads') ? 2 : 1;
        $role->edit_leads = $request->has('edit_leads') ? 2 : 1;

        $role->view_team = $request->has('view_team') ? 2 : 1;
        $role->add_team = $request->has('add_team') ? 2 : 1;
        $role->delete_team = $request->has('delete_team') ? 2 : 1;
        $role->edit_team = $request->has('edit_team') ? 2 : 1;

        $role->view_roles = $request->has('view_roles') ? 2 : 1;
        $role->add_roles = $request->has('add_roles') ? 2 : 1;
        $role->delete_roles = $request->has('delete_roles') ? 2 : 1;
        $role->edit_roles = $request->has('edit_roles') ? 2 : 1;

        $role->view_task = $request->has('view_task') ? 2 : 1;
        $role->add_task = $request->has('add_task') ? 2 : 1;
        $role->delete_task = $request->has('delete_task') ? 2 : 1;
        $role->edit_task = $request->has('edit_task') ? 2 : 1;

        $role->save(); // Save the updated role

        return redirect()->route('showrole')->with('success', 'Role updated successfully');
    }
}
