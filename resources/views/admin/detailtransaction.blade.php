@extends('admin.layouts.app')

@section('title', 'Detail Transaksi')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Detail Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Detail Transaksi {{ $transaction->transaction_code }}</h5>
                </div>
                <div class="card-body">
                    <div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Transaction Code</p>
                            <p style="margin: 0" class="fw-bold">{{ $transaction->transaction_code }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Status Pembayaran</p>
                            <p style="margin: 0" class="fw-bold">{{ $transaction->payment_status }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Status Pengiriman</p>
                            <p style="margin: 0" class="fw-bold">{{ $transaction->shipping_status }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Total Belanja</p>
                            <p style="margin: 0" class="fw-bold">
                                Rp{{ number_format($transaction->grand_total - ($transaction->ongkir + $transaction->administrasi)) }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Informasi Tambahan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Alamat User</th>
                                    {{-- <th scope="col">Catatan Tambahan</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>{{ $transaction->user->name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $transaction->user->alamat }}</p>
                                    </td>
                                    {{-- <td>
                                        <p>{{ $transaction->catatan_tambahan }}</p>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h5>Detail Transaksi</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk / Layanan</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($details as $detail)
                                    <tr>
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
        </div>
    </div>

@endsection
