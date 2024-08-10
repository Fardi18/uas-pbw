<section class="h-100 h-custom cart">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card" style="border: none;">
                    <div class="card-body p-4">
                        <div class="row">
                            @if ($carts->isEmpty())
                                <div class="text-center">
                                    <h5>Tidak ada produk dalam keranjang.</h5>
                                </div>
                            @else
                                <div class="col-lg-9">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            @foreach ($carts as $cart)
                                                <div class="product d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center pb-3">
                                                        <div class="ms-lg-5">
                                                            <img src="{{ asset('images/' . $cart->product->image) }}"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 400px" />
                                                        </div>
                                                        <div class="ms-5">
                                                            <h4>{{ $cart->product->name }}</h4>
                                                            <div class="d-flex flex-column mt-3">
                                                                <p class="fs-5 text-start">
                                                                    Rp
                                                                    <span class="product-price"
                                                                        data-price="{{ $cart->product->price }}">
                                                                        {{ number_format($cart->product->price * $cart->quantity) }}
                                                                    </span>
                                                                </p>
                                                                <div class="d-flex flex-row align-items-center">
                                                                    <form action="{{ route('update_cart', $cart) }}"
                                                                        method="post">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button class="btn fs-4 me-3">
                                                                            <i class="fa-solid fa-trash-can"></i>
                                                                        </button>
                                                                    </form>
                                                                    <div class="d-flex align-items-center">
                                                                        <button
                                                                            class="btn btn-outline-secondary quantity-decrease"
                                                                            data-cart-id="{{ $cart->id }}">-</button>
                                                                        <input type="number"
                                                                            class="form-control mx-2 quantity-input"
                                                                            name="quantity" id="quantity"
                                                                            value="{{ $cart->quantity }}"
                                                                            data-cart-id="{{ $cart->id }}"
                                                                            style="width: 100px;" />
                                                                        <button
                                                                            class="btn btn-outline-secondary quantity-increase"
                                                                            data-cart-id="{{ $cart->id }}">+</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card rounded-3">
                                        <div class="card-body">
                                            <div>
                                                <h5 class="mb-3">Ringkasan Belanja</h5>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2">Rp <span
                                                        id="cart-subtotal">{{ number_format($carts->sum(fn($cart) => $cart->product->price * $cart->quantity)) }}</span>
                                                </p>
                                            </div>
                                            <hr class="mt-3" />
                                            <a href="{{ route('checkout.page') }}"
                                                class="btn btn-primary btn-md w-100">
                                                Lanjutkan Pembelian
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.quantity-increase').forEach(button => {
            button.addEventListener('click', function() {
                console.log('Increase button clicked');
                updateQuantity(this.dataset.cartId, 1);
            });
        });

        document.querySelectorAll('.quantity-decrease').forEach(button => {
            button.addEventListener('click', function() {
                console.log('Decrease button clicked');
                updateQuantity(this.dataset.cartId, -1);
            });
        });

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                updateQuantity(this.dataset.cartId, 0, this.value);
            });
        });

        // Initial subtotal calculation on page load
        updateSubtotal();
    });

    function updateQuantity(cartId, change, newValue = null) {
        const quantityInput = document.querySelector(`.quantity-input[data-cart-id='${cartId}']`);
        const productPrice = quantityInput.closest('.product').querySelector('.product-price');
        const pricePerUnit = parseFloat(productPrice.dataset.price);

        let quantity = parseInt(quantityInput.value);

        if (newValue !== null) {
            quantity = parseInt(newValue);
        } else {
            quantity += change;
        }

        if (quantity < 1) quantity = 1;

        console.log(`Updating quantity for cart ID ${cartId} to ${quantity}`);

        fetch(`/cart/${cartId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    quantityInput.value = quantity;
                    productPrice.textContent = (quantity * pricePerUnit).toLocaleString('id-ID');
                    updateSubtotal();
                } else {
                    console.error('Failed to update cart:', data);
                }
            }).catch(error => {
                console.error('Error updating cart:', error);
            });
    }

    function updateSubtotal() {
        let subtotal = 0;
        document.querySelectorAll('.product-price').forEach(priceElement => {
            subtotal += parseInt(priceElement.textContent.replace(/\D/g, ''));
        });
        document.getElementById('cart-subtotal').textContent = subtotal.toLocaleString('id-ID');
    }
</script>


<section class="checkout px-3">
    <div class="container">
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h3>Checkout</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            @php
                $sub_total = 0;
                $grand_total = 0;
                $ongkir = 0;
                $administrasi = 0;
            @endphp
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h3 class="mb-3">Data Pembeli</h3>
                    <form action="#">
                        <div class="row gy-3 my-2">
                            <div class="col-lg-4">
                                <label class="form-label" for="name">Nama</label>
                                <input class="form-control" type="text" id="name"
                                    value="{{ Auth::user()->name }}" disabled>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" id="email"
                                    value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label" for="phone_number">Nomor Telepon</label>
                                <input class="form-control" type="text" id="phone_number"
                                    value="{{ Auth::user()->phone_number }}" disabled>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label" for="kecamatan">Kecamatan</label>
                                <input class="form-control" type="text" id="kecamatan"
                                    value="{{ $user->kecamatan->name }}" disabled>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label" for="kelurahan">Kelurahan</label>
                                <input class="form-control" type="text" id="kelurahan"
                                    value="{{ $user->kelurahan->name }}" disabled>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea class="form-control" type="text" id="alamat" disabled>{{ Auth::user()->alamat }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ORDER SUMMARY-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="mb-5">Pesananmu</h5>
                            <ul class="list-unstyled mb-0">
                                <p class="fw-bold">Daftar Produk</p>
                                @foreach ($carts as $cart)
                                    @php
                                        $sub_total += $cart->product->price * $cart->quantity;
                                    @endphp
                                    @php
                                        if ($cart->bengkel->kecamatan_id == $user->kecamatan->id) {
                                            $ongkir = 15000;
                                        } else {
                                            $ongkir = 25000;
                                        }
                                    @endphp
                                    @php
                                        $administrasi = 0.05 * $sub_total;
                                    @endphp
                                    <li class="d-flex align-items-center justify-content-between">
                                        <strong class="small fw-bold">{{ $cart->product->name }}</strong>
                                        <span
                                            class="text-muted small">Rp{{ number_format($cart->product->price * $cart->quantity) }}</span>
                                    </li>
                                    <li class="border-bottom my-2"></li>
                                @endforeach
                                <p class="fw-bold mt-5">Rincian Pembayaran</p>
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small fw-bold">Total Produk</strong>
                                    <span class="text-muted small"
                                        id="subTotal">Rp{{ number_format($sub_total) }}</span>
                                </li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small fw-bold">Ongkos Kirim</strong>
                                    <span class="text-muted small"
                                        id="ongkosKirim">Rp{{ number_format($ongkir) }}</span>
                                </li>
                                <li class="border-bottom my-2"></li>
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small fw-bold">Biaya Administrasi</strong>
                                    <span class="text-muted small"
                                        id="ongkosKirim">Rp{{ number_format($administrasi) }}</span>
                                </li>
                                <li class="border-bottom my-2"></li>
                                @php
                                    $grand_total = $sub_total + $ongkir + $administrasi;
                                @endphp
                                <li class="d-flex align-items-center justify-content-between">
                                    <strong class="small fw-bold">Grand Total</strong>
                                    <span id="grandTotal">Rp{{ number_format($grand_total) }}</span>
                                    <input type="hidden" value="{{ $grand_total }}" name="grand_total"
                                        id="grandTotalValue">
                                </li>
                            </ul>
                        </div>
                        <div class="mt-5 px-2">
                            <form action="{{ route('checkout.process') }}" method="post" class="">
                                @csrf
                                <input type="hidden" name="grand_total" value="{{ $grand_total }}"
                                    id="formGrandTotal">
                                <input type="hidden" name="ongkir" value="{{ $ongkir }}"
                                    id="formGrandTotal">
                                <input type="hidden" name="administrasi" value="{{ $administrasi }}"
                                    id="formGrandTotal">
                                <div class="col-lg-12 form-group">
                                    <button class="btn btn-primary" type="submit" style="width: 100%;">Bayar
                                        Sekarang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
