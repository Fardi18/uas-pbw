@extends('mitra.layouts.app')

@section('title', 'Edit Layanan')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Layanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Edit Layanan</li>
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
                    <h3 class="card-title">Edit Layanan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/owner/layanan/{{ $layanan->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jadwal_senin">Nama Layanan</label>
                            <input type="text" class="form-control" id="layanan_name" name="layanan_name"
                                placeholder="Nama layanan" value="{{ $layanan->name }}">
                        </div>
                        <div class="form-group">
                            <label for="jadwal_selasa">Harga Layanan</label>
                            <input type="text" class="form-control" id="layanan_price" name="layanan_price"
                                placeholder="Harga layanan" value="{{ $layanan->price }}">
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
