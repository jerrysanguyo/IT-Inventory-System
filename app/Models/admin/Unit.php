<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table="Unit";
    protected $fillable=['unit_name'];

    public static function getAllUnit ()
    {
        return self::all();
    }
}
