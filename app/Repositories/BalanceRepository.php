<?php

namespace App\Repositories;

use App\Models\Balance;

class BalanceRepository
{
    public function findByProductAndPosition(int $productId, int $positionId)
    {
        return Balance::where('product_id', $productId)
            ->where('position_id', $positionId)
            ->first();
    }

    public function updateQuantity(int $productId, int $positionId, int $quantity)
    {
        $balance = $this->findByProductAndPosition($productId, $positionId);

        if ($balance) {
            $balance->quantity += $quantity;
            $balance->save();
        } else {
            Balance::create([
                'product_id' => $productId,
                'position_id' => $positionId,
                'quantity' => $quantity,
            ]);
        }
    }
}
