@extends('layouts.app')

@section('content')
<h3 class="mb-4 fw-bold">🛒 Shopping Cart</h3>

<div id="cart-wrapper">

@if ($items->isEmpty())
    {{-- EMPTY CART --}}
    <div class="alert alert-warning text-center p-4">
        <h5>Your cart is empty 😔</h5>
        <p class="mb-3">Looks like you haven’t added anything yet</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">
            Continue Shopping
        </a>
    </div>
@else

<div class="row">

    <!-- ================= CART ITEMS ================= -->
    <div class="col-md-8" id="cart-items">

        @foreach ($items as $item)
        <div class="card cart-item mb-3">

            <div class="card-body d-flex gap-3 align-items-center">

                <!-- IMAGE -->
                <img src="{{ $item->product->image
                        ? asset('storage/'.$item->product->image)
                        : 'https://xelltechnology.com/wp-content/uploads/2022/04/dummy6.jpg' }}"
                     width="90" class="rounded">

                <!-- INFO -->
                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1">{{ $item->product->name }}</h6>

                    <div class="text-success fw-bold mb-2">
                        ₹{{ number_format($item->product->price,2) }}
                    </div>

                    <!-- QTY -->
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-outline-secondary qty-btn"
                                data-type="minus" data-id="{{ $item->id }}">−</button>

                        <input type="number"
                               class="form-control qty-input text-center"
                               style="width:70px"
                               min="1"
                               value="{{ $item->quantity }}"
                               data-id="{{ $item->id }}">

                        <button class="btn btn-sm btn-outline-secondary qty-btn"
                                data-type="plus" data-id="{{ $item->id }}">+</button>

                        <button class="btn btn-sm btn-outline-danger remove-item ms-3"
                                data-id="{{ $item->id }}">
                            Remove
                        </button>
                    </div>
                </div>

                <!-- SUBTOTAL -->
                <div class="fw-bold text-end">
                    ₹<span class="subtotal-value">
                        {{ number_format($item->subtotal,2) }}
                    </span>
                </div>

            </div>
        </div>
        @endforeach

    </div>

    <!-- ================= PRICE DETAILS ================= -->
    <div class="col-md-4">
        <div class="card shadow-sm p-3 sticky-top" style="top:20px">
            <h5 class="fw-bold mb-3">Price Details</h5>

            <div class="d-flex justify-content-between mb-2">
                <span>Subtotal</span>
                <span id="cart-total">₹{{ number_format($total,2) }}</span>
            </div>

            <div class="d-flex justify-content-between text-success mb-2">
                <span>Delivery</span>
                <span>FREE</span>
            </div>

            <hr>

            <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total</span>
                <span id="final-total">₹{{ number_format($total,2) }}</span>
            </div>

            <button class="btn btn-success w-100 mt-3">
                Proceed to Checkout
            </button>
        </div>
    </div>

</div>
@endif

</div>
@endsection

@section('styles')
<style>
/* ===============================
   CART ITEM CARD
=============================== */
.cart-item{
    border-radius:14px;
    box-shadow:0 8px 22px rgba(0,0,0,.08);
    transition:all .3s ease;
    background:#fff;
    border:1px solid #f1f1f1;
}
.cart-item:hover{
    box-shadow:0 14px 32px rgba(0,0,0,.14);
    transform:translateY(-3px);
}

/* ===============================
   PRODUCT LINK + IMAGE
=============================== */
.cart-link{
    display:inline-block;
    transition:all .25s ease;
}
.cart-link img{
    transition:transform .25s ease;
}
.cart-link:hover img{
    transform:scale(1.06);
}

/* ===============================
   PRODUCT TITLE
=============================== */
.cart-item h6{
    font-size:15px;
    font-weight:600;
    line-height:1.4;
}

/* ===============================
   PRICE TEXT
=============================== */
.cart-item .text-success{
    font-size:16px;
}

/* ===============================
   QUANTITY INPUT
=============================== */
.qty-input{
    font-weight:600;
    border-radius:10px;
    border:1px solid #ced4da;
    height:38px;
}
.qty-input:focus{
    box-shadow:0 0 0 .15rem rgba(13,110,253,.15);
    border-color:#0d6efd;
}

/* ===============================
   QTY BUTTONS
=============================== */
.qty-btn{
    width:36px;
    height:36px;
    padding:0;
    font-size:18px;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
}
.qty-btn:hover{
    background:#0d6efd;
    color:#fff;
}

/* ===============================
   REMOVE BUTTON
=============================== */
.remove-item{
    font-size:13px;
    border-radius:10px;
    padding:6px 10px;
}
.remove-item:hover{
    background:#dc3545;
    color:#fff;
}

