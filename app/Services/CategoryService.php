<?php

namespace App\Services;

use App\Models\Admin\category;

class CategoryService
{
    public function createCategory($data)
    {
        return category::create([
            'category_name' => $data['category_name'],
        ]);
    }
}