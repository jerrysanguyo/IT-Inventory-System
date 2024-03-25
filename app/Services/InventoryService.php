<?php

namespace App\Services;

use App\Models\Admin\Inventory;

class InventoryService
{
    public function createInventory($data)
    {
        return Inventory::create($data);
    }
}