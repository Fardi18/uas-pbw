@extends('mitra.layouts.app')

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
                    <h5>Detail Transaksi {{ $booking->id }}</h5>
                </div>
                @php
                    $total_price = 0;
                @endphp
                <div class="card-body">
                    <div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">ID Booking</p>
                            <p style="margin: 0" class="fw-bold">{{ $booking->id }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Status</p>
                            <p style="margin: 0" class="fw-bold">{{ $booking->status }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Tipe Booking</p>
                            <p style="margin: 0" class="fw-bold">{{ $booking->tipe_booking }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Waktu Booking</p>
                            <p style="margin: 0" class="fw-bold">{{ $booking->waktu_booking }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Informasi Tambahan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Alamat User</th>
                                    <th scope="col">Catatan Tambahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>{{ $booking->user->name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $booking->user->alamat }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $booking->catatan_tambahan }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h5>Detail Layanan Booking</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Layanan</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_booking as $detail)
                                    @if ($detail->booking->id == $booking->id)
                                        <tr>
                                            <td>
                                                <p style="margin: 0">{{ $detail->layanan->name }}</p>
                                            </td>
                                            <td>
                                                <p style="margin: 0">
                                                    Rp{{ number_format($detail->layanan->price, 0, ',', '.') }}
                                                </p>
                                            </td>
                                        </tr>
                                        @php
                                            $total_price += $detail->layanan->price * $detail->qty;
                                        @endphp
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        <h5 class="fw-bold">Total: Rp{{ number_format($total_price, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
