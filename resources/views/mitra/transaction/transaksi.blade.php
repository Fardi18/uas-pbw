@extends('mitra.layouts.app')

@section('title', 'Transaksi')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi</li>
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
                        <p class="text-center fw-bold">Bengkel belum memliki transaksi</p>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Transaksi</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Waktu</th>
                                                    <th>Tipe Booking</th>
                                                    <th>Status</th>
                                                    <th>Kendaraan</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookings as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td>{{ $item->waktu_booking }}</td>
                                                        <td>{{ $item->tipe_booking }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ $item->kendaraan->model }}</td>
                                                        <td>
                                                            <a href="transaksi/{{ $item->id }}/edit"
                                                                class="btn btn-sm btn-info">Edit</a>
                                                            <a href="transaksi/{{ $item->id }}"
                                                                class="btn btn-sm btn-warning">Detail
                                                                Transaksi</a>
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
