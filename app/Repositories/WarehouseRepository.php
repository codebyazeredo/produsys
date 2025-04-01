<?php

namespace App\Repositories;

use App\Models\Warehouse;
use App\Models\Position;
use Illuminate\Database\Eloquent\Collection;

class WarehouseRepository
{
    public function create(array $data): Warehouse
    {
        $warehouse = new Warehouse();
        $warehouse->setNameAttribute($data['name']);
        $warehouse->setLocationAttribute($data['location']);
        $warehouse->save();

        if (is_array($data['positions'])) {
            foreach ($data['positions'] as $positionData) {
                $position = new Position();
                $position->setWarehouseId($warehouse->id);
                $position->setName($positionData['name']);
                $position->save();
            }
        } else {
            throw new \Exception('Positions must be an array.');
        }

        return $warehouse;
    }

    public function find(int $id): ?Warehouse
    {
        return Warehouse::with('positions')->find($id);
    }

    public function all(): Collection
    {
        return Warehouse::with('positions')->get();
    }

    public function update(int $id, array $data): ?Warehouse
    {
        $warehouse = $this->find($id);

        if ($warehouse) {
            $warehouse->setNameAttribute($data['name']);
            $warehouse->setLocationAttribute($data['location']);
            $warehouse->save();

            if (isset($data['positions']) && is_array($data['positions'])) {
                $existingPositionIds = $warehouse->positions->pluck('id')->toArray();

                foreach ($data['positions'] as $positionData) {
                    $positionName = $positionData['name'];
                    if (isset($positionData['id'])) {
                        $position = $warehouse->positions()->find($positionData['id']);
                        if ($position) {
                            $position->setName($positionName);
                            $position->save();
                        }
                    } else {
                        $position = new Position();
                        $position->setWarehouseId($warehouse->id);
                        $position->setName($positionName);
                        $position->save();
                    }

                    $existingPositionIds = array_diff($existingPositionIds, [$positionData['id'] ?? null]);
                }

                foreach ($existingPositionIds as $positionId) {
                    $position = $warehouse->positions()->find($positionId);
                    if ($position) {
                        $position->delete();
                    }
                }
            } else {
                throw new \Exception('Positions must be an array.');
            }
        }

        return $warehouse;
    }

    public function delete(int $id): bool
    {
        $warehouse = $this->find($id);
        if ($warehouse) {
            return $warehouse->delete();
        }
        return false;
    }
}
