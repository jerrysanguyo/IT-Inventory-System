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

    public function accounts()
    {
        $users = User::all();
        return view('admin.account', compact('users'));
    }
}