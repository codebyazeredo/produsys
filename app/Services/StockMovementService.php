<?php

namespace App\Services;

use App\Repositories\BalanceRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class StockMovementService
{
    public function __construct(private BalanceRepository $balanceRepository) {}

    public function processStockMovement(array $data)
    {
        DB::beginTransaction();

        try {
            $quantity = $data['type'] === 'saida' ? -$data['quantity'] : $data['quantity'];

            $this->balanceRepository->updateQuantity(
                $data['product_id'],
                $data['position_id'],
                $quantity
            );

            DB::commit();
            return "Movimentação registrada com sucesso!";
        } catch (Exception $e) {
            DB::rollBack();
            return "Erro ao processar a movimentação.";
        }
    }
}
