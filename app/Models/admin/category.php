<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $talbe='category';
    protected $fillable=['category_name', 'added_by'];

    public static function getAllCategory()
    {
        return self::all();
    }
}
