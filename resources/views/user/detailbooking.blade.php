@extends('layouts.app')

@section('title', 'Detail Booking')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="">
                        <h1>Detail Booking #{{ $booking->id }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="">
        <div class="container">
            <div class="row bg-white p-5">
                <div class="col">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="row">{{ $booking->id }}</th>
                            </tr>
                            <tr>
                                <th scope="col">Nama Bengkel</th>
                                <td>{{ $booking->bengkel->name }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Waktu Booking</th>
                                <td>{{ $booking->waktu_booking }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Status Booking</th>
                                <td>{{ $booking->booking_status }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="mt-5">Detail Kendaraan</h5>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="col">Brand</th>
                                <td>{{ $booking->brand }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Model</th>
                                <th scope="row">{{ $booking->model }}</th>
                            </tr>
                            <tr>
                                <th scope="col">Plat</th>
                                <td>{{ $booking->plat }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Tahun Pembuatan</th>
                                <td>{{ $booking->tahun_pembuatan }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Kilometer (km)</th>
                                <td>{{ $booking->kilometer }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Transmisi</th>
                                <td>{{ $booking->transmisi }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
@endsection
