<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\admin\InventoryRequest;
use App\Models\admin\Inventory;
use App\Services\InventoryService;
use App\Models\admin\Department;
use App\Models\admin\Equipment;
use App\Models\admin\Unit;
use App\Models\User;
use App\DataTables\admin\InventoryDataTables;


class InventoryController extends Controller
{
    public function index(InventoryDataTables $inventoryDataTables)
    {
        $listOfInventory = Inventory::getAllInventory();
        $listOfEquipment = Equipment::getAllEquipment();
        $listOfUnit = unit::getAllunit();
        $listOfUser = User::getAllUsers();
        $listOfDepartment = Department::getAllDepartment();

        return $inventoryDataTables->render('admin.inventory', compact(
            'listOfInventory',
            'listOfEquipment',
            'listOfUnit',
            'listOfUser',
            'listOfDepartment',
            'inventoryDataTables'
        ));
    }

    public function addInventory(InventoryRequest $inventoryRequest, InventoryService $inventoryService)
    {
        $validated = $inventoryRequest->validated();
        $inventory = $inventoryService->createInventory($validated);
        return redirect()->route('admin.inventory')->with('success', 'Item has been added to Inventory');
    }

    public function inventoryDetails(Inventory $inventory)
    {
        return view('admin.inventoryDetails', compact('inventory'));
    }

    public function inventoryUpdate()
    {

    }
}
