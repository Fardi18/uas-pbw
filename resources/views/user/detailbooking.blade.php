@extends('layouts.app')

@section('title', 'Detail Booking')

@section('content')
    <section class="service">
        <div class="container" style="margin-bottom: 200px;">
            <div class="row">
                <div class="col">
                    <div class="text-center my-5">
                        <h3 class="title">Detail Booking</h3>
                    </div>
                </div>
            </div>
            <div class="row ">
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
