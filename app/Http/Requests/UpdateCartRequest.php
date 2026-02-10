<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\CartItem;

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
            'cart_item_id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $exists = CartItem::where('id', $value)
                        ->where('session_id', session()->getId())
                        ->exists();

                    if (! $exists) {
                        $fail('This cart item does not belong to your session.');
                    }
                }
            ],
            'quantity' => ['required', 'integer', 'min:1'],
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
