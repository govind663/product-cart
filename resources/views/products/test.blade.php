@extends('layouts.app')

@section('styles')
<style>
    /* ===============================
    PRODUCT CARD
    =============================== */
    .product-card{
        border-radius:14px;
        overflow:hidden;
        background:#fff;
        transition:.3s ease;
        box-shadow:0 4px 14px rgba(0,0,0,.08);
    }

    .product-card:hover{
        transform:translateY(-6px);
        box-shadow:0 16px 32px rgba(0,0,0,.18);
    }

    /* ===============================
    IMAGE
    =============================== */
    .card-img-top{
        height:180px;
        object-fit:cover;
        transition:.35s ease;
    }

    .product-card:hover .card-img-top{
        transform:scale(1.08);
    }

    /* ===============================
    CARD BODY
    =============================== */
    .product-card .card-body{
        padding:10px;
    }

    /* ===============================
    TITLE
    =============================== */
    .product-title{
        font-size:.82rem;
        font-weight:600;
        line-height:1.2;
        height:38px;
        overflow:hidden;
    }

    /* ===============================
    PRICE
    =============================== */
    .price{
        font-size:.9rem;
        font-weight:700;
        color:#111;
    }

    /* ===============================
    DESCRIPTION
    =============================== */
    .product-desc{
        font-size:.74rem;
        color:#666;
        line-height:1.3;
        height:32px;
        overflow:hidden;
    }

    /* ===============================
    ADD TO CART BUTTON
    =============================== */
    .btn-cart{
        background:#ff9f00;
        color:#000;
        border:none;
        font-weight:600;
        border-radius:8px;
        padding:5px 0;
        font-size:.75rem;
        transition:.25s;
    }

    .btn-cart:hover{
        background:#fb8c00;
        transform:translateY(-1px);
        box-shadow:0 4px 10px rgba(255,159,0,.35);
    }

    /* ===============================
    VIEW BUTTON
    =============================== */
    .btn-details{
        border:1.4px solid #2874f0;
        color:#2874f0;
        border-radius:8px;
        padding:5px 0;
        font-size:.75rem;
        transition:.25s;
    }

    .btn-details:hover{
        background:#2874f0;
        color:#fff;
        transform:translateY(-1px);
    }

    /* ===============================
    RESPONSIVE
    =============================== */
    @media(max-width:576px){
        .card-img-top{height:150px;}
        .product-desc{display:none;}
    }
</style>
@endsection


@section('content')
<h3 class="mb-4 fw-bold">Products</h3>

<div id="product-wrapper">

    @if ($products->isEmpty())

    {{-- EMPTY PRODUCTS --}}
    <div class="empty-products">
        <h4>No products found 😔</h4>
        <p class="mb-3">Please check back later or explore other categories</p>
        <a href="{{ url('/') }}" class="btn btn-primary">
            Continue Shopping
        </a>
    </div>

    @else

    <div class="row g-4" id="product-container">
        @include('products.partials.product-items')
    </div>

    @if ($products->hasMorePages())
    <div class="text-center mt-5">
        <button id="load-more" class="btn btn-load" data-page="2">
            Load More Products
        </button>
    </div>
    @endif

    @endif

</div>
@endsection

@section('scripts')
<script>

/* ADD TO CART */
$(document).on('click','.add-to-cart',function(){

let btn=$(this);
let id=btn.data('id');
let spinner=btn.find('.spinner-border');
let text=btn.find('.btn-text');

btn.prop('disabled',true);
text.addClass('d-none');
spinner.removeClass('d-none');

$.post("{{ route('cart.add') }}",{product_id:id})

.done(function(res){

toastr.success(res.message ?? 'Added to cart');

if(res.cart_count!==undefined){
$('#cart-count').text(res.cart_count);
}

btn.addClass('btn-success').removeClass('btn-cart');
text.text('Added ✔');

})

.fail(function(err){

toastr.error(err.responseJSON?.message ?? 'Error');

})

.always(function(){

setTimeout(()=>{
btn.prop('disabled',false);
spinner.addClass('d-none');
text.removeClass('d-none');
},600);

});

});


/* LOAD MORE AJAX */
$(document).on('click','#load-more',function(){

let btn=$(this);
let page=btn.data('page');

btn.text('Loading...');

$.get("{{ route('products.index') }}?page="+page)

.done(function(res){

if($.trim(res)==''){
btn.hide();
return;
}

$('#product-container').append(res);

btn.data('page',page+1);
btn.text('Load More Products');

})

.fail(function(){

toastr.error('Failed to load products');
btn.text('Load More Products');

});

});

</script>
@endsection