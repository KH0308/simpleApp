<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'prdName' => 'required|min:5',
            'prdCtgy' => 'required',
            'prdPrc' => 'required|numeric|min:1.00'
        ];
    }

    public function messages(): array
    {
        return [
            'prdName.required' => 'Please insert product name',
            'prdName.min' => 'Product name minimum lenght is 5',
            'prdCtgy.required' => 'Please select category product',
            'prdPrc.required' => 'Please insert the product price',
            'prdPrc.numeric' => 'Product price must be a number',
            'prdPrc.min' => 'Product price minimum is 1.00'
        ];
    }
}