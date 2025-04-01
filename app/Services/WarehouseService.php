<?php

namespace App\Services;

use App\Http\Dtos\WarehouseDTO;
use App\Repositories\WarehouseRepository;

class WarehouseService
{
    protected $warehouseRepository;

    public function __construct(WarehouseRepository $warehouseRepository)
    {
        $this->warehouseRepository = $warehouseRepository;
    }

    public function createWarehouse(WarehouseDTO $warehouseDTO)
    {
        return $this->warehouseRepository->create([
            'name' => $warehouseDTO->name,
            'location' => $warehouseDTO->location,
            'positions' => $warehouseDTO->positions,
        ]);
    }

    public function getAllWarehouses()
    {
        return $this->warehouseRepository->all();
    }

    public function getWarehouseById(int $id)
    {
        return $this->warehouseRepository->find($id);
    }

    public function updateWarehouse(int $id, WarehouseDTO $warehouseDTO)
    {
        return $this->warehouseRepository->update($id, [
            'name' => $warehouseDTO->name,
            'location' => $warehouseDTO->location,
            'positions' => $warehouseDTO->positions,
        ]);
    }

    public function deleteWarehouse(int $id)
    {
        return $this->warehouseRepository->delete($id);
    }
}
