<?php

namespace App\Http\Dtos;

class SupplierDTO
{
    public function __construct(
        public string $name,
        public string $cnpj,
        public string $address,
        public string $phone
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: trim($data['name']),
            cnpj: strtoupper(trim($data['cnpj'])),
            address: trim($data['address']),
            phone: preg_replace('/\D/', '', trim($data['phone']))
        );
    }
}
