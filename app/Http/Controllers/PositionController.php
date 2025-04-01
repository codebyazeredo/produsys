<?php

namespace App\Http\Controllers;

use App\Http\Dtos\PositionDTO;
use App\Http\Requests\PositionRequest;
use App\Models\Position;
use App\Services\PositionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PositionController extends Controller
{
    private PositionService $positionService;

    public function __construct(PositionService $positionService)
    {
        $this->positionService = $positionService;
    }

    public function index(): View
    {
        $positions = $this->positionService->getAll();
        return view('positions.index', compact('positions'));
    }

    public function create(): View
    {
        return view('positions.create');
    }

    public function store(PositionRequest $request): RedirectResponse
    {
        $dto = new PositionDTO($request->warehouse_id, $request->name);
        $this->positionService->create($dto);
        return redirect()->route('positions.index')->with('success', 'Posição criada com sucesso!');
    }

    public function edit(Position $position): View
    {
        return view('positions.edit', compact('position'));
    }

    public function update(PositionRequest $request, Position $position): RedirectResponse
    {
        $dto = new PositionDTO($request->warehouse_id, $request->name);
        $this->positionService->update($position, $dto);
        return redirect()->route('positions.index')->with('success', 'Posição atualizada com sucesso!');
    }

    public function destroy(Position $position): RedirectResponse
    {
        $this->positionService->delete($position);
        return redirect()->route('positions.index')->with('success', 'Posição removida com sucesso!');
    }
}
