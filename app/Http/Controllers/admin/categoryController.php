<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\category;

class categoryController extends Controller
{
    public function category() 
    {
        return view('admin.category');
    }

    public function addCategory(CategoryRequest $request, CategoryService $CategoryService)
    {
        $category = $CategoryService->createCategory($request->all());

        return redirect->route('admin.category')->with('success', 'Category has been added.');
    }
}
