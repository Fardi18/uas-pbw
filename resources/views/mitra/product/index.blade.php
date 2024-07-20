@extends('mitra.layouts.app')

@section('title', 'Product')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                    <a href="/owner/product/add" class="btn btn-sm btn-primary">+ Tambah Product</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Stok Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                                width="100">
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp {{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <a href="/owner/product/{{ $product->id }}/edit" type="button"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/owner/product/{{ $product->id }}/delete"
                                            class="btn btn-sm btn-danger">Delete</a>
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
