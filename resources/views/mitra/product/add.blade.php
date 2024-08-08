@extends('mitra.layouts.app')

@section('title', 'Tambah Produk')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
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
                    <h3 class="card-title">Tambah Produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/owner/product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama product">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi Produk</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Deskripsi produk"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Harga produk">
                        </div>
                        <div class="form-group">
                            <label for="price">Berat Produk (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight"
                                placeholder="Berat produk">
                        </div>
                        <div class="form-group">
                            <label for="price">Stok Produk</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                placeholder="Stok produk">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Produk</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Cari Foto</label>
                                </div>
                            </div>
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

@push('javascript')
@endpush
