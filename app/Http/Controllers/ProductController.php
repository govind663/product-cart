<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    /**
     * Product listing page + AJAX Load More
     */
    public function index(Request $request)
    {
        try {

            $products = $this->productService->getActiveProductsPaginated(12);

            // AJAX load more
            if ($request->ajax()) {

                if ($products->isEmpty()) {
                    return response('');
                }

                return view(
                    'products.partials.product-items',
                    compact('products')
                )->render();
            }

            return view('products.index', compact('products'));

        } catch (Exception $e) {

            // \Log::error($e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to load products.',
                ], 500);
            }

            return back()->with('error', 'Failed to load products.');
        }
    }

    /**
     * Product detail page
     */
    public function show(Request $request, int $id)
    {
        try {

            $product = $this->productService->getProductById($id);

            if ($request->ajax()) {
                return response()->json([
                    'status'  => true,
                    'product' => $product,
                ]);
            }

            return view('products.show', compact('product'));

        } catch (Exception $e) {

            // \Log::error($e->getMessage());

            if ($request->ajax()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Product not found.',
                ], 500);
            }

            return back()->with('error', 'Product not found.');
        }
    }
}
