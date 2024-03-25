<?php

namespace App\Services;

use App\Models\Admin\Equipment;

class EquipmentService
{
    public function createEquipment($data)
    {
        return Equipment::create([
            'equipment_name' => $data['equipment_name'],
        ]);
    }
}