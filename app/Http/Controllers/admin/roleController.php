<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\admin\roleDataTable;

class roleController extends Controller
{
    public function roleIndex(roleDataTable $dataTable)
    {
        return $dataTable->render('admin.role');
    }

    public function addRole(Request $request) {
        $request->validate([
            'role_name'=>'required|string'
        ]);
        $data = [
            'role_name' => $request->role_name,
            'added_by' => Auth::User()->id
        ];
        $newRole=role::create($data);

        return redirect()->route('role-list');
    }
}
