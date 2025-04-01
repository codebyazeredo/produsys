<?php

namespace App\Http\Controllers;
use App\Services\BalanceService;

class BalanceController extends Controller
{
    public function __construct(private BalanceService $balanceService) {}

    public function addStockForMissingProducts()
    {
        $message = $this->balanceService->addMissingStockEntries();
        return redirect()->back()->with('success', $message);
    }
}
