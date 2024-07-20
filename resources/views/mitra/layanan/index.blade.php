@extends('mitra.layouts.app')

@section('title', 'Layanan')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Layanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/owner">Home</a></li>
                        <li class="breadcrumb-item active">Layanan</li>
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
                    <a href="/owner/layanan/add" class="btn btn-sm btn-primary">+ Tambah Layanan</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Layanan</th>
                                <th>Harga Layanan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($layanans as $layanan)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>
                                        {{ $layanan->name }}
                                    </td>
                                    <td>
                                        {{ $layanan->price }}
                                    </td>
                                    <td>
                                        <a href="/owner/layanan/{{ $layanan->id }}/edit" type="button"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="/owner/layanan/{{ $layanan->id }}/delete"
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
