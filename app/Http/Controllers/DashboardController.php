<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\Balance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalSuppliers = Supplier::count();
        $totalStockQuantity = Balance::sum('quantity');

        $totalStockValue =  Balance::with('product')
            ->get()
            ->sum(function ($balance) {
                return $balance->quantity * $balance->product->price;
            });


        $latestMovements = StockMovement::with(['product', 'user'])
            ->latest()
            ->take(5)
            ->get();

        $movimentacoes = StockMovement::latest()
            ->take(5)
            ->get();

        $movimentacaoLabels = [];
        $movimentacaoData = [];

        foreach ($movimentacoes as $movimentacao) {
            $movimentacaoLabels[] = Carbon::parse($movimentacao->movement_date)->format('d/m/Y');
            $movimentacaoData[] = $movimentacao->quantity;
        }

        $produtosComEstoqueBaixo = Product::whereHas('balance', function ($query) {
            $query->where('quantity', '<=', 0);
        })->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalSuppliers',
            'totalStockQuantity',
            'totalStockValue',
            'latestMovements',
            'movimentacaoLabels',
            'movimentacaoData',
            'produtosComEstoqueBaixo'
        ));
    }
}

