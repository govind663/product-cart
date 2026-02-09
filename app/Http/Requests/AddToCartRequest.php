<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddToCartRequest extends FormRequest
{
    /**
     * Allow request
     */
    public function authorize(): bool
    {
        return true; // cart add sab users kar sakte hain
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'product_id' => [
                'required',
                'integer',
                Rule::exists('products', 'id')->where('status', 1),
            ],
        ];
    }

    /**
     * Friendly custom messages
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'Please select a product before adding to cart.',
            'product_id.integer'  => 'Invalid product selection.',
            'product_id.exists'   => 'This product is not available or inactive.',
        ];
    }

    /**
     * Optional: friendly attribute name
     */
    public function attributes(): array
    {
        return [
            'product_id' => 'product',
        ];
    }
}
