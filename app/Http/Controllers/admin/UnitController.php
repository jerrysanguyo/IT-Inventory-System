<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UnitService;
use App\Models\admin\Unit;
use App\Http\Requests\admin\UnitRequest;
use App\DataTables\admin\UnitDataTables;

class UnitController extends Controller
{
    public function index(UnitDataTables $unitDataTables) 
    {
        $listOfUnits = Unit::getAllUnit();

        return $unitDataTables->render('admin.unit', compact(
            'listOfUnits',
            'unitDataTables'
        ));
    }

    public function addUnit(UnitRequest $unitRequest, UnitService $unitService)
    {
        $validated = $unitRequest->validated();
        $unit = $unitService->createUnit($validated);

        return redirect()->route('admin.unit')->with('success', 'Unit has been added.');
    }
}
