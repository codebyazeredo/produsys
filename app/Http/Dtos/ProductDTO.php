<?php

namespace App\Http\Dtos;

class ProductDTO
{
    public string $name;
    public int $category_id;
    public int $supplier_id;
    public int $unit_measure_id;
    public float $price;

    public function __construct(array $data)
    {
        $this->name = (string) $data['name'];
        $this->category_id = (int) $data['category_id'];
        $this->supplier_id = (int) $data['supplier_id'];
        $this->unit_measure_id = (int) $data['unit_measure_id'];
        $this->price = (float) str_replace(',', '.', $data['price']);
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
