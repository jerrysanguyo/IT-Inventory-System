<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = "equipment";
    protected $fillable = ['equipment_name'];

    public static function getAllEquipment()
    {
        return self::all();
    }
}
