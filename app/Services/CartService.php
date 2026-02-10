<?php

namespace App\Services;

use App\Models\CartItem;
use Illuminate\Support\Collection;

class CartService
{
    /**
     * Get current session id
     */
    protected function sessionId(): string
    {
        return session()->getId();
    }

    /**
     * Get all cart items for current session
     */
    public function getCartItems(): Collection
    {
        return CartItem::with('product')
            ->currentSession()
            ->get();
    }

    /**
     * Add product to cart (SAFE + INCREMENT)
     */
    public function addToCart(int $productId): CartItem
    {
        $item = CartItem::currentSession()
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('quantity');
            return $item->fresh();
        }

        return CartItem::create([
            'session_id' => $this->sessionId(),
            'product_id' => $productId,
            'quantity'   => 1, // ✅ minimum 1
        ]);
    }

    /**
     * Update cart item quantity (MIN = 1)
     */
    public function updateQuantity(int $cartItemId, int $quantity): ?CartItem
    {
        $item = CartItem::currentSession()
            ->where('id', $cartItemId)
            ->first();

        if (! $item) {
            return null;
        }

        $item->update([
            'quantity' => max(1, $quantity),
        ]);

        return $item->fresh();
    }

    /**
     * Remove cart item safely
     */
    public function removeItem(int $cartItemId): bool
    {
        return (bool) CartItem::currentSession()
            ->where('id', $cartItemId)
            ->delete();
    }

    /**
     * Clear full cart (OPTIONAL – useful for checkout success)
     */
    public function clearCart(): void
    {
        CartItem::currentSession()->delete();
    }

    /**
     * Get cart total amount
     */
    public function getCartTotal(): float
    {
        return $this->getCartItems()
            ->sum(fn ($item) => (float) $item->subtotal);
    }

    /**
     * Get total quantity count (navbar badge)
     */
    public function getCartCount(): int
    {
        return (int) CartItem::currentSession()
            ->sum('quantity');
    }

    /**
     * Get formatted cart summary (AJAX friendly)
     */
    public function getCartSummary(): array
    {
        return [
            'items'       => $this->getCartItems(),
            'cart_total'  => $this->getCartTotal(),
            'cart_count'  => $this->getCartCount(),
        ];
    }
}
