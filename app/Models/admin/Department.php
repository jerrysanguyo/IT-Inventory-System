<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table="department";
    protected $fillable=['department_name'];

     public static function getAllDepartment() 
    {
        return self::all();
    }
}
