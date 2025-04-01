<?php

namespace App\Services;

use App\Http\Dtos\UnitMeasureDTO;
use App\Models\UnitMeasure;
use App\Repositories\UnitMeasureRepository;

class UnitMeasureService
{
    private UnitMeasureRepository $unitMeasureRepository;

    public function __construct(UnitMeasureRepository $unitMeasureRepository)
    {
        $this->unitMeasureRepository = $unitMeasureRepository;
    }

    public function getAllUnitMeasures()
    {
        return $this->unitMeasureRepository->all();
    }

    public function getUnitMeasureById(int $id): ?UnitMeasure
    {
        return $this->unitMeasureRepository->find($id);
    }

    public function createUnitMeasure(UnitMeasureDTO $unitMeasureDTO): UnitMeasure
    {
        return $this->unitMeasureRepository->create($unitMeasureDTO);
    }

    public function updateUnitMeasure(int $id, UnitMeasureDTO $unitMeasureDTO): ?UnitMeasure
    {
        $unitMeasure = $this->unitMeasureRepository->find($id);
        if (!$unitMeasure) {
            return null;
        }

        return $this->unitMeasureRepository->update($unitMeasure, $unitMeasureDTO);
    }

    public function deleteUnitMeasure(int $id): bool
    {
        $unitMeasure = $this->unitMeasureRepository->find($id);
        if (!$unitMeasure) {
            return false;
        }

        return $this->unitMeasureRepository->delete($unitMeasure);
    }
}
