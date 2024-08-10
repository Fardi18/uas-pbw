@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section before-footer-section">
        @if ($carts->isEmpty())
            <div class="text-center">
                <h5>Tidak ada produk dalam keranjang.</h5>
            </div>
        @else
            <div class="container">

                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="{{ asset('images/' . $cart->product->image) }}" alt="Image"
                                                    class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $cart->product->name }}</h2>
                                            </td>
                                            <td class="product-price">
                                                <p class="price">
                                                    Rp{{ number_format($cart->product->price * $cart->quantity) }}</p>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                    style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-black decrease" type="button"
                                                            data-price="{{ $cart->product->price }}">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center quantity-amount"
                                                        value="{{ $cart->quantity }}" placeholder=""
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1"
                                                        data-price="{{ $cart->product->price }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-black increase" type="button"
                                                            data-price="{{ $cart->product->price }}">&plus;</button>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <form action="{{ route('update_cart', $cart) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn fs-4 me-3">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr data-cart-id="{{ $cart->id }}">
                                            <td class="product-thumbnail">
                                                <img src="{{ asset('images/' . $cart->product->image) }}" alt="Image"
                                                    class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $cart->product->name }}</h2>
                                            </td>
                                            <td class="product-price">
                                                <p class="price">
                                                    Rp{{ number_format($cart->product->price * $cart->quantity) }}</p>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                    style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-black decrease" type="button"
                                                            data-price="{{ $cart->product->price }}">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center quantity-amount"
                                                        value="{{ $cart->quantity }}" placeholder=""
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1"
                                                        data-price="{{ $cart->product->price }}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-black increase" type="button"
                                                            data-price="{{ $cart->product->price }}">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ route('delete_cart', $cart) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn fs-4 me-3">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-12 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-6 justify-content-end">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong
                                            class="text-black total-cart-price">Rp{{ number_format($carts->sum(fn($cart) => $cart->product->price * $cart->quantity)) }}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('checkout.page') }}" class="btn btn-primary btn-md w-100">
                                            Lanjutkan Pembelian
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseButtons = document.querySelectorAll('.decrease');
            const increaseButtons = document.querySelectorAll('.increase');
            const totalCartPriceElement = document.querySelector('.total-cart-price');

            decreaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quantityInput = this.closest('.quantity-container').querySelector(
                        '.quantity-amount');
                    let quantity = parseInt(quantityInput.value);
                    if (quantity > 1) {
                        quantity--;
                        quantityInput.value = quantity;
                        updatePrice(this, quantity);
                        updateCartQuantity(this.closest('tr').dataset.cartId, quantity);
                    }
                });
            });

            increaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const quantityInput = this.closest('.quantity-container').querySelector(
                        '.quantity-amount');
                    let quantity = parseInt(quantityInput.value);
                    quantity++;
                    quantityInput.value = quantity;
                    updatePrice(this, quantity);
                    updateCartQuantity(this.closest('tr').dataset.cartId, quantity);
                });
            });

            function updatePrice(button, quantity) {
                const price = button.getAttribute('data-price');
                const priceElement = button.closest('tr').querySelector('.price');
                const newPrice = parseInt(price) * quantity;
                priceElement.textContent = `Rp${newPrice.toLocaleString()}`;

                updateTotalCartPrice();
            }

            function updateTotalCartPrice() {
                let totalCartPrice = 0;
                document.querySelectorAll('.price').forEach(priceElement => {
                    totalCartPrice += parseInt(priceElement.textContent.replace('Rp', '').replace(',', ''));
                });
                totalCartPriceElement.textContent = `Rp${totalCartPrice.toLocaleString()}`;
            }

            function updateCartQuantity(cartId, quantity) {
                fetch(`/cart/${cartId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Handle success, if needed
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endpush
