<?php

namespace App\Services;

use App\Http\Dtos\SupplierDTO;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierService
{
    private SupplierRepository $supplierRepository;

    public function __construct(SupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getAllSuppliers()
    {
        return $this->supplierRepository->all();
    }

    public function getSupplierById(int $id): ?Supplier
    {
        return $this->supplierRepository->find($id);
    }

    public function createSupplier(SupplierDTO $supplierDTO): Supplier
    {
        return $this->supplierRepository->create($supplierDTO);
    }

    public function updateSupplier(int $id, SupplierDTO $supplierDTO): ?Supplier
    {
        $supplier = $this->supplierRepository->find($id);
        if (!$supplier) {
            return null;
        }

        return $this->supplierRepository->update($supplier, $supplierDTO);
    }

    public function deleteSupplier(int $id): bool
    {
        $supplier = $this->supplierRepository->find($id);
        if (!$supplier) {
            return false;
        }

        return $this->supplierRepository->delete($supplier);
    }
}
