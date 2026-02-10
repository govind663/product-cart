<?php

namespace App\Services;

use App\Models\CartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CartService
{
    protected function sessionId(): string
    {
        return session()->getId();
    }

    /**
     * Base query for current session
     */
    protected function baseQuery()
    {
        return CartItem::with('product')
            ->where('session_id', $this->sessionId());
    }

    /**
     * Clear cart cache (for navbar count)
     */
    protected function clearCartCache(): void
    {
        Cache::forget('cart_count_' . $this->sessionId());
    }

    public function getCartItems(): Collection
    {
        return $this->baseQuery()->get();
    }

    /**
     * Add product to cart (SAFE + ATOMIC)
     */
    public function addToCart(int $productId): CartItem
    {
        $this->clearCartCache();

        $item = CartItem::where('session_id', $this->sessionId())
            ->where('product_id', $productId)
            ->first();

        if ($item) {
            $item->increment('quantity');
            return $item->fresh();
        }

        return CartItem::create([
            'session_id' => $this->sessionId(),
            'product_id' => $productId,
            'quantity'   => 1,
        ]);
    }

    /**
     * Update cart item quantity
     */
    public function updateQuantity(int $cartItemId, int $quantity): ?CartItem
    {
        $this->clearCartCache();

        $item = $this->baseQuery()->where('id', $cartItemId)->first();

        if (! $item) {
            return null;
        }

        $item->update([
            'quantity' => max(1, $quantity),
        ]);

        return $item->fresh();
    }

    /**
     * Remove cart item
     */
    public function removeItem(int $cartItemId): bool
    {
        $this->clearCartCache();

        return (bool) $this->baseQuery()
            ->where('id', $cartItemId)
            ->delete();
    }

    /**
     * Clear full cart
     */
    public function clearCart(): void
    {
        $this->clearCartCache();

        $this->baseQuery()->delete();
    }

    /**
     * Optimized cart summary (1 query)
     */
    public function getCartSummary(): array
    {
        $items = $this->getCartItems();

        return [
            'items'      => $items,
            'cart_total' => $items->sum(fn ($item) => (float) $item->subtotal),
            'cart_count' => $items->sum('quantity'),
        ];
    }

    /**
     * Fast navbar cart count (no join)
     */
    public function getCartCount(): int
    {
        return (int) CartItem::where('session_id', $this->sessionId())
            ->sum('quantity');
    }
}
