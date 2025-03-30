<?php

namespace App\Http\Controllers;

use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    public function index()
    {
        return response()->json(SaleItem::with(['sale', 'product'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        return response()->json(SaleItem::create($validated), 201);
    }

    public function show(SaleItem $saleItem)
    {
        return response()->json($saleItem->load(['sale', 'product']));
    }

    public function update(Request $request, SaleItem $saleItem)
    {
        $validated = $request->validate([
            'sale_id' => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        $saleItem->update($validated);
        return response()->json($saleItem);
    }

    public function destroy(SaleItem $saleItem)
    {
        $saleItem->delete();
        return response()->json(null, 204);
    }
}
