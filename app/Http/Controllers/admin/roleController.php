<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\admin\roleDataTable;
use App\Http\Requests\Admin\RoleRequest;
use App\Services\RoleService;

class roleController extends Controller
{
    public function roleIndex(RoleDataTable $roleDataTable)
    {
        $listOfRoles = Role::getAllRoles();

        return $roleDataTable->render('admin.role', compact(
            'listOfRoles', 
            'roleDataTable'
        ));
    }

    public function addRole(RoleRequest $request, RoleService $roleService) {

        $newRole = $roleService->createRole($request->all());
        
        return redirect()->route('admin.role.list');
    }
}
