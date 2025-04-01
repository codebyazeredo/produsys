<?php

namespace App\Http\Controllers;

use App\Http\Dtos\WarehouseDTO;
use App\Models\Warehouse;
use App\Services\WarehouseService;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    protected $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function index()
    {
        $warehouses = $this->warehouseService->getAllWarehouses();
        return view('warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('warehouses.create');
    }

    public function store(Request $request)
    {
        $positions = $request->input('positions', []);

        $positions = array_map(function ($positionName) {
            return ['name' => $positionName];
        }, $positions);

        $warehouseDTO = new WarehouseDTO($request->name, $request->location, $positions);
        $this->warehouseService->createWarehouse($warehouseDTO);

        return redirect()->route('warehouses.index')->with('success', 'Armazém criado com sucesso!');
    }

    public function show($id)
    {
        $warehouse = $this->warehouseService->getWarehouseById($id);
        return view('warehouses.show', compact('warehouse'));
    }

    public function edit($id)
    {
        $warehouse = $this->warehouseService->getWarehouseById($id);

        $positions = $warehouse->positions->map(function ($position) {
            return ['name' => $position->name];
        });

        return view('warehouses.edit', compact('warehouse', 'positions'));
    }


    public function update(Request $request, $id)
    {
        $positions = $request->input('positions', []);

        $positions = array_map(function ($positionName) {
            return ['name' => $positionName];
        }, $positions);

        $warehouseDTO = new WarehouseDTO($request->name, $request->location, $positions);
        $this->warehouseService->updateWarehouse($id, $warehouseDTO);

        return redirect()->route('warehouses.index')->with('success', 'Armazém atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->warehouseService->deleteWarehouse($id);
        return redirect()->route('warehouses.index')->with('success', 'Armazém excluído com sucesso!');
    }
}
