<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    /**
     * Allow request
     */
    public function authorize(): bool
    {
        return true; // cart update allowed
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'cart_item_id' => ['required', 'integer', 'exists:cart_items,id'],
            'quantity'     => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * Friendly custom messages
     */
    public function messages(): array
    {
        return [
            'cart_item_id.required' => 'Cart item missing.',
            'cart_item_id.integer'  => 'Invalid cart item.',
            'cart_item_id.exists'   => 'This cart item no longer exists.',

            'quantity.required' => 'Please enter quantity.',
            'quantity.integer'  => 'Quantity must be a number.',
            'quantity.min'      => 'Quantity must be at least 1.',
        ];
    }

    /**
     * Friendly attribute names
     */
    public function attributes(): array
    {
        return [
            'cart_item_id' => 'cart item',
            'quantity'     => 'quantity',
        ];
    }
}
