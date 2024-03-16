<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\admin\Role;
use Yajra\DataTables\Facades\DataTables;
use App\DataTables\admin\UsersDataTable;
use App\Services\UserService;
use App\Http\Requests\Admin\RegisterRequest;

class AccountsController extends Controller
{
    public function accounts(UsersDataTable $usersDataTable)
    {
        $listRoles = Role::getAllRoles();
        $users = User::getAllUsers();

        return $usersDataTable->render('admin.account', compact(
            'listRoles',
            'users', 
            'usersDataTable'
        ));
    }

    public function adminRegister(RegisterRequest $request, UserService $userService) 
    {
        $user = $userService->createUser($request->all());

        return redirect()->route('admin.accounts.list')->with('success', 'User registered successfully');
    }
}