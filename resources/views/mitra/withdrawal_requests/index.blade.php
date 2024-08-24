@extends('mitra.layouts.app')

@section('title', 'Pencairan')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pencairan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Pencairan</li>
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
                    <a href="/owner/withdrawal_request/add" class="btn btn-sm btn-primary">+ Tambah Pencairan</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pencairan</th>
                                <th>Bank Tujuan</th>
                                <th>Status Pencairan</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pencairans as $pencairan)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>
                                        {{ $pencairan->created_at }}
                                    </td>
                                    <td>
                                        {{ $pencairan->bank }}
                                    </td>
                                    <td>
                                        {{ $pencairan->status }}
                                    </td>
                                    <td>
                                        Rp {{ number_format($pencairan->amount) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('owner.withdrawal_requests.detail', $pencairan->id) }}"
                                            type="button" class="btn btn-sm btn-warning">Detail</a>
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
        <!-- /.col -->
    </div>
@endsection
