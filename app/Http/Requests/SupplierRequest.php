<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:suppliers,cnpj,' . $this->route('supplier'),
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ];
    }
}
