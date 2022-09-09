<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required|string'
        ]);

        Permission::create([
            'name' => $request->permission,
            'guard_name' => 'web',
        ]);

        return redirect()->route('permissions.index');
    }

    public function destroy($id)
    {
        $permissions = Permission::find($id);
        $permissions->delete();

        return redirect()->route('permissions.index')
            ->with('success_message', 'Berhasil menghapus permission');
    }
}
