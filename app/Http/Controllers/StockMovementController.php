<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockMovementController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $categoryId = $request->input('category_id');
        $supplierId = $request->input('supplier_id');

        $stockMovements = StockMovement::with('product');

        if ($name) {
            $stockMovements = $stockMovements->whereHas('product', function ($query) use ($name) {
                $query->where('name', 'like', '%' . $name . '%');
            });
        }

        if ($categoryId) {
            $stockMovements = $stockMovements->whereHas('product', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        }

        if ($supplierId) {
            $stockMovements = $stockMovements->whereHas('product', function ($query) use ($supplierId) {
                $query->where('supplier_id', $supplierId);
            });
        }

        $stockMovements = $stockMovements->get();

        $categories = Category::all();
        $suppliers = Supplier::all();
        $products = Product::paginate(20);

        return view('stock.index', compact('stockMovements', 'products', 'categories', 'suppliers'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stock.create', compact('products'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            $movementType = $request->input('movement_type');

            $stockBalance = Balance::firstOrCreate(['product_id' => $productId]);

            switch ($movementType) {
                case 'add':
                    $stockBalance->quantity += $quantity;
                    break;

                case 'remove':
                    if ($stockBalance->quantity < $quantity) {
                        return redirect()->back()->with('error', 'Estoque insuficiente!');
                    }

                    $stockBalance->quantity -= $quantity;
                    break;
            }

            try {
                $movement = StockMovement::create([
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'movement_type' => $movementType,
                    'movement_date' => now(),
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Erro ao registrar movimentação.');
            }

            $stockBalance->save();

            DB::commit();
            return redirect()->route('stock.index')->with('success', 'Movimentação registrada com sucesso!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro interno do servidor.');
        }
    }

    public function history(Request $request)
    {
        $productId = $request->input('product_id');
        $stockMovements = StockMovement::with('product')->orderBy('movement_date', 'desc');

        if ($productId) {
            $stockMovements->where('product_id', $productId);
        }

        $stockMovements = $stockMovements->paginate(10);
        $products = Product::all();

        return view('movements.index', compact('stockMovements', 'products'));
    }
}
