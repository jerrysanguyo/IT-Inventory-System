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
        $listOfCategory = category::getAllCategory();
        return $categoryDataTables->render('admin.category', compact(
            'listOfCategory',
            'categoryDataTables'
        ));
    }

    public function addCategory(CategoryRequest $request, CategoryService $categoryService)
    {
        $data = $request->validated();
        $data['added_by'] = auth()->id(); 

        $categoryService->createCategory($data);

        return redirect()->route('admin.category')->with('success', 'Category has been added.');
    }
}
