@extends('mitra.layouts.app')

@section('title', 'Tambah Bengkel')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Bengkel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Bengkel</li>
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
                    <h3 class="card-title">Tambah Bengkel</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/owner/bengkel" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bengkel_name">Nama Bengkel</label>
                            <input type="text" class="form-control" id="bengkel_name" name="bengkel_name"
                                placeholder="Nama bengkel">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi Bengkel</label>
                            <textarea type="text" class="form-control" id="bengkel_description" name="bengkel_description"
                                placeholder="Deskripsi bengkel"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bengkel_address">Alamat Bengkel</label>
                            <input type="text" class="form-control" id="bengkel_address" name="bengkel_address"
                                placeholder="Nama bengkel">
                        </div>
                        <div class="form-group">
                            <label for="link_bengkel_address">Link Maps Bengkel</label>
                            <input type="text" class="form-control" id="link_bengkel_address" name="link_bengkel_address"
                                placeholder="Nama bengkel">
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Bengkel</label>
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
