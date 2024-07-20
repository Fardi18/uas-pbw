@extends('layouts.app')

@section('title', 'Detail Transaction')

@section('content')
    <section class="service">
        <div class="container" style="margin-bottom: 200px;">
            <div class="row">
                <div class="col">
                    <div class="text-center my-5">
                        <h3 class="title">Detail Transaction</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="row">{{ $transaction->transaction_code }}</th>
                            </tr>
                            <tr>
                                <th scope="col">Nama Bengkel</th>
                                <td>{{ $transaction->bengkel->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Status Pembayaran</th>
                                <td>{{ $transaction->payment_status }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Status Pengiriman</th>
                                <td>{{ $transaction->shipping_status }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Total Belanja</th>
                                <td>Rp{{ number_format($transaction->grand_total - ($transaction->ongkir + $transaction->administrasi)) }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Ongkos Kirim</th>
                                <td>Rp{{ number_format($transaction->ongkir) }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Biaya Administrasi</th>
                                <td>Rp{{ number_format($transaction->administrasi) }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Grand Total</th>
                                <td>Rp{{ number_format($transaction->grand_total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="mt-5">Detail Transaksi</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk / Layanan</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $detail)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $detail->product ? $detail->product->name : ($detail->layanan ? $detail->layanan->name : 'N/A') }}
                                    </td>
                                    <td>{{ $detail->qty }}</td>
                                    <td>Rp{{ number_format($detail->product ? $detail->product_price * $detail->qty : $detail->layanan_price * $detail->qty) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
