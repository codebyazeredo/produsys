<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return view('warehouse.index', compact('warehouses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'positions' => 'array',
            'positions.*' => 'required|string|max:255',
        ]);

        $warehouse = Warehouse::create($validated);

        foreach ($validated['positions'] as $positionName) {
            $warehouse->positions()->create(['name' => $positionName]);
        }

        return redirect()->route('warehouses.index')->with('success', 'Armazém e posições criados com sucesso!');
    }

    public function create()
    {
        return view('warehouse.create');
    }

    public function show(Warehouse $warehouse)
    {
        return response()->json($warehouse);
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $warehouse->update($validated);
        return redirect()->route('warehouses.index')->with('success', 'Armazém atualizado com sucesso!');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouses.index')->with('success', 'Armazém excluído com sucesso!');
    }
}
