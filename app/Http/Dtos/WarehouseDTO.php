<?php


namespace App\Http\Dtos;

class WarehouseDTO
{
    public string $name;
    public string $location;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->location = $data['location'];
    }
}
