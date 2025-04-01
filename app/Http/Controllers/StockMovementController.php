<?php


namespace App\Http\Controllers;

use App\Repositories\StockMovementRepository;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    protected $stockMovementRepository;

    public function __construct(StockMovementRepository $stockMovementRepository)
    {
        $this->stockMovementRepository = $stockMovementRepository;
    }

    public function index(Request $request)
    {
        return view('stock.index', $this->stockMovementRepository->getIndexData($request));
    }

    public function create($productId)
    {
        return view('stock.create', $this->stockMovementRepository->getCreateData($productId));
    }

    public function store(Request $request)
    {
        return $this->stockMovementRepository->storeMovement($request);
    }

    public function addStock(Request $request)
    {
        return $this->stockMovementRepository->addStock($request);
    }

    public function pending()
    {
        return view('stock.pending', ['products' => $this->stockMovementRepository->getPendingProducts()]);
    }

    public function registerStock($productId)
    {
        return view('stock.register_stock', $this->stockMovementRepository->getRegisterStockData($productId));
    }

    public function storeRegisteredStock(Request $request)
    {
        return $this->stockMovementRepository->storeRegisteredStock($request);
    }

    public function history()
    {
        return view('stock.history', ['movements' => $this->stockMovementRepository->getHistory()]);
    }
}
