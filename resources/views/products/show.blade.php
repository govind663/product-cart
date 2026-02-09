@extends('layouts.app')

@section('styles')
    <style>
        /* ===============================
       PRODUCT DETAIL WRAPPER
    =============================== */
        .product-detail-card {
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .1);
        }

        /* ===============================
       PRODUCT IMAGE
    =============================== */
        .product-image-wrap {
            background: #f8f9fa;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image-wrap img {
            max-height: 360px;
            width: auto;
            transition: .35s ease;
        }

        .product-image-wrap img:hover {
            transform: scale(1.05);
        }

        /* ===============================
       PRODUCT INFO
    =============================== */
        .product-info {
            padding: 40px;
        }

        .product-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #222;
        }

        .product-desc {
            font-size: .95rem;
            color: #666;
            line-height: 1.6;
        }

        /* ===============================
       PRICE
    =============================== */
        .product-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: #198754;
        }

        /* ===============================
       ACTION BUTTONS
    =============================== */
        .btn-cart-lg {
            background: #ff9f00;
            border: none;
            color: #000;
            font-weight: 700;
            border-radius: 10px;
            padding: 12px 26px;
            transition: .25s ease;
        }

        .btn-cart-lg:hover {
            background: #fb8c00;
            box-shadow: 0 6px 18px rgba(255, 159, 0, .4);
            transform: translateY(-1px);
        }

        .btn-back {
            border-radius: 10px;
            padding: 12px 22px;
        }

        /* ===============================
       BADGE
    =============================== */
        .product-badge {
            background: #e7f1ff;
            color: #0d6efd;
            font-size: .75rem;
            font-weight: 600;
            padding: 6px 10px;
            border-radius: 20px;
            display: inline-block;
        }

        /* ===============================
       RESPONSIVE
    =============================== */
        @media(max-width:768px) {
            .product-info {
                padding: 25px;
            }

            .product-title {
                font-size: 1.3rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="product-detail-card">

                <div class="row g-0">

                    {{-- IMAGE --}}
                    <div class="col-md-6">
                        <div class="product-image-wrap">
                            <img src="{{ $product->image
                                ? asset('storage/' . $product->image)
                                : 'https://xelltechnology.com/wp-content/uploads/2022/04/dummy6.jpg' }}"
                                alt="{{ $product->name }}" class="img-fluid">
                        </div>
                    </div>

                    {{-- PRODUCT INFO --}}
                    <div class="col-md-6">
                        <div class="product-info">

                            <h2 class="product-title mb-3">
                                {{ $product->name }}
                            </h2>

                            <p class="product-desc mb-4">
                                {{ $product->description ?? 'No detailed description available for this product.' }}
                            </p>

                            <div class="product-price mb-4">
                                {{ $product->formatted_price }}
                            </div>

                            <div class="d-flex flex-wrap gap-3">

                                <button class="btn btn-cart-lg add-to-cart" data-id="{{ $product->id }}">
                                    <i class="fa-solid fa-cart-shopping me-2"></i>
                                    <span class="btn-text">Add to Cart</span>
                                    <span class="spinner-border spinner-border-sm d-none"></span>
                                </button>

                                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-back">
                                    <i class="fa-solid fa-arrow-left me-1"></i>
                                    Back to Products
                                </a>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.add-to-cart').on('click', function() {

            let btn = $(this);
            let spinner = btn.find('.spinner-border');
            let text = btn.find('.btn-text');

            btn.prop('disabled', true);
            text.addClass('d-none');
            spinner.removeClass('d-none');

            $.post("{{ route('cart.add') }}", {
                    product_id: btn.data('id')
                })
                .done(function(res) {
                    toastr.success(res.message || 'Added to cart 🛒');
                    if (res.cart_count !== undefined) {
                        $('#cart-count').text(res.cart_count);
                    }
                })
                .fail(function() {
                    toastr.error('Failed to add item');
                })
                .always(function() {
                    btn.prop('disabled', false);
                    text.removeClass('d-none');
                    spinner.addClass('d-none');
                });
        });
    </script>
@endsection
