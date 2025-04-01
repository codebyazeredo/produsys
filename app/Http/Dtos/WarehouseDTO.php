<?php

namespace App\Http\Dtos;

class WarehouseDTO
{
    public string $name;
    public string $location;
    public array $positions;

    public function __construct(string $name, string $location, array $positions = [])
    {
        $this->name = $name;
        $this->location = $location;
        $this->positions = $positions;
    }
}
