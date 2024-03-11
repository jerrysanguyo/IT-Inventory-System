<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\admin\Role;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\admin\UsersDataTable;

class AccountsController extends Controller
{
    public function accounts(UsersDataTable $usersDataTable)
    {
        $listRoles = Role::all();
        return $usersDataTable->render('admin.account', ['usersDataTable' => $usersDataTable, 'listRoles' => $listRoles]);
    }

    public function adminRegister(Request $request) { 
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_Id' => ['required', 'exists:role,id'], 
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_Id' => $request->input('role_Id'),
        ]);

        return redirect()->route('account-list')->with('success', 'User registered successfully');
    }
}