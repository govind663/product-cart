<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    /**
     * Get paginated active products
     * (Used for listing + load more AJAX)
     */
    public function getActiveProductsPaginated(int $perPage = 12)
    {
        return Product::active()
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Get all active products (cached)
     * (Use only where full collection required)
     */
    public function getActiveProducts()
    {
        return Cache::remember(
            'active_products',
            now()->addMinutes(60),
            fn () => Product::active()
                ->latest()
                ->get()
        );
    }

    /**
     * Get single product (fail-safe)
     */
    public function getProductById(int $id): Product
    {
        return Product::active()
            ->findOrFail($id);
    }
}
