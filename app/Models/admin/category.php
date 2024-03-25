<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table='category';
    protected $fillable=['category_name'];

    public static function getAllCategory()
    {
        return self::all();
    }
}
