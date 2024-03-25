<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category; 
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\CategoryService;
use App\DataTables\Admin\CategoryDataTables;

class CategoryController extends Controller
{
    public function index(CategoryDataTables $categoryDataTables) 
    {
        return $categoryDataTables->render('admin.categories.index');
    }

    public function store(CategoryRequest $request, CategoryService $categoryService)
    {
        $data = $request->validated();
        $data['added_by'] = auth()->id(); 

        $categoryService->createCategory($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category has been added.');
    }
}
