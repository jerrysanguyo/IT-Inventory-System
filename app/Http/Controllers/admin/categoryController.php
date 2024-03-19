<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category; // Adjusted namespace to follow PSR-4 standards
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\CategoryService;
use App\DataTables\Admin\CategoryDataTables; // Adjust namespace

class CategoryController extends Controller
{
    public function index(CategoryDataTables $categoryDataTables) 
    {
        // Assuming CategoryDataTables already handles listing categories,
        // no need to fetch categories manually if it's being done within DataTables
        return $categoryDataTables->render('admin.categories.index');
    }

    public function store(CategoryRequest $request, CategoryService $categoryService)
    {
        $data = $request->validated(); // Use validated data directly
        $data['added_by'] = auth()->id(); // Assuming you want to track who added the category

        $categoryService->createCategory($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category has been added.');
    }
}
