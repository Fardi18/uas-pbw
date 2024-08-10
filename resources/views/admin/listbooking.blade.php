@extends('admin.layouts.app')

@section('title', 'Booking List')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Booking List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin-index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Booking List</li>
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
                <div class="card-body">
                    @if ($bookings->isEmpty())
                        <p class="text-center fw-bold">Bengkel belum memliki data booking</p>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Booking</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Nama Bengkel</th>
                                                    <th>Waktu</th>
                                                    <th>Status</th>
                                                    <th>Kendaraan</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookings as $booking)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $booking->user->name }}</td>
                                                        <td>{{ $booking->bengkel->name }}</td>
                                                        <td>{{ $booking->waktu_booking }}</td>
                                                        <td>{{ $booking->booking_status }}</td>
                                                        <td>{{ $booking->brand }} {{ $booking->model }}</td>
                                                        <td>
                                                            <a href="/admin-detailbooking/{{ $booking->id }}"
                                                                class="btn btn-warning text-white">
                                                                <i class="fa-regular fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
