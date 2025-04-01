<?php

namespace App\Services;

use App\Repositories\WarehouseRepository;
use App\Http\Dtos\WarehouseDTO;
use App\Models\Warehouse;

class WarehouseService
{
    private WarehouseRepository $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function getAllWarehouses()
    {
        return $this->warehouseRepository->all();
    }

    public function getWarehouseById(int $id): ?Warehouse
    {
        return $this->warehouseRepository->find($id);
    }

    public function createWarehouse(WarehouseDTO $warehouseDTO): Warehouse
    {
        return $this->warehouseRepository->create($warehouseDTO);
    }

    public function updateWarehouse(Warehouse $warehouse, WarehouseDTO $warehouseDTO): Warehouse
    {
        return $this->warehouseRepository->update($warehouse, $warehouseDTO);
    }

    public function deleteWarehouse(Warehouse $warehouse): bool
    {
        return $this->warehouseRepository->delete($warehouse);
    }
}
