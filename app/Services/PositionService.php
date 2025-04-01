<?php

namespace App\Services;

use App\Http\Dtos\PositionDTO;
use App\Models\Position;
use App\Repositories\PositionRepository;

class PositionService
{
    private PositionRepository $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        $this->positionRepository = $positionRepository;
    }

    public function create(PositionDTO $dto): Position
    {
        return $this->positionRepository->create([
            'warehouse_id' => $dto->getWarehouseId(),
            'name' => $dto->getName(),
        ]);
    }

    public function update(Position $position, PositionDTO $dto): bool
    {
        return $this->positionRepository->update($position, [
            'warehouse_id' => $dto->getWarehouseId(),
            'name' => $dto->getName(),
        ]);
    }

    public function delete(Position $position): bool
    {
        return $this->positionRepository->delete($position);
    }

    public function findById(int $id): ?Position
    {
        return $this->positionRepository->findById($id);
    }

    public function getAll()
    {
        return $this->positionRepository->getAll();
    }
}
