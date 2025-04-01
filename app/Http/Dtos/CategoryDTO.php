<?php

namespace App\Http\Dtos;

class CategoryDTO
{
    public function __construct(
        public string $name,
        public ?string $description = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: trim($data['name']),
            description: isset($data['description']) ? trim($data['description']) : null
        );
    }
}
