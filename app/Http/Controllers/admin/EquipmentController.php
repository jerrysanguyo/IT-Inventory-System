<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EquipmentService;
use App\Http\Requests\Admin\EquipmentRequest;
use App\Models\admin\Equipment;
use App\DataTables\admin\EquipmentDataTables;


class EquipmentController extends Controller
{
    public function equipment(EquipmentDataTables $equipmentDataTables) 
    {
        $listOfEquipments = Equipment::getAllEquipment();
        return $equipmentDataTables->render('admin.equipment', compact(
            'listOfEquipments',
            'equipmentDataTables'
        ));
    }

    public function addEquipment(EquipmentRequest $equipmentRequest, EquipmentService $equipmentService)
    {
        $validated = $equipmentRequest->validated();
        $equipment = $equipmentService->createEquipment($validated);
        return redirect()->route('admin.equipment')->with('success', 'Equipment has been added.');
    }
}
