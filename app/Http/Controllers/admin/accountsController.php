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
use App\Http\Requests\Admin\EditAccountRequest;

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
        $user = $userService->createUser($request->validated()); 

        return redirect()->route('admin.accounts.list')->with('success', 'User registered successfully');
    }

    public function accountsDetails(User $acc)
    {
        return view('admin.accountDetails', compact('acc'));
    }

    public function accountsChangePw(EditAccountRequest $request, UserService $userService, $acc)
    {
        $validated = $request->validated();
        $user = User::find($acc);
        if (!$user) {
            return redirect()->route('admin.accounts.list')->with('error', 'User not found.');
        }
        $userService->editAccount($validated, $user);

        return redirect()->route('admin.accounts.list')->with('success', 'Account details have been changed.');
    }
}