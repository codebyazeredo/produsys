<?php

namespace App\Repositories;

use App\Models\Position;

class PositionRepository
{
    public function create(array $data): Position
    {
        $position = new Position();
        $position->setWarehouseId($data['warehouse_id']);
        $position->setName($data['name']);
        $position->save();

        return $position;
    }

    public function find(int $id): ?Position
    {
        return Position::find($id);
    }

    public function all(): array
    {
        return Position::all()->toArray();
    }

    public function update(int $id, array $data): ?Position
    {
        $position = $this->find($id);
        if ($position) {
            $position->setWarehouseId($data['warehouse_id']);
            $position->setName($data['name']);
            $position->save();
        }
        return $position;
    }

    public function delete(int $id): bool
    {
        $position = $this->find($id);
        if ($position) {
            return $position->delete();
        }
        return false;
    }
}
