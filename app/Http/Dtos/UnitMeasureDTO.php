<?php

namespace App\Http\Dtos;

class UnitMeasureDTO
{
    public function __construct(
        public string $name,
        public string $abbreviation
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: trim($data['name']),
            abbreviation: strtoupper(trim($data['abbreviation']))
        );
    }
}
