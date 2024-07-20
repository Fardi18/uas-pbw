@extends('layouts.app')

@section('title', 'Daftar Booking')

@section('content')
    <section class="service">
        <div class="container" style="margin-bottom: 200px;">
            <div class="row">
                <div class="col">
                    <div class="text-center my-5">
                        <h3 class="title">List Booking</h3>
                    </div>
                </div>
            </div>
            <div class="row ">
                @if ($bookings->isEmpty())
                    <p><i class="text-warning">Ups, Kamu belum memiliki data booking</i></p>
                @else
                    @foreach ($bookings as $booking)
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Bengkel</th>
                                        <th scope="col">Waktu Booking</th>
                                        <th scope="col">Status Booking</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $booking->id }}</th>
                                        <td>{{ $booking->bengkel->name }}</td>
                                        <td>{{ $booking->waktu_booking }}</td>
                                        <td>{{ $booking->booking_status }}</td>
                                        <td>
                                            <a href="/profile-booking/{{ $booking->id }}">Detail Booking</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
