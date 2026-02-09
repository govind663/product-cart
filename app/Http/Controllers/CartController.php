<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use App\Models\CartItem; // ✅ IMPORTANT
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Log;
use Exception;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService
    ) {}

    /* ===============================
       CART PAGE
    ===============================*/
    public function index(): View|RedirectResponse
    {
        try {
            return view('cart.index', [
                'items' => $this->cartService->getCartItems(),
                'total' => $this->cartService->getCartTotal(),
            ]);
        } catch (Exception $e) {
            Log::error('Cart Load Error', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to load cart.');
        }
    }

    /* ===============================
       ADD TO CART
    ===============================*/
    public function add(AddToCartRequest $request): JsonResponse|RedirectResponse
    {
        try {
            $productId = (int) $request->validated('product_id');
            $this->cartService->addToCart($productId);

            $response = [
                'status'     => true,
                'message'    => 'Product added to cart successfully',
                'cart_count' => $this->cartService->getCartCount(),
            ];

            return $request->ajax()
                ? response()->json($response)
                : back()->with('success', $response['message']);

        } catch (Exception $e) {
            Log::error('Add To Cart Error', [
                'product_id' => $request->product_id,
                'error'      => $e->getMessage(),
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'Unable to add product to cart.',
            ], 500);
        }
    }

    /* ===============================
       UPDATE CART ✅ FIXED
    ===============================*/
    public function update(UpdateCartRequest $request): JsonResponse
    {
        try {
            $cartItemId = (int) $request->validated('cart_item_id');
            $quantity   = (int) $request->validated('quantity');

            $this->cartService->updateQuantity($cartItemId, $quantity);

            $item = CartItem::with('product')
                ->currentSession()
                ->findOrFail($cartItemId);

            return response()->json([
                'status'        => true,
                'message'       => 'Cart updated successfully',
                'cart_count'    => $this->cartService->getCartCount(),
                'item_subtotal' => (float) $item->subtotal,
                'cart_total'    => $this->cartService->getCartTotal(),
            ]);

        } catch (Exception $e) {
            Log::error('Cart Update Error', ['error' => $e->getMessage()]);

            return response()->json([
                'status'  => false,
                'message' => 'Failed to update cart.',
            ], 500);
        }
    }

    /* ===============================
       REMOVE ITEM ✅ FIXED
    ===============================*/
    public function remove(int $id): JsonResponse
    {
        try {
            $this->cartService->removeItem($id);

            return response()->json([
                'status'     => true,
                'message'    => 'Item removed successfully',
                'cart_count' => $this->cartService->getCartCount(),
                'cart_total' => $this->cartService->getCartTotal(),
            ]);

        } catch (Exception $e) {
            Log::error('Cart Remove Error', [
                'cart_item_id' => $id,
                'error'        => $e->getMessage(),
            ]);

            return response()->json([
                'status'  => false,
                'message' => 'Failed to remove item.',
            ], 500);
        }
    }
}
