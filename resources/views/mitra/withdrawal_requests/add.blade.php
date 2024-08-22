@extends('mitra.layouts.app')

@section('title', 'Pencairan Baru')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pencairan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Pencairan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pencairan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('owner.withdrawal_requests.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Total Pendapatan Saat Ini</label>
                            <input type="number" class="form-control" placeholder="Pendapatan Saat Ini"
                                value="{{ number_format($totalTransaksi, 0, ',', '.') }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Jumlah yang ditarik</label>
                            <input type="number" class="form-control" id="amount" name="amount"
                                placeholder="Jumlah yang ditarik" min="{{ $totalTransaksi }}" max="{{ $totalTransaksi }}"
                                required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
