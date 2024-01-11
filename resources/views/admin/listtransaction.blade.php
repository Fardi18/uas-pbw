@extends('admin.layouts.app')

@section('title', 'List Transaction')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Transaction List</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
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
                    @foreach ($transactions as $item)
                        <tr class="align-items-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->waktu_booking }}</td>
                            <td>{{ $item->tipe_booking }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->kendaraan->model }}</td>
                            <td>
                                <a href="/detailtransaksi/{{ $item->id }}" class="btn btn-warning text-white">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
