@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
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
                                    <input type="hidden" name="ongkir" value="{{ $ongkir }}" id="formGrandTotal">
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
@endsection

@push('javascript')
@endpush
