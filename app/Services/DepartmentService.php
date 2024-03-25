<?php

namespace App\Services;

use App\Models\Admin\Department;

class DepartmentService
{
    public function createDepartment($data)
    {
        return Department::create([
            'department_name' => $data['department_name'],
        ]);
    }
}