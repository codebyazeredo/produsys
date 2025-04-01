<?php

namespace App\Http\Dtos;

class PositionDTO
{
    private int $warehouse_id;
    private string $name;

    public function __construct(int $warehouse_id, string $name)
    {
        $this->warehouse_id = $warehouse_id;
        $this->name = $name;
    }

    public function getWarehouseId(): int
    {
        return $this->warehouse_id;
    }

    public function setWarehouseId(int $warehouse_id): void
    {
        $this->warehouse_id = $warehouse_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
