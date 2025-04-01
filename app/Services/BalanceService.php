<?php

namespace App\Services;

use App\Models\Balance;
use App\Models\Product;
use App\Models\Position;
use Illuminate\Support\Facades\DB;

class BalanceService
{
    public function addMissingStockEntries()
    {
        $productsWithoutBalance = Product::doesntHave('balance')->get();

        if ($productsWithoutBalance->isEmpty()) {
            return "Nenhum produto sem saldo encontrado.";
        }

        DB::transaction(function () use ($productsWithoutBalance) {
            foreach ($productsWithoutBalance as $product) {
                $defaultPosition = Position::first();

                if ($defaultPosition) {
                    Balance::create([
                        'product_id' => $product->id,
                        'position_id' => $defaultPosition->id,
                        'quantity' => 0,
                    ]);
                }
            }
        });

        return "Saldo inicial criado para os produtos sem estoque.";
    }
}
