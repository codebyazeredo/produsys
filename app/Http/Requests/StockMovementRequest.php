<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockMovementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'position_id' => 'required|exists:positions,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:entrada,saida',
        ];
    }
}
