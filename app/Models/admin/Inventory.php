<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Collection;

class Inventory extends Model
{
    use HasFactory;
    protected $table = "inventory";
    protected $fillable =
    [
        'unit_id',
        'quantity',
        'equipment_name',
        'equipment_id',
        'serial_number',
        'remarks',
        'department_id',
        'user',
        'issued_by',
        'received_by',
        'date_issued'
    ];

    public static function getAllInventory(): Collection
    {
        return self::all();
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id')->withDefault();
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id')->withDefault();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'issued_by')->withDefault();
    }

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class, 'equipment_id')->withDefault();
    }
}
