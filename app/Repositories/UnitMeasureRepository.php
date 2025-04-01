<?php

namespace App\Repositories;

use App\Http\Dtos\UnitMeasureDTO;
use App\Models\UnitMeasure;
use Illuminate\Database\Eloquent\Collection;

class UnitMeasureRepository
{
    public function all(): Collection
    {
        return UnitMeasure::orderBy('name')->get();
    }

    public function find(int $id): ?UnitMeasure
    {
        return UnitMeasure::find($id);
    }

    public function create(UnitMeasureDTO $unitMeasureDTO): UnitMeasure
    {
        $unitMeasure = new UnitMeasure();
        $unitMeasure->setNameAttribute($unitMeasureDTO->name);
        $unitMeasure->setAbbreviationAttribute($unitMeasureDTO->abbreviation);

        $unitMeasure->save();
        return $unitMeasure;
    }

    public function update(UnitMeasure $unitMeasure, UnitMeasureDTO $unitMeasureDTO): UnitMeasure
    {
        $unitMeasure->setNameAttribute($unitMeasureDTO->name);
        $unitMeasure->setAbbreviationAttribute($unitMeasureDTO->abbreviation);

        $unitMeasure->save();
        return $unitMeasure;
    }

    public function delete(UnitMeasure $unitMeasure): bool
    {
        return $unitMeasure->delete();
    }
}
