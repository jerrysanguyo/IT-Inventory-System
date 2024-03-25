<?php

namespace App\Services;

use App\Models\Admin\Unit;

class UnitService
{
    public function createUnit($data)
    {
        return Unit::create([
            'unit_name' => $data['unit_name'],
        ]);
    }
}