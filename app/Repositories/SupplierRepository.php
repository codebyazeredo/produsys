<?php

namespace App\Repositories;

use App\Http\Dtos\SupplierDTO;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository
{
    public function all(): Collection
    {
        return Supplier::orderBy('name')->get();
    }

    public function find(int $id): ?Supplier
    {
        return Supplier::find($id);
    }

    public function create(SupplierDTO $supplierDTO): Supplier
    {
        $supplier = new Supplier();
        $supplier->setNameAttribute($supplierDTO->name);
        $supplier->setCnpjAttribute($supplierDTO->cnpj);
        $supplier->setAddressAttribute($supplierDTO->address);
        $supplier->setPhoneAttribute($supplierDTO->phone);

        $supplier->save();
        return $supplier;
    }

    public function update(Supplier $supplier, SupplierDTO $supplierDTO): Supplier
    {
        $supplier->setNameAttribute($supplierDTO->name);
        $supplier->setCnpjAttribute($supplierDTO->cnpj);
        $supplier->setAddressAttribute($supplierDTO->address);
        $supplier->setPhoneAttribute($supplierDTO->phone);

        $supplier->save();
        return $supplier;
    }

    public function delete(Supplier $supplier): bool
    {
        return $supplier->delete();
    }
}
