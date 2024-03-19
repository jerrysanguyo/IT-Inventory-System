<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\category;
use App\Http\Requests\admin\CategoryRequest;
use App\Services\CategoryService;

class categoryController extends Controller
{
    public function category() 
    {
        return view('admin.category');
    }

    public function addCategory(CategoryRequest $request, CategoryService $categoryService)
    {
        $data = $request->all();
        $data['added_by'] = auth()->id();

        $category = $categoryService->createCategory($data);

        return redirect()->route('admin.category')->with('success', 'Category has been added.');
    }
}
