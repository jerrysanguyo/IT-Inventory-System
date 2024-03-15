<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\admin\roleDataTable;

class roleController extends Controller
{
    public function roleIndex(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('admin.role', ['roleDataTable' => $roleDataTable]);
    }

    public function addRole(Request $request) {
        $request->validate([
            'role_name'=>'required|string'
        ]);
        $data = [
            'role_name' => $request->role_name
        ];
        $newRole=Role::create($data);

        return redirect()->route('role-list');
    }
}
