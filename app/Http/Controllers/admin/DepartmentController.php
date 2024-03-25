<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Http\Requests\admin\DepartmentRequest;
use App\DataTables\admin\DepartmentDataTables;
use App\Models\admin\Department;

class DepartmentController extends Controller
{
    public function index(DepartmentDataTables $departmentDataTables)
    {
        $listOfDepartment = Department::getAllDepartment();
        return $departmentDataTables->render('admin.department', compact(
            'listOfDepartment',
            'departmentDataTables'
        ));
    }

    public function addDepartment (DepartmentRequest $departmentRequest, DepartmentService $departmentService) 
    {
        $validated = $departmentRequest->validated();
        $department = $departmentService->createDepartment($validated);
        return redirect()->route('admin.department')->with('success', 'Department has been Added.');
    }
}
