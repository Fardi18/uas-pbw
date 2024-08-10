@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section">
        <div class="container">
            @php
                $sub_total = 0;
                $grand_total = 0;
                $ongkir = 0;
                $administrasi = 0;
                $total_weight = 0;
            @endphp
            <div class="row">
                <div class="col-md-8 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Informasi Pembeli</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <label for="name" class="text-black">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="text-black">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-md-6">
                                <label for="phone_number" class="text-black">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ Auth::user()->phone_number }}">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label for="kecamatan" class="text-black">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    value="{{ $user->kecamatan->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="kelurahan" class="text-black">Keluurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                    value="{{ $user->kelurahan->name }}">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <label for="alamat" class="text-black">Alamat Lengkap <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Street address" value="{{ Auth::user()->alamat }}">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            @php
                                                $sub_total += $cart->product->price * $cart->quantity;
                                                $total_weight += $cart->product->weight * $cart->quantity;
                                            @endphp
                                            @php
                                                if ($cart->bengkel->kecamatan_id == $user->kecamatan->id) {
                                                    $ongkir = 15000;
                                                } else {
                                                    $ongkir = 25000;
                                                }

                                                // Jika total berat lebih dari 10 kg, hitung tambahan ongkir
                                                if ($total_weight > 10) {
                                                    $extra_weight = $total_weight - 10;
                                                    $ongkir += $extra_weight * 10000; // tambahkan biaya untuk setiap kg tambahan
                                                }
                                            @endphp
                                            @php
                                                $administrasi = 0.05 * $sub_total;
                                            @endphp
                                            <tr>
                                                <td>{{ $cart->product->name }} <strong class="mx-2">x</strong>
                                                    {{ $cart->quantity }}</td>
                                                <td>Rp{{ number_format($cart->product->price * $cart->quantity) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="table site-block-order-table mb-5">
                                    <tbody>
                                        <tr class="mt-5">
                                            <td class="text-black font-weight-bold"><strong>Product Total</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>Rp{{ number_format($sub_total) }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="mt-5">
                                            <td class="text-black font-weight-bold"><strong>Ongkos Kirim</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>Rp{{ number_format($ongkir) }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="mt-5">
                                            <td class="text-black font-weight-bold"><strong>Biaya Admin</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>Rp{{ number_format($administrasi) }}</strong>
                                            </td>
                                        </tr>
                                        @php
                                            $grand_total = $sub_total + $ongkir + $administrasi;
                                        @endphp
                                        <tr class="mt-5">
                                            <td class="text-black font-weight-bold"><strong>Grand Total</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>Rp{{ number_format($grand_total) }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

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
            </div>
            <!-- </form> -->
        </div>
    </div>
@endsection

@push('javascript')
@endpush
