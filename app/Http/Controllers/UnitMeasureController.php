<?php

namespace App\Http\Controllers;

use App\Http\Dtos\UnitMeasureDTO;
use App\Http\Requests\UnitMeasureRequest;
use App\Services\UnitMeasureService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UnitMeasureController extends Controller
{
    protected UnitMeasureService $unitMeasureService;

    public function __construct(UnitMeasureService $unitMeasureService)
    {
        $this->unitMeasureService = $unitMeasureService;
    }

    public function index(): View
    {
        $unitMeasures = $this->unitMeasureService->getAllUnitMeasures();
        return view('unit_measures.index', compact('unitMeasures'));
    }

    public function create(): View
    {
        return view('unit_measures.create');
    }

    public function store(UnitMeasureRequest $request): RedirectResponse
    {
        $unitMeasureDTO = UnitMeasureDTO::fromArray($request->validated());
        $this->unitMeasureService->createUnitMeasure($unitMeasureDTO);

        return redirect()->route('unit_measures.index')->with('success', 'Unidade de medida criada com sucesso!');
    }

    public function edit(int $id): View|RedirectResponse
    {
        $unitMeasure = $this->unitMeasureService->getUnitMeasureById($id);
        if (!$unitMeasure) {
            return redirect()->route('unit_measures.index')->with('error', 'Unidade de medida não encontrada.');
        }

        return view('unit_measures.edit', compact('unitMeasure'));
    }

    public function update(UnitMeasureRequest $request, int $id): RedirectResponse
    {
        $unitMeasureDTO = UnitMeasureDTO::fromArray($request->validated());
        $updated = $this->unitMeasureService->updateUnitMeasure($id, $unitMeasureDTO);

        if (!$updated) {
            return redirect()->route('unit_measures.index')->with('error', 'Unidade de medida não encontrada.');
        }

        return redirect()->route('unit_measures.index')->with('success', 'Unidade de medida atualizada com sucesso!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->unitMeasureService->deleteUnitMeasure($id);

        if (!$deleted) {
            return redirect()->route('unit_measures.index')->with('error', 'Unidade de medida não encontrada.');
        }

        return redirect()->route('unit_measures.index')->with('success', 'Unidade de medida excluída com sucesso!');
    }
}
