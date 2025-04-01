<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitMeasureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:unit_measures,name,' . $this->route('unit_measure'),
            'abbreviation' => 'required|string|max:10|unique:unit_measures,abbreviation,' . $this->route('unit_measure'),
        ];
    }
}
