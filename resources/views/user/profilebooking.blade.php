@extends('layouts.app')

@section('title', 'Daftar Booking')

@section('content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="">
                        <h1>List Booking</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="">
        <div class="container">
            <div class="row ">
                @if ($bookings->isEmpty())
                    <p><i class="text-warning">Ups, Kamu belum memiliki data booking</i></p>
                @else
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Bengkel</th>
                                    <th scope="col">Tanggal Booking</th>
                                    <th scope="col">Waktu Booking</th>
                                    <th scope="col">Status Booking</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $booking->id }}</th>
                                        <td>{{ $booking->bengkel->name }}</td>
                                        <td>{{ $booking->tanggal_booking }}</td>
                                        <td>{{ $booking->waktu_booking }}</td>
                                        <td>{{ $booking->booking_status }}</td>
                                        <td>
                                            <a class="btn btn-md btn-primary"
                                                href="/profile-booking/{{ $booking->id }}">Detail Booking</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
