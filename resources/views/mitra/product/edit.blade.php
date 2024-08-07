@extends('mitra.layouts.app')

@section('title', 'Edit Produk')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Edit Produk</li>
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
                    <h3 class="card-title">Edit Produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/owner/product/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama product" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi Produk</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Deskripsi produk">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga Produk</label>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Harga product" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Berat Produk (kg)</label>
                            <input type="number" class="form-control" id="weight" name="weight"
                                placeholder="Berat product" value="{{ $product->weight }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Stok Produk</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                placeholder="Stock product" value="{{ $product->stock }}">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Produk</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image"
                                        value="{{ $product->image }}">
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
