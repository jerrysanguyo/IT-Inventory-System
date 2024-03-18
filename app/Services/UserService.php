<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_Id' => $data['role_Id'],
        ]);
    }

    public function editUser($data)
    {
        return User::edit([
            'role_Id' => $data['role_Id'],
        ]);
    }

    public function editAccount(array $data)
    {
        $user = User::find($data['id']); 
        if ($user) {
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();
            return $user;
        }
    }
}