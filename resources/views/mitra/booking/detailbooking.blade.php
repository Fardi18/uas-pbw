@extends('mitra.layouts.app')

@section('title', 'Detail Booking')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Booking</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Detail Booking</li>
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
                    <h5>Detail Booking {{ $booking->id }}</h5>
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
                            <p style="margin: 0" class="fw-bold">{{ $booking->booking_status }}</p>
                        </div>
                        <div class="detail-booking d-flex justify-content-between align-items-center">
                            <p style="margin: 0">Waktu Booking</p>
                            <p style="margin: 0" class="fw-bold">{{ $booking->waktu_booking }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <h5>Informasi User</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Alamat User</th>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h5>Informasi Kendaraan</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Brand</th>
                                    <th>{{ $booking->brand }}</th>
                                </tr>
                                <tr>
                                    <th>Model</th>
                                    <th>{{ $booking->model }}</th>
                                </tr>
                                <tr>
                                    <th>Tahun Pembutan</th>
                                    <th>{{ $booking->tahun_pembuatan }}</th>
                                </tr>
                                <tr>
                                    <th>Kilometer (km)</th>
                                    <th>{{ $booking->kilometer }}</th>
                                </tr>
                                <tr>
                                    <th>No. Polisi</th>
                                    <th>{{ $booking->plat }}</th>
                                </tr>
                                <tr>
                                    <th>Transmisi</th>
                                    <th>{{ $booking->transmisi }}</th>
                                </tr>
                                <tr>
                                    <th>Catatan Pembuatan</th>
                                    <th>{{ $booking->catatan_tambahan }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
