<?php

namespace App\Http\Controllers;

use App\Http\Dtos\SupplierDTO;
use App\Http\Requests\SupplierRequest;
use App\Services\SupplierService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SupplierController extends Controller
{
    protected SupplierService $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index(): View
    {
        $suppliers = $this->supplierService->getAllSuppliers();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create(): View
    {
        return view('suppliers.create');
    }

    public function store(SupplierRequest $request): RedirectResponse
    {
        $supplierDTO = SupplierDTO::fromArray($request->validated());
        $this->supplierService->createSupplier($supplierDTO);

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor criado com sucesso!');
    }

    public function edit(int $id): View|RedirectResponse
    {
        $supplier = $this->supplierService->getSupplierById($id);
        if (!$supplier) {
            return redirect()->route('suppliers.index')->with('error', 'Fornecedor não encontrado.');
        }

        return view('suppliers.edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, int $id): RedirectResponse
    {
        $supplierDTO = SupplierDTO::fromArray($request->validated());
        $updated = $this->supplierService->updateSupplier($id, $supplierDTO);

        if (!$updated) {
            return redirect()->route('suppliers.index')->with('error', 'Fornecedor não encontrado.');
        }

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->supplierService->deleteSupplier($id);

        if (!$deleted) {
            return redirect()->route('suppliers.index')->with('error', 'Fornecedor não encontrado.');
        }

        return redirect()->route('suppliers.index')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
