<?php


namespace App\Repositories;

use App\Models\Balance;
use App\Models\Category;
use App\Models\Position;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockMovementRepository
{
    public function getIndexData(Request $request)
    {
        $stockMovements = StockMovement::with(['product', 'user']);

        if ($request->has('name')) {
            $stockMovements->whereHas('product', fn($query) => $query->where('name', 'like', '%' . $request->input('name') . '%'));
        }
        if ($request->has('category_id')) {
            $stockMovements->whereHas('product', fn($query) => $query->where('category_id', $request->input('category_id')));
        }
        if ($request->has('supplier_id')) {
            $stockMovements->whereHas('product', fn($query) => $query->where('supplier_id', $request->input('supplier_id')));
        }

        return [
            'stockMovements' => $stockMovements->get(),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'products' => Product::paginate(20)
        ];
    }

    public function getCreateData($productId)
    {
        return [
            'product' => Product::findOrFail($productId),
            'warehouses' => Warehouse::all(),
            'positions' => Position::all()
        ];
    }

    public function storeMovement(Request $request)
    {
        return $this->handleStockMovement($request, $request->input('movement_type'));
    }

    public function addStock(Request $request)
    {
        return $this->handleStockMovement($request, 'add');
    }

    private function handleStockMovement(Request $request, $movementType)
    {
        DB::beginTransaction();
        try {
            $productId = $request->input('product_id');
            $positionId = $request->input('position_id');
            $quantity = $request->input('quantity');

            $stockBalance = Balance::firstOrCreate([
                'product_id' => $productId,
                'position_id' => $positionId,
            ]);

            if ($movementType === 'remove' && $stockBalance->quantity < $quantity) {
                return redirect()->back()->with('error', 'Estoque insuficiente!');
            }

            $stockBalance->quantity += ($movementType === 'add' ? $quantity : -$quantity);
            $stockBalance->save();

            StockMovement::create([
                'product_id' => $productId,
                'position_id' => $positionId,
                'quantity' => $quantity,
                'movement_type' => $movementType,
                'movement_date' => now(),
                'user_id' => Auth::id(),
            ]);

            DB::commit();
            return redirect()->route('stock.index')->with('success', 'Movimentação registrada!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao processar movimentação.');
        }
    }

    public function getPendingProducts()
    {
        return Product::doesntHave('balance')->get();
    }

    public function getRegisterStockData($productId)
    {
        return [
            'product' => Product::findOrFail($productId),
            'warehouses' => Warehouse::all(),
            'positions' => Position::all()
        ];
    }

    public function storeRegisteredStock(Request $request)
    {
        return $this->handleStockMovement($request, 'add');
    }

    public function getHistory()
    {
        return StockMovement::with('product', 'user')->orderBy('movement_date', 'desc')->get();
    }
}