/* ===============================
   SUBTOTAL
=============================== */
.subtotal{
    min-width:100px;
    font-size:17px;
    font-weight:600;
    color:#212529;
}

/* ===============================
   PRICE DETAILS CARD
=============================== */
.price-card{
    border-radius:16px;
    box-shadow:0 8px 24px rgba(0,0,0,.1);
    background:#fff;
    position:sticky;
    top:20px;
}

/* ===============================
   CHECKOUT BUTTON
=============================== */
.price-card .btn-success{
    font-size:16px;
    font-weight:600;
    padding:12px;
    border-radius:12px;
}

/* ===============================
   EMPTY CART
=============================== */
.empty-cart{
    background:#f8f9fa;
    border-radius:18px;
    padding:50px 25px;
}
.empty-cart h4{
    font-weight:700;
}

/* ===============================
   RESPONSIVE
=============================== */
@media (max-width:768px){
    .cart-item{
        text-align:center;
    }
    .cart-item .d-flex{
        flex-direction:column;
        gap:12px;
    }
    .subtotal{
        margin-top:8px;
    }
    .price-card{
        position:static;
        margin-top:20px;
    }
}
</style>
@endsection

@section('scripts')
<script>
/* =========================
   CSRF SETUP
========================= */
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});

/* =========================
   EMPTY CART TEMPLATE
========================= */
const EMPTY_CART = `
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm text-center p-5">
            <div style="font-size:48px;">🛒</div>
            <h4 class="fw-bold mt-3">Your cart is empty</h4>
            <p class="text-muted mb-4">
                Looks like you haven’t added anything yet
            </p>
            <a href="/" class="btn btn-primary px-4">
                Continue Shopping
            </a>
        </div>
    </div>
</div>`;

/* =========================
   UPDATE CART (AJAX)
========================= */
function updateCart(id, qty, cb){
    $.post("{{ route('cart.update') }}",{
        cart_item_id:id,
        quantity:qty
    },function(res){
        if(res.cart_count !== undefined){
            $('#cart-count').text(res.cart_count);
        }
        cb && cb(res);
    }).fail(()=>{
        toastr.error('Cart update failed');
    });
}

/* =========================
   PLUS / MINUS
========================= */
$(document).on('click','.qty-btn',function(e){
    e.stopPropagation();

    let id    = $(this).data('id');
    let type  = $(this).data('type');
    let input = $('.qty-input[data-id="'+id+'"]');
    let qty   = parseInt(input.val());

    if(type==='minus' && qty<=1){
        toastr.warning('At least 1 product is required');
        return;
    }

    qty = (type==='plus') ? qty+1 : qty-1;
    input.val(qty);

    updateCart(id,qty,function(res){
        let card = input.closest('.cart-item');
        card.find('.subtotal-value')
            .text('₹'+res.item_subtotal.toFixed(2));
        $('#cart-total')
            .text('₹'+res.cart_total.toFixed(2));
    });
});

/* =========================
   DIRECT INPUT CHANGE
========================= */
$(document).on('change','.qty-input',function(e){
    e.stopPropagation();

    let input = $(this);
    let id    = input.data('id');
    let qty   = parseInt(input.val());

    if(!qty || qty<1){
        toastr.warning('At least 1 product is required');
        qty=1;
        input.val(1);
    }

    updateCart(id,qty,function(res){
        let card = input.closest('.cart-item');
        card.find('.subtotal-value')
            .text('₹'+res.item_subtotal.toFixed(2));
        $('#cart-total')
            .text('₹'+res.cart_total.toFixed(2));
    });
});

/* =========================
   REMOVE ITEM (NO RELOAD)
========================= */
$(document).on('click','.remove-item',function(e){
    e.stopPropagation();

    let btn = $(this);
    let id  = btn.data('id');
    let url = "{{ route('cart.remove',':id') }}".replace(':id',id);

    $.ajax({
        url:url,
        type:'DELETE',
        success:function(res){
            toastr.success(res.message);

            $('#cart-count').text(res.cart_count);
            $('#cart-total')
                .text('₹'+res.cart_total.toFixed(2));

            btn.closest('.cart-item')
               .fadeOut(300,function(){
                   $(this).remove();

                   if($('.cart-item').length===0){
                       $('#cart-wrapper').html(EMPTY_CART);
                   }
               });
        },
        error:function(){
            toastr.error('Remove failed');
        }
    });
});

/* =========================
   CARD CLICK → PRODUCT
========================= */
$(document).on('click','.cart-item',function(e){
    if($(e.target).closest(
        '.qty-btn,.qty-input,.remove-item').length) return;

    window.location.href =
        '/products/'+$(this).data('id');
});
</script>
@endsection
