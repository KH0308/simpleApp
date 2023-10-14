<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidationVariant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules()
    {
        return [
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|numeric|min:1',
            'productID' => 'required|unique_variant:' . request()->productID . ',' . request()->color . ',' . request()->size
        ];
    }

    public function messages(): array
    {
        return [
            'color.required' => 'Please select a color',
            'size.required' => 'Please select a size',
            'quantity.required' => 'Please insert the quantity',
            'quantity.numeric' => 'Quantity must in number',
            'quantity.min' => 'Quantity minimum is 1',
            'productID.unique_variant' => 'This product variant already exists.'
        ];
    }
}
