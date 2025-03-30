<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalMovements = StockMovement::count();
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();
        $totalStock = Balance::sum('quantity');

        $today = Carbon::today();
        $lastWeek = $today->copy()->subDays(7);

        $totalStockValue = 0;
        foreach (Balance::all() as $balance) {
            $totalStockValue += $balance->quantity * $balance->product->price;
        }

        $totalProductValue = 0;
        foreach (Product::all() as $product) {
            $totalProductValue += $product->balance->quantity * $product->price;
        }

        $lowStockProducts = Product::whereHas('balance', function ($query) {
            $query->where('quantity', '<', 5);
        })->get();

        $latestMovements = StockMovement::with('product', 'user')
            ->orderBy('movement_date', 'desc')
            ->take(5)
            ->get();

        $movimentacoes = StockMovement::where('movement_date', '>=', $lastWeek)
            ->with('product')
            ->get();

        $movimentacaoLabels = $movimentacoes->map(function ($movimentacao) {
            return Carbon::parse($movimentacao->movement_date)->format('d/m/Y');
        });

        $movimentacaoData = $movimentacoes->pluck('quantity');

        return view('dashboard', compact(
            'totalProducts',
            'totalMovements',
            'totalCategories',
            'totalSuppliers',
            'totalStock',
            'totalStockValue',
            'totalProductValue',
            'latestMovements',
            'lowStockProducts',
            'movimentacaoLabels',
            'movimentacaoData'
        ));
    }
}

