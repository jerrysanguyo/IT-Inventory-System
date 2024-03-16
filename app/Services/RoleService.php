<?php

namespace App\Services;

use App\Models\Admin\Role;

class RoleService
{
    public function createRole($data)
    {
        return Role::create([
            'role_name' => $data['role_name'],
        ]);
    }
}