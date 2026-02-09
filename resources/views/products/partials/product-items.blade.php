@foreach ($products as $product)
<div class="col-6 col-sm-4 col-md-3 col-lg-2 product-item">

    <div class="card product-card h-100">

        {{-- IMAGE --}}
        <a href="{{ route('products.show', $product->id) }}" class="product-img-wrap">
            <img loading="lazy"
                 src="{{ $product->image
                    ? asset('storage/' . $product->image)
                    : 'https://xelltechnology.com/wp-content/uploads/2022/04/dummy6.jpg' }}"
                 class="card-img-top"
                 alt="{{ $product->name }}">
        </a>

        <div class="card-body d-flex flex-column p-2">

            {{-- PRODUCT NAME --}}
            <a href="{{ route('products.show', $product->id) }}"
               class="text-decoration-none text-dark">
                <h6 class="product-title mb-1">
                    {{ Str::limit($product->name, 38) }}
                </h6>
            </a>

            {{-- PRICE --}}
            <div class="price mb-1">
                {{ $product->formatted_price }}
            </div>

            {{-- DESCRIPTION --}}
            @if($product->description)
                <p class="product-desc mb-2">
                    {{ Str::limit(strip_tags($product->description), 55) }}
                </p>
            @endif

            {{-- ACTION BUTTONS --}}
            <div class="mt-auto d-flex gap-1">

                {{-- ADD TO CART (FIXED) --}}
                <form action="{{ route('cart.add') }}"
                      method="POST"
                      class="flex-fill add-to-cart-form">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit"
                            class="btn btn-cart btn-sm w-100 add-to-cart">
                        <i class="fa-solid fa-cart-plus"></i>
                        <span class="ms-1 btn-text">Add</span>
                        <span class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                </form>

                {{-- VIEW --}}
                <a href="{{ route('products.show', $product->id) }}"
                   class="btn btn-details btn-sm flex-fill text-center">
                    <i class="fa-regular fa-eye"></i>
                </a>

            </div>

        </div>
    </div>
</div>
@endforeach
