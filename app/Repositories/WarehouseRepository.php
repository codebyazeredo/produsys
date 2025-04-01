<?php

namespace App\Repositories;

use App\Models\Warehouse;
use App\Http\Dtos\WarehouseDTO;

class WarehouseRepository
{
    public function all()
    {
        return Warehouse::all();
    }

    public function find(int $id): ?Warehouse
    {
        return Warehouse::find($id);
    }

    public function create(WarehouseDTO $warehouseDTO): Warehouse
    {
        $warehouse = new Warehouse();
        $warehouse->setNameAttribute($warehouseDTO->name);
        $warehouse->setLocationAttribute($warehouseDTO->location);
        $warehouse->save();

        return $warehouse;
    }

    public function update(Warehouse $warehouse, WarehouseDTO $warehouseDTO): Warehouse
    {
        $warehouse->setNameAttribute($warehouseDTO->name);
        $warehouse->setLocationAttribute($warehouseDTO->location);
        $warehouse->save();

        return $warehouse;
    }

    public function delete(Warehouse $warehouse): bool
    {
        return $warehouse->delete();
    }
}
