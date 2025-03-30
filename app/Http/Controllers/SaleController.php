<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return response()->json(Sale::with('saleItems.product')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'total' => 'required|numeric|min:0'
        ]);

        return response()->json(Sale::create($validated), 201);
    }

    public function show(Sale $sale)
    {
        return response()->json($sale->load('saleItems.product'));
    }

    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'total' => 'required|numeric|min:0'
        ]);

        $sale->update($validated);
        return response()->json($sale);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return response()->json(null, 204);
    }
}
