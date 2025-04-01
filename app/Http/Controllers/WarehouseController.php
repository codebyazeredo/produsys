<?php

namespace App\Http\Controllers;

use App\Http\Dtos\WarehouseDTO;
use App\Services\WarehouseService;
use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    private WarehouseService $warehouseService;

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

    public function store(WarehouseRequest $request)
    {
        $warehouseDTO = new WarehouseDTO($request->validated());
        $this->warehouseService->createWarehouse($warehouseDTO);

        return redirect()->route('warehouses.index')->with('success', 'Warehouse created successfully.');
    }

    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact('warehouse'));
    }

    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouseDTO = new WarehouseDTO($request->validated());
        $this->warehouseService->updateWarehouse($warehouse, $warehouseDTO);

        return redirect()->route('warehouses.index')->with('success', 'Warehouse updated successfully.');
    }

    public function destroy(Warehouse $warehouse)
    {
        $this->warehouseService->deleteWarehouse($warehouse);
        return redirect()->route('warehouses.index')->with('success', 'Warehouse deleted successfully.');
    }
}
